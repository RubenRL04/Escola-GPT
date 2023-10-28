<?php

// Reanudamos la sesión
session_start();

// Incluimos los archivos necesarios
include_once 'database/connection.php';
include_once 'config.php';
include_once 'database/user_functions.php';

// Establecemos la conexión
$pdo = connectMySQL($dsn, $dbuser, $dbpass);

// Obtenemos los datos del usuario
$userInformation = obtainUser($pdo, 'users', $_SESSION['username']);

// Modificamos los datos del usuario
if($userInformation['role_id'] == 2) {
    updateTeacher($pdo, 'teachers', $_POST, $userInformation['id']);
    header('Location: /profile');
} elseif ($userInformation['role_id'] == 3) {
    updateStudent($pdo, 'students', $_POST, $userInformation['id']);
    header('Location: /profile');
} else {
    setcookie('error', 'No se han podido cambiar los datos', time() + 1, '/');
    header('Location: /profile');
}

