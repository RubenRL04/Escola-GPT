<?php

// Establecemos la sesión
session_start();

// Incluimos los archivos necesarios
include_once 'database/connection.php';
include_once 'config.php';
include_once 'database/user_functions.php';

try {
    // Obtenemos los datos del formulario
    $userData = [
        'username' => htmlspecialchars($_POST['username']),
        'password' => htmlspecialchars($_POST['password'])
    ];
    // Establecemos la conexión
    $pdo = connectMySQL($dsn, $dbuser, $dbpass);

    // Comprobamos si el usuario existe
    if (auth($pdo, $userData['username'], $userData['password'])) {
        // Si el usuario selecciona la opción de recordar, establecemos las cookies
        if ($_POST['rememberButton']) {
            setcookie('username', $userData['username'], time() + 60 * 60 * 24 * 30, '/');
            setcookie('password', $userData['password'], time() + 60 * 60 * 24 * 30, '/');
            setcookie('language', 'es', time() + 60 * 60 * 24 * 30, '/');
        }

        // Redirigimos al usuario a la página dashboard
        header('Location: /dashboard');
    } else {
        // En caso de no existir el usuario, establecemos la cookie de error
        setcookie('error', 'El usuario no ha sido encontrado', time() + 1, '/');
        // Redirigimos al usuario a la página de login y mostramos el error
        header('Location: /login');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>