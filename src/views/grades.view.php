<?php include_once 'partials/header.php'; ?>

<body data-bs-theme="<?= $_COOKIE['colorScheme'] ?>">
    <?php include_once 'partials/navbar.php'; ?>
    <?php include_once 'partials/breadcrumb.php'; ?>

    <?php if(!isset($_COOKIE['cookies_policy'])) {include_once 'partials/cookies_policy_modal.php';} ?>
</body>