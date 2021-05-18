<script type="text/javascript" src="../js/fincas.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/animales.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="box box-white box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Lista De Animales <script>
                    nombreFinca
                </script>
            </h3>

            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','fincas/vista_finca.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">





            <table id="tabla_Animales" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">consecutivo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Vacuna</th>
                        <th scope="col"># Animales</th>
                        <th scope="col">Informacion</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="bg-primary">
                        <th scope="col">consecutivo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Vacuna</th>
                        <th scope="col"># Animales</th>
                        <th scope="col">Informacion</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- abierto modal actualizar de animales -->
<div class="modal fade has-success" id="modalActualizarAnimales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Actualizaci&oacute;n De Registro Animal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="txt_Registrar_animales" autocomplete="false" onsubmit="return false">
                    <div class="form-group">

                        <label for="txt_tipoAnimal" class="col-form-label">Nombre Del Tipo De Animal:</label>
                        <input type="text" class="form-control" id="txt_updt_tipoAnimal">


                        <label for="txt_razaAnimal" class="col-form-label">Nombre De La Raza Del Animal:</label>
                        <input type="text" class="form-control" id="txt_updt_razaAnimal">

                        <label for="txt_nombreVacuna" class="col-form-label">Nombre De Vacuna:</label>
                        <input type="text" class="form-control" id="txt_updt_nombreVacuna">


                        <label for="txt_cantidadAnimales" class="col-form-label">Cantidad De Animales:</label>
                        <input type="number" class="form-control" min="10" max="100" id="txt_updt_cantidadAnimales">

                        <label for="txt_informacionAnimal" class="col-form-label">Informacion General Del Animal:</label>

                        <textarea class="form-control" rows="4" id="txt_updt_informacionAnimal" placeholder="Enter ..."></textarea>


                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick='actualizarAnimales()'>Registro</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- cierre de modal de registro de Animales -->

<script>
    $(document).ready(function() {
        $('#tabla_Animales').DataTable({
            responsive: true
        })

        listar_animales();

    });
</script>