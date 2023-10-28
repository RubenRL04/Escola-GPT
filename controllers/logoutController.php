<?php

// Incluimos los archivos necesarios
include_once 'database/connection_functions.php';

// Limpiamos la sesión y las cookies
clearSessionAndCookies();

// Redirigimos al usuario a la página de login
header("Location: /login");