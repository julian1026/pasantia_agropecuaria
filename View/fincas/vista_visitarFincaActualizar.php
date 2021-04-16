<script type="text/javascript" src="../js/visitarFinca.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="box box-white box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizacion de Registro de Visitas</h3>
            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','fincas/vista_reportes.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>

            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">


            <br>
            <br>

            <table id="tabla_fincaActualizar" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">num</th>
                        <th scope="col">objetivo</th>
                        <th scope="col">cc registrador</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="bg-primary">
                        <th scope="col">num</th>
                        <th scope="col">objetivo</th>
                        <th scope="col">cc registrador</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- modal de actualizar registros de visitas de fincas -->

<div class="modal fade bd-example-modal-lg" id="modal_actualizarRegistroFinca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar Visita</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registro" autocomplete="false" onsubmit="return false">
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label>Objectivo de la Visita</label>
                            <textarea class="form-control" id="txt_objetivo" maxlength="40" rows="4" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label>Sistema de Produccion</label>
                            <textarea class="form-control" rows="4" maxlength="50" id="txt_produccion" maxlength="20" placeholder="Enter ..."></textarea>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Situacion Encontrada</label>
                            <textarea class="form-control" rows="4" maxlength="300" id="txt_situacion" placeholder="Enter ..."></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label>Acividades Realizadas/Recomendaciones/Compromisos</label>
                            <textarea class="form-control" id="txt_actividad1" rows="4" maxlength="400" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Actividad Realizada/Recomendacion Ambiental</label>
                            <textarea class="form-control" id="txt_actividad2" rows="4" maxlength="400" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="ActualizarVisita()">Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--  -->


<script>
    $('#tabla_fincaActualizar').DataTable({
        responsive: true
    })
    listar_fincasActualizar();
</script>