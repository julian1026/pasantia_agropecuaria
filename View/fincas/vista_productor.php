<script type="text/javascript" src="../js/fincas.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/vegetales.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/animales.js?rev=<?php echo time(); ?>"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxMel9pc3S55ie4XRxZodQ7Fd9yyuxFaQ&callback=showGoogleMaps"></script> -->
<style>
    .map-container-3 {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-container-3 iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
</style>
<div class="col-md-12" id="contenedor">

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Caracterizacion Del Pequeno Productor</h3>

            <div class="box-tools pull-left">
                <button type="button" onclick="imprimirDatos()" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                    imprimir
                </button>
            </div>

            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','fincas/vista_finca.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// style="width: 360px; height: 400px;"-->
        <div class="box-body">
            <div class="form-group">
                <!--Grid column-->
                <div class="form-group col-md-4" id='dibujo_ubicacion'>

                    <h3>Ubicacion "Finca"</h3>

                    <!-- <div id="showMap" class="form-control"> </div> -->

                    <div id="map-container-google-3" class="z-depth-1-half map-container-3">

                    </div>

                </div>


                <div class="column col-md-2">

                    <label for="">Nombre Del Agricultor:</label>
                    <div id='_nombreCompleto'>
                    </div>

                    <label for="">Tipo Identificacion:</label>
                    <div id='_tipoIdentificacion'>
                    </div>

                    <label for="">Numero Identificacion:</label>
                    <div id='_numeroIdentificacion'></div>

                    <label for="">Edad:</label>
                    <div id="_edad"></div>

                    <label for="">Fecha Nacimiento:</label>
                    <div id="_fechaNacimiento"></div>

                    <label for="">Sexo:</label>
                    <div id="_sexo"></div>

                    <label for="">Etnia:</label>
                    <div id="_etnia"></div>

                    <label for="">Formacion Academica:</label>
                    <div id='_escolaridad'></div>


                    <label for="">Personas Acargo:</label>
                    <div id="_personasAcargo"></div>



                </div>


                <div class="column col-md-2">

                    <label for="">Nombre Finca:</label>
                    <div id="_nombreFinca"></div>


                    <label for="">Actividad Agropecuaria Primaria:</label>
                    <div id="_actividadAgropecuaria1"></div>


                    <label for="">Linea Productiva Primaria:</label>
                    <div id="_lineaProductiva1"></div>

                    <label for="">Actividad Agropecuaria Segundaria:</label>
                    <div id="_actividadAgropecuaria2"></div>


                    <label for="">Linea Productiva Segundaria:</label>
                    <div id="_lineaProductiva2"></div>

                    <label for="">Actividad Agropecuaria Terciaria:</label>
                    <div id="_actividadAgropecuaria3"></div>


                    <label for="">Linea Productiva Terciaria:</label>
                    <div id="_lineaProductiva3"></div>


                </div>

                <div class="col-md-2">
                    <label for="">Servicio de Agua:</label>
                    <div id="_ab_agua"></div>


                    <label for="">Energia Electrica:</label>
                    <div id="_energiaElectrica"></div>

                    <label for="">Energia Alternativas:</label>
                    <div id="_energiaAlternativas"></div>

                    <label for="">Servicio Sanitario:</label>
                    <div id="_servicioSanitario"></div>


                    <label for="">Latitud:</label>
                    <div id="_latitud"></div>


                    <label for="">Longitud:</label>
                    <div id="_longitud"></div>

                    <label for="">Ubicacion:</label>
                    <div id="_via"></div>

                    <label for="">Vereda:</label>
                    <div id="_vereda"></div>


                    <label for="">Corregimiento:</label>
                    <div id="_corregimiento"></div>


                    <label for="">Municipio:</label>
                    <div id="_municipio"></div>

                    <label for="">Departamento:</label>
                    <div id="_departamento"></div>


                </div>

                <div class="column col-md-2" id='imagenes'>


                </div>

            </div>

            <!-- <div class="form-group">
                <div class="col-md-6" id="tablaVegetalesVisualizacion">
                    <h3>Vegetales</h3>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">informacion</th>

                            </tr>
                        </thead>
                        <tbody id='pintarVegetales'>

                        </tbody>
                    </table>
                </div>

                <div class="col-md-6" id="tablaAnimalesVisualizacion">
                    <h3>animales</h3>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Raza</th>
                                <th scope="col"> #_animales</th>
                                <th scope="col">Vacuna</th>
                                <th scope="col">informacion</th>
                            </tr>
                        </thead>
                        <tbody id='pintarAnimales'>

                        </tbody>
                    </table>
                </div>


            </div> -->

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- opcional -->

</div>

<div id="t"></div>

<script>
    showGoogleMaps();
    mostrar();
    // listarVegetales2();
    // listarAnimales2();
</script>