<?php

// Incluímos los archivos necesarios
include_once 'database/connection.php';
include_once 'config.php';
include_once 'database/user_functions.php';

// Obtenemos los datos del formulario
$settings = [
    'colorScheme' => htmlspecialchars($_POST['colorScheme']),
    'language' => htmlspecialchars($_POST['language'])
];

try {
    // En caso de la política de cookies esté aceptada, establecemos las cookies con un año de duración
    if ($_COOKIE['cookies']) {
        setcookie('colorScheme' , $settings['colorScheme'], time() + 3600 * 24 * 365, '/');
        setcookie('language' , $settings['language'], time() + 3600 * 24 * 365, '/');
        // En caso contrario, establecemos las cookies con una duración de sesión
    } else {
        setcookie('colorScheme' , $settings['colorScheme'], 0, '/');
        setcookie('language' , $settings['language'], 0, '/');
    }

    $statusTraduction = [
        'es' => 'Se han aplicado los cambios correctamente.',
        'en' => 'The changes have been applied correctly.',
        'cat' => 'S\'han aplicat els canvis correctament.'
    ];

    // Enviamos un mensaje de éxito	y redirigimos al usuario a la página de ajustes
    setcookie('success', $statusTraduction[$_COOKIE['language']], time() + 1, '/');
    header('Location: /settings');
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
