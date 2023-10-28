<?php

// Establece la cookie de política de cookies
// Según la opción elegida por el usuario y durante un año
setcookie('cookies_policy', $_POST['cookies'], time() + 60 * 60 * 24 * 365, '/');

// Redirige al usuario a la página de inicio
header("Location: /dashboard");

?>