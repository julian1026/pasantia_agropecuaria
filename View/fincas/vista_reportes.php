<script type="text/javascript" src="../js/visitarFinca.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Reportes de Visitas de Finca</h3>
            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','fincas/vista_visitar_finca.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>

            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">

            <!--Registrar Visita -->
            <div class="col-md-12 mt-4">
                <div class="card text-white bg-secondary">
                    <div class="card-header">
                        <h4>Registrar Visita</h4>
                    </div>
                    <div class="card-body" id="r">
                        <form id="registro" autocomplete="false" onsubmit="return false">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <label>Objectivo de la Visita</label>
                                    <textarea class="form-control" id="txt_objetivo" maxlength="40" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label>Sistema de Produccion</label>
                                    <textarea class="form-control" rows="3" maxlength="50" id="txt_produccion" maxlength="" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label>Situacion Encontrada</label>
                                    <textarea class="form-control" rows="3" maxlength="300" id="txt_situacion" placeholder="Enter ..."></textarea>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label>Acividades Realizadas/Recomendaciones/Compromisos</label>
                                    <textarea class="form-control" id="txt_actividad1" rows="3" maxlength="400" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Actividad Realizada/Recomendacion Ambiental</label>
                                    <textarea class="form-control" id="txt_actividad2" rows="3" maxlength="400" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="pull-left">
                                        <button class="btn btn-success btn-lg" type="button" onclick="registrarVisita()">Registrar</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- cierre  -->

                <!-- abrir mostrador -->
                <br>
                <div>
                    <div class="col-md-12 bg-primary">
                        <div class="row">

                            <div class='col-md-3 offset-md-3'>
                                <label>
                                    <b>
                                        <h4>Historial de visitas</h4>
                                    </b>
                                </label>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <label>Beneficiario</label>
                                <div id="txt-beneficiario">
                                </div>

                            </div>
                            <div class="col-md-2">
                                <label>CC</label>
                                <div id="txt-cc">

                                </div>
                            </div>

                            <div class="col-md-2">
                                <label>Finca</label>
                                <div id="txt-finca">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label>Corregimiento</label>
                                <div id="txt-corregimiento">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label>Vereda</label>
                                <div id="txt-veredad">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="pull-left">
                                    <button class="btn btn-success">
                                        <li class='fa fa-download'></li>&nbsp;Pdf
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-primary" onclick="UXactualizarFinca()">
                                        <li class="fa fa-edit"></li>&nbsp;Editar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <!-- cerrar registrar visita -->

                <!-- listar -->
                <div class="row ">
                    <div class="col-md-12 " id="listaVisitasUX">

                    </div>

                </div>







            </div>


            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>



    <script>
        $(document).ready(function() {
            $('#tabla_visitar_finca').DataTable({
                responsive: true
            })
            listar_fincas();
            listar();
            listarAll();
        });
    </script>