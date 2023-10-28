<?php include_once 'partials/header.php'; ?>

<body>
    <div class="form-container vh-100 d-flex justify-content-center align-items-center flex-column">
        <form action="/loginAction" method="post">
            <h1 class="mb-3">Iniciar sesión</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Nombre de usuario" required 
                    value="<?php if( isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
                <label for="floatingInput">Nombre de usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" name="password" placeholder="Contraseña" required
                    value="<?php if( isset($_COOKIE['username'])) {echo $_COOKIE['password'];} ?>">
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="form-check my-3">
                <input type="checkbox" class="form-check-input" value="remember-me" id="rememberButton" name="rememberButton" title="Se recordará durante 30 días.">
                <label for="form-check-label" for="rememberButton">Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Enviar</button>
            <p class="mt-3 mb-3 text-center"><a href="/register" class="text-decoration-none text-secondary">Crear una cuenta</a></p>
        </form>

        <?php include_once 'partials/error_alert.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>