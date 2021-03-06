<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js"></script>


<script type="text/javascript" src="../js/personas_adm.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">

    <div class="box box-white box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales del Agricultor</h3>

            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','personas/vista_persona_listar.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// style="width: 360px; height: 400px;"-->
        <div class="box-body" id="print1">

            <!-- card -->

            <div class="card" id="imprimir">
                <div class="card-header">
                    <!-- Informacion Detallada -->
                </div>
                <div class="card-body">

                    <!-- fromulario -->
                    <div class="group col-md-12">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success" onclick="GeneratePdf()"><i class="fa fa-download"><b>&nbsp;Pdf</b></i></button>
                            <button type="button" class="btn btn-primary" onclick='printDiv()'><i class="fa  fa-file"><b>&nbsp;Imprimir</b></i></button>

                        </div>
                    </div>
                    <form id="registrarFormulario" autocomplete="false" onsubmit="return false">

                        <div class="row">
                            <!-- formulario -->



                            <!-- nombre y apellidos -->
                            <div class="group">
                                <div class="col-md-12">
                                    <h4 class='h4'>Informacion Detallada del Agricultor</h4>
                                </div>
                            </div>
                            <!--  -->


                            <div class="group mt-5">
                                <div class="col-md-3">
                                    <label for="txt_nombre"> Primer Nombre</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_nombre' disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="txt_nombre2">Segundo Nombre</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_nombre2' disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="txt_ape">Primer Apellido</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_ape' disabled>
                                </div>



                            </div>

                            <div class="group">

                                <div class="col-md-3">
                                    <label for="txt_ape2">Segundo Apellido</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_ape2' disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Sexo</label><br />
                                    <input type="text" class="form-control" id="txt_sexo" disabled>

                                </div>

                                <div class="col-md-3">
                                    <label for="">Formaci&oacute;n Academica</label><br />
                                    <input type="text" class="form-control" id="txt_educacion" disabled>
                                </div>

                            </div>


                            <div class="group">

                                <div class="col-md-3">
                                    <label for="">Tipo de Identificaci&oacute;n</label><br />
                                    <input type="text" class="form-control" id="txt_tipoIdentificacion" disabled>

                                </div>


                                <div class="col-md-3">
                                    <label for="txt_identificacion">Numero de Identicaci&oacute;n</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_num_ide' disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Etnia</label><br />
                                    <input type="text" class="form-control" id="txt_etnia" disabled>
                                </div>


                            </div>

                            <!-- fecha,foto, correo, telefono -->

                            <div class="group">

                                <div class="col-md-3">
                                    <label for="">Fecha Nacimiento</label><br />
                                    <input type="date" class='form-control' min="1940-01-01" max="2005-12-31" placeholder='' id='txt_fecha_nacimiento' disabled>
                                </div>


                                <div class="col-md-3">
                                    <label for="">Correo Electronico</label><br />
                                    <input type="email" class='form-control' placeholder='' id='txt_correo' disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Telefono</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_telefono' disabled>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Personas Acargo</label><br />
                                    <input type="text" class='form-control' placeholder='' id='txt_acargo' disabled>
                                </div>
                            </div>




                        </div>

                    </form>






                    <!-- cerrar -->
                </div>


            </div>

            <!-- cerrar card -->


            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- opcional -->

</div>

<script>

</script>