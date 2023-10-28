<?php include_once 'partials/header.php'; ?>

<body data-bs-theme="<?= $_COOKIE['colorScheme'] ?>">
    <?php include_once 'partials/navbar.php'; ?>
    <?php include_once 'partials/breadcrumb.php'; ?>

    <?php
    // Array de traducciones según el idioma seleccionado
    $dashboardTraduction = [
        "es" => ["Bienvenido!", "Usuario:", "Correo:"],
        "en" => ["Welcome!", "Username:", "Email:"],
        "cat" => ["Benvingut!", "Usuari:", "Correu:"]
    ];
    ?>

    <div class="container-fluid d-flex justify-content-center">
        <div class="row ">
            <div class="col-12">
                <h1><?= $dashboardTraduction[$_COOKIE['language']][0] ?></h1>

                <p><?= $dashboardTraduction[$_COOKIE['language']][1] ?> <span><?= $_SESSION['username'] ?></span></p>
                <p><?= $dashboardTraduction[$_COOKIE['language']][2] ?> <span><?= $_SESSION['email'] ?></span></p>
            </div>
        </div>
    </div>

    <?php if(!isset($_COOKIE['cookies_policy'])) {include_once 'partials/cookies_policy_modal.php';} ?>
</body>

