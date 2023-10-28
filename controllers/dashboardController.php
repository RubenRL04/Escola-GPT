<?php 

session_start();

// Redirige al dashboard mediante rutas
$heading = 'Dashboard';

require 'src/views/dashboard.view.php';

?>