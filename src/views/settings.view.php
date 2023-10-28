<?php include_once 'partials/header.php'; ?>

<body data-bs-theme="<?= $_COOKIE['colorScheme'] ?>">
    <?php include_once 'partials/navbar.php'; ?>
    <?php include_once 'partials/breadcrumb.php'; ?>

    <main>
        <div class="container">
            <div class="row place-items-center">
                <div class="col-12">
                    <h1 class="text-center mt-5"><?= $settingsTraduction[$_COOKIE["language"]][0] ?></span></h1>
                    <form action="/settingsAction" method="post">
                        <!-- Color scheme -->
                        <div class="mb-3">
                            <label for="colorScheme" class="form-label"><?= $settingsTraduction[$_COOKIE["language"]][1] ?></label>
                            <select class="form-select" name="colorScheme" id="colorScheme">
                                <option value="light" <?php isSelected('light') ?>><?= $settingsTraduction[$_COOKIE["language"]][2] ?></option>
                                <option value="dark" <?php isSelected('dark') ?>><?= $settingsTraduction[$_COOKIE["language"]][3] ?></option>
                            </select>
                        </div>
                        <!--  Language -->
                        <div class="mb-3">
                            <label for="language" class="form-label"><?= $settingsTraduction[$_COOKIE["language"]][4] ?></label>
                            <select class="form-select" name="language" id="language">
                                <option value="en" <?php isSelected('en') ?> ><?= $settingsTraduction[$_COOKIE["language"]][5] ?></option>
                                <option value="es" <?php isSelected('es') ?> ><?= $settingsTraduction[$_COOKIE["language"]][6] ?></option>
                                <option value="cat" <?php isSelected('cat') ?> ><?= $settingsTraduction[$_COOKIE["language"]][7] ?></option>
                            </select>
                        </div>
                        <!-- Save changes -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><?= $settingsTraduction[$_COOKIE["language"]][8] ?></button>
                        </div>
                    </form>
                    <?php include_once 'partials/success_alert.php'; ?>
                </div>
            </div>
        </div>
    </main>

    <?php if(!isset($_COOKIE['cookies_policy'])) {include_once 'partials/cookies_policy_modal.php';} ?>
</body>

</html>

<?php

function isSelected($value)
{
    if ($_COOKIE['colorScheme'] == $value || $_COOKIE['language'] == $value) {
        echo 'selected';
    } else {
        echo '';
    }
}

?>