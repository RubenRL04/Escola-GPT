<?php

session_start();

// Redirige al usuario a la página de ajustes
$heading = 'Settings';

// Traducciones
$settingsTraduction = [
    "es" => ["Preferencias de usuario", "Modo de color", "Claro", "Oscuro", "Idioma", "English", "Español", "Català", "Guardar cambios"],
    "en" => ["User preferences", "Color scheme", "Light", "Dark", "Language", "English", "Español", "Català", "Save changes"],
    "cat" => ["Preferències d'usuari", "Mode de color", "Clar", "Fosc", "Idioma", "English", "Español", "Català", "Guardar canvis"]
];

require 'src/views/settings.view.php';

?>