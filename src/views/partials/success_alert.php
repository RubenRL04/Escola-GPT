<?php if (isset($_COOKIE['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
        <?php echo $_COOKIE['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Agregar código JavaScript para cerrar la alerta después de 3 segundos
        setTimeout(function() {
            const alert = new bootstrap.Alert(document.getElementById('myAlert'));
            alert.close();
        }, 2000); // 3000 milisegundos = 3 segundos
    </script>
<?php endif; ?>
