<script type="text/javascript" src="../js/fincas.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/vegetales.js?rev=<?php echo time(); ?>"></script>

<!-- datatable -->
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Lista De Vegetales</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">





            <table id="tabla_Vegetales" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">consecutivo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"># Cantidad</th>
                        <th scope="col"># Informacion</th>

                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="bg-primary">
                        <th scope="col">consecutivo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"># Cantidad</th>
                        <th scope="col"># Informacion</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- modal de actualizar de plantas -->
<div class="modal has-success" id="modalActualizarVegetales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Actualizaci&Oacute;n De Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="txt_Registrar_plantas" autocomplete="false" onsubmit="return false">
                    <div class="form-group">

                        <label for="txt_nombrePlanta" class="col-form-label">Nombre Del Vegetal:</label>
                        <input type="text" class="form-control" id="txt_updt_nombrePlanta">


                        <label for="txt_tipoVegetal" class="col-form-label">Tipo De Vegetal:</label>
                        <input type="text" class="form-control" id="txt_updt_tipoVegetal">

                        <label for="txt_vegetales_cantidad" class="col-form-label">Cantidad De Plantas:</label>
                        <input type="number" class="form-control" min="10" max="100" id="txt_updt_vegetales_cantidad">

                        <label for="txt_informacionVgt" class="col-form-label">Informacion General:</label>

                        <textarea class="form-control" rows="4" id="txt_updt_informacionVgt" placeholder="Enter ..."></textarea>


                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick='actualizarVegetales()'>Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- cierre de modal de actualizar de plantas -->

<script>
    $(document).ready(function() {
        $('#tabla_Vegetales').DataTable({
            responsive: true
        })
        listar_vegetales();

    });
</script>