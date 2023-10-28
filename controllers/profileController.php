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

if ($userInformation['role_id'] == 2) {
    // Obtenemos los datos del profesor
    if (!getTeacher($pdo, 'teachers', $userInformation['id'], "array")) {
        $teacherData = createTeacher($pdo, 'teachers', $userInformation);
    }
    $teacherData = getTeacher($pdo, 'teachers', $userInformation['id'], "array");
        
    // Formateamos los datos del profesor a mostrar
    $informationData = [
        "name" => $teacherData['name'],
        "surname" => $teacherData['surname'],
        "phone" => $teacherData['phone'],
        "address" => $teacherData['address'],
    ];
}
if ($userInformation['role_id'] == 3) {
    // Obtenemos los datos del estudiante
    $studentData = getStudent($pdo, 'students', $userInformation['id'], "array");
    
    // Formateamos los datos del estudiante a mostrar
    $informationData = [
        "name" => $studentData['name'],
        "surname" => $studentData['surname'],
        "phone" => $studentData['phone'],
        "address" => $studentData['address']
    ];
} 

$profileTraduction = [
    "es" => ["Perfil", "Nombre", "Apellidos", "Teléfono", "Dirección", "Editar datos", "Guardar cambios"],
    "en" => ["Profile", "Name", "Surname", "Phone", "Address", "Edit data", "Save changes"],
    "cat" => ["Perfil", "Nom", "Cognoms", "Telèfon", "Adreça", "Editar dades", "Guardar canvis"]
];

// Mostramos la vista
$heading = 'Profile';
require 'src/views/profile.view.php';

?>