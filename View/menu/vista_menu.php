<?php
session_start();
?>
<script type="text/javascript" src="../js/menu.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <!--class="box box-success box-solid"  -->
    <div class="">
        <!-- <div class="box-header with-border"> -->
        <h1 class="box-title text-center"> Gestion Agricola del Municipio del Patia</h1>

        <div class="box-tools pull-right">
            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button> -->
        </div>
        <!-- /.box-tools -->
        <!-- </div> -->
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">

            <div class="col-md-12">
                <br><br>


                <div class="group">


                    <?php

                    if ($_SESSION['S_rol'] == 1) {
                    ?>
                        <a id="opc1">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box bg-blue">
                                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                                    <div class="info-box-content">

                                        <span class="info-box-text">Datos de Usuarios</span>
                                        <span class="info-box-number">Gestion de Usuarios</span>
                                        <span class="progress-description">
                                            click
                                        </span>


                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </a>



                        <a id="opc2">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box bg-gray">
                                    <span class="info-box-icon"><i class="fa  fa-user"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Datos Personales</span>
                                        <span class="info-box-number">Administradores</span>
                                        <span class="progress-description">
                                            click
                                        </span>
                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </a>
                    <?php
                    }
                    ?>

                    <a id="opc3">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Datos Personales</span>
                                    <span class="info-box-number">Agricultores</span>
                                    <span class="progress-description">
                                        click
                                    </span>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </a>



                </div>


                <div class="form-group">


                    <a id="opc4">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-white">
                                <span class="info-box-icon"><i class="fa fa-leaf"></i></span>

                                <div class="info-box-content">

                                    <span class="info-box-text">Fincas Registradas</span>
                                    <span class="info-box-number">Fincas</span>
                                    <span class="progress-description">
                                        click
                                    </span>

                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </a>

                    <a id="opc5">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-edit"></i></span>

                                <div class="info-box-content">

                                    <span class="info-box-text">VISITAS TECNICAS</span>
                                    <span class="info-box-number">Visitar Finca</span>
                                    <span class="progress-description">
                                        Click
                                    </span>


                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </a>


                    <a id="opc6">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fa fa-file-text"></i></span>

                                <div class="info-box-content">

                                    <span class="info-box-text">Reporte</span>
                                    <span class="info-box-number">Generar Reportes</span>
                                    <span class="progress-description">
                                        Click
                                    </span>


                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </a>

                    <a id="opc7">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>

                                <div class="info-box-content">

                                    <span class="info-box-text">Reporte</span>
                                    <span class="info-box-number">Graficas</span>
                                    <span class="progress-description">
                                        Click
                                    </span>


                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </a>

                    <?php
                    if ($_SESSION['S_rol'] == 1) {
                    ?>

                        <a id="opc8">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box bg-white">
                                    <span class="info-box-icon"><i class="fa fa-edit"></i></span>

                                    <div class="info-box-content">

                                        <span class="info-box-text">Gestion</span>
                                        <span class="info-box-number">Lineas Productivas</span>
                                        <span class="progress-description">
                                            Click
                                        </span>


                                    </div>

                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </a>
                    <?php
                    }
                    ?>






                </div>

                <!-- imagenes -->



            </div>

        </div>

        <!-- aqui -->





        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- no borrar, imprimir graficas -->
<div>
    <input type="hidden" readonly value="" id="identificador-grafica" />
</div>

<!-- cierre de modal de actualizar de plantas -->