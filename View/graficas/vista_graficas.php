<!-- datatable -->
<script type="text/javascript" src="../js/graficos.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Bienvenidos</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">

            <div class="col-md-12">

                <div class="group">
                    <div class="col-md-5">
                        <div class="card">
                            <h5 class="card-header">Datos Registro (Lineas Productivas) </h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="btn-group ">
                                        <button type="button" class="btn btn-primary" onclick="lineasProductivaPrimaria()">Linea 1</button>
                                        <button type="button" class="btn btn-success" onclick="lineasProductivaSegundaria()">Linea 2</button>
                                        <button type="button" class="btn btn-secundary" onclick="lineasProductivaTres()">Linea 3</button>
                                        <button type="button" class="btn btn-danger" onclick=""><i class="fa fa-download"><b>&nbsp;Pdf</b></i></button>
                                        <button type="button" class="btn btn-secundary" onclick=""><i class="fa  fa-print"><b>&nbsp;Imprimir</b></i></button>
                                    </div>

                                    <div id="contenedor" class="my-3 mt-5">
                                    </div>

                                </div>
                                <h5 class="card-title">Special title treatment</h5>

                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <!-- separador -->
                    <div class="col-md-2"></div>
                    <!-- cierre -->

                    <div class="col-md-5">
                        <div class="card">
                            <h5 class="card-header">Featured</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="btn-group ">

                                        <button type="button" class="btn btn-danger" onclick=""><i class="fa fa-download"><b>&nbsp;Pdf</b></i></button>
                                        <button type="button" class="btn btn-secundary" onclick=""><i class="fa  fa-print"><b>&nbsp;Imprimir</b></i></button>
                                    </div>

                                    <div id="contenedor2" class="my-3 mt-5">
                                    </div>

                                </div>
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="group">
                </div>

            </div>

            <!-- aqui -->




        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>



<!-- cierre de modal de actualizar de plantas -->

<script>
    lineasProductivaPrimaria();
    serviciosFinca();
</script>