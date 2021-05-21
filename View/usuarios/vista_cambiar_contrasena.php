<script type="text/javascript" src="../js/contrasena.js?rev=<?php echo time(); ?>"></script>

<!-- modal de cambio de  contrasena -->
<!-- The modal -->

<div class="modal fade" id="modalUpdatePassword" role="dialog" style="width:100%;">
    <div class="modal-dialog">
        <!-- Modal content    -->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cambiar Contrase&ntilde;a</h4>
            </div>
            <div class="modal-body">
                <input type="password" class="form-control" id="txt_password" maxlength="20" aria-label="contrasena" placeholder=" contrase&ntilde;a Actual"><br>
                <input type="password" class="form-control" id="txt_password1" maxlength="20" aria-label="contrasena" placeholder=" contrase&ntilde;a nueva"><br>
                <input type="password" class="form-control" id="txt_password2" maxlength="20" aria-label="repetir contrasena" placeholder="verificar  contrase&ntilde;a nueva">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="cambiarContrasena()">Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>

    </div>
</div>




<!-- cierre de modal de cambio de contrasena -->
<script>
    abrirModal();
</script>