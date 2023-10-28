<form action="/cookiesPolicyController" method="post">
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Política de Cookies</h1>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="cookies" value="false"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido de tu política de cookies -->
                <p>Recogemos cookies para poder almacenar tus configuraciones en cualquier momento.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name="cookies" value="false">Cerrar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="cookies" value="true">Aceptar</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
        modal.show();
    });
</script>