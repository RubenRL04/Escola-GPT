<?php

// Incluimos los archivos necesarios
include_once 'database/connection.php';
include_once 'config.php';
include_once 'database/user_functions.php';

// Obtenemos los datos del formulario
$userData = [
    'username' => htmlspecialchars($_POST['username']),
    'email' => htmlspecialchars($_POST['email']),
    'password' => password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT),
    "role_id" => 3
];

try {
    // Establecemos la conexión
    $pdo = connectMySQL($dsn, $dbuser, $dbpass);
    // Comprobamos si el usuario existe
    if (getUser($pdo, 'users', $userData['username'])) {
        setcookie('error', 'El usuario ya existe', time() + 1, '/');
        header('Location: /register');
    }
    // En caso de no existir el usuario, lo creamos 
    else {
        addUser($pdo, 'users', $userData);

        // Obtenemos los datos del usuario para crear el estudiante
        $userInformation = obtainUser($pdo, 'users', $userData['username']);
        createStudent($pdo, 'students', $userInformation);

        // Limpiamos la sesión y las cookies
        clearSessionAndCookies();
        header('Location: /login');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
