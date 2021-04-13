<script type="text/javascript" src="../js/reporte2.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Generar Reporte</h3>


            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">

            <div class="form-group">

                <div class="col-lg-3">
                    <label for="">tecnicos</label>
                    <select class="form-control" id="txt_tecnicoSelect" style='width: 100%;'>

                    </select>

                </div>

                <div class="col-lg-3">
                    <label for="">Fecha inicial</label>
                    <input type="date" class="form-control" id="txt-fechaInicio">
                </div>

                <div class="col-lg-3">
                    <label for="">Fecha final</label>
                    <input type="date" class="form-control" id="txt-fechaFinal">
                </div>

                <div class="col-md-3">
                    <div class="pull-right">
                        <label for="">.</label>
                        <br>

                        <div class="btn-group">
                            <button type="button" class="btn btn-success" onclick="cargarReporte()"><i class="fa fa-search"><b>&nbsp;consultar</b></i></button>
                            <button type="button" class="btn btn-secundary" onclick="recargar()"><i class="fa fa-refresh"><b>&nbsp;refrescar</b></i></button>
                        </div>
                    </div>

                </div>

            </div>

            <div><br></div>
            <br>
            <br>
            <br>


            <div class="col-md-12">
                <table id="tabla_reporte2" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">#</th>
                            <th scope="col">Finca</th>
                            <th scope="col">Linea Productiva 1</th>
                            <th scope="col">Ha</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Latitud</th>
                            <th scope="col">Vereda</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Registrador</th>
                            <th scope="col">fechaReg</th>

                        </tr>
                    </thead>

                    <tfoot>
                        <tr class="bg-primary">
                            <th scope="col">#</th>
                            <th scope="col">finca</th>
                            <th scope="col">Linea Productiva 1</th>
                            <th scope="col">Ha</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Latitud</th>
                            <th scope="col">Vereda</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">registrador</th>
                            <th scope="col">fechaReg</th>

                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>







<script>
    $(document).ready(function() {
        $('#tabla_reporte2').DataTable({
            responsive: true
        })
        listar_fincas();
        CargarTecnicos();

    });
</script>