<script type="text/javascript" src="../js/visitarFinca.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizacion de Registro de Visitas</h3>


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
                        <!-- <th scope="col">s_produccion 1</th>
                        <th scope="col">s_encontrada</th>
                        <th scope="col">actividades_realizadas</th>
                        <th scope="col">actividades_pendientes</th> -->
                        <th scope="col">cc registrador</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="bg-primary">
                        <th scope="col">num</th>
                        <th scope="col">objetivo</th>
                        <!-- <th scope="col">s_produccion 1</th>
                        <th scope="col">s_encontrada</th>
                        <th scope="col">actividades_realizadas</th>
                        <th scope="col">actividades_pendientes</th> -->
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

<script>
    $('#tabla_fincaActualizar').DataTable({
        responsive: true
    })
    listar_fincasActualizar();
</script>