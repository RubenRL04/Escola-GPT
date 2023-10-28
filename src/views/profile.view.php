<?php include_once 'partials/header.php'; ?>

<body data-bs-theme="<?= $_COOKIE['colorScheme'] ?>">
    <?php include_once 'partials/navbar.php'; ?>
    <?php include_once 'partials/breadcrumb.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?=  $profileTraduction[$_COOKIE['language']][0] ?></h1>

                <!-- Needs to show on a table all the student data or teacher data. Needs to allow to change the data when click on a button -->
                <form method="post" action="/profileAction">
                    <table class="table text-center">
                        <tr>
                            <th><?=  $profileTraduction[$_COOKIE['language']][1] ?></th>
                            <th><?=  $profileTraduction[$_COOKIE['language']][2] ?></th>
                            <th><?=  $profileTraduction[$_COOKIE['language']][3] ?></th>
                            <th><?=  $profileTraduction[$_COOKIE['language']][4] ?></th>
                        </tr>
                        <tr>
                        <?php
                            foreach ($informationData as $key => $value) {
                                echo "<td><input type='text' name='$key' value='$value' readonly></td>";
                            }
                        ?>
                            
                        </tr>
                    </table>
                    <div class="container d-flex gap-2 p-0">
                        <button type="button" class="btn btn-primary" id="editarDatos"><?=  $profileTraduction[$_COOKIE['language']][5] ?></button>
                        <button type="submit" class="btn btn-success" style="display: none;"><?=  $profileTraduction[$_COOKIE['language']][6] ?></button>
                    </div>
                </form>

            </form>
            </div>
        </div>

    <?php if(!isset($_COOKIE['cookies_policy'])) {include_once 'partials/cookies_policy_modal.php';} ?>

    <script>
        // Habilite la edición de datos cuando se haga clic en "Editar datos"
        document.getElementById('editarDatos').addEventListener('click', function() {
            const inputs = document.querySelectorAll('input[readonly]');
            inputs.forEach(input => {
                input.readOnly = false;
            });

            // Muestre el botón "Guardar cambios"
            document.querySelector('button[type="submit"]').style.display = 'block';
        });
    </script>
</body>

