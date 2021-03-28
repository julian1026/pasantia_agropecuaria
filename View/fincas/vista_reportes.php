<script type="text/javascript" src="../js/visitarFinca.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Reportes de Visitas de Finca</h3>


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
                                    <textarea class="form-control" id="txt_objetivo" rows="3" placeholder="Enter ..."></textarea>
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
                                <div class="col-md-5 mt-2">
                                    <label>Acividades Realizadas/Recomendaciones/Compromisos</label>
                                    <textarea class="form-control" id="txt_actividad1" rows="3" maxlength="500" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="col-md-5 mt-2">
                                    <label>Actividad Realizada/Recomendacion Ambiental</label>
                                    <textarea class="form-control" id="txt_actividad2" rows="3" maxlength="500" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="pull-right col-md-2 ">
                                    <br><br>
                                    <button class="btn btn-success btn-lg" type="button" onclick="registrarVisita()">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- cierre  -->

                <!-- abrir mostrador -->
                <br>
                <div class="bg bg-success">
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
                            <p id="txt-beneficiario">julian andres calambas</p>
                        </div>
                        <div class="col-md-2">
                            <label>CC</label>
                            <p id="txt-cc">cedula</p>
                        </div>
                        <div class="col-md-2">
                            <label>Finca</label>
                            <p id="txt-finca">las margaritas</p>
                        </div>
                        <div class="col-md-2">
                            <label>Corregimiento</label>
                            <p id="txt-finca">las tayas</p>
                        </div>
                        <div class="col-md-2">
                            <label>Vereda</label>
                            <p id="txt-finca">rio adentro</p>
                        </div>

                        <div class="col-md-2">
                            <!-- <label for="">Descargar</label><br> -->
                            <button class="btn btn-secondary">
                                <li class='fa fa-download'></li>
                            </button>

                        </div>
                    </div>
                </div>
                <!-- cerrar registrar visita -->
                <br>
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="card text-white bg-success">
                            <div class="card-header">
                                visita #<b>1</b> <button class="btn btn-warning btn-sm offset-md-8">
                                    <li class="fa fa-edit"></li>
                                </button>
                            </div>
                            <div class="card-body">
                                <form autocomplete="false" onsubmit="return false">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label>Objectivo de la Visita</label>
                                            <textarea class="form-control" rows="3" disabled></textarea>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Sistema de Produccion</label>
                                            <textarea class="form-control" rows="3" disabled></textarea>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <label>Situacion Encontrada</label>
                                            <textarea class="form-control" rows="3" disabled></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <label>Acividades Realizadas/Recomendaciones/Compromisos</label>
                                            <textarea class="form-control" rows="3" disabled></textarea>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>Actividad Realizada/Recomendacion Ambiental</label>
                                            <textarea class="form-control" rows="3" disabled></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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

        });
    </script>