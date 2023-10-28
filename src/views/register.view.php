<?php include_once 'partials/header.php'; ?>

<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center flex-column col-3">
        <form action="/registerAction" method="post">
            <h1 class="mb-3">Crear usuario</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username"
                    placeholder="Nombre de usuario" required minlength="5" maxlength="50">
                <label for="floatingInput">Nombre de usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="email" placeholder="Correo electrónico"
                    required minlength="5" maxlength="50">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="Contraseña" required>
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Crear usuario</button>
            <p class="mt-3 mb-3 text-center"><a href="/login" class="text-decoration-none text-secondary">¿Ya tienes una cuenta? Entra</a></p>
        </form>

        <?php include_once 'partials/error_alert.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>