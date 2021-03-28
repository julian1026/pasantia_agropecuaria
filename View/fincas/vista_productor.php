<script type="text/javascript" src="../js/fincas.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/vegetales.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/animales.js?rev=<?php echo time(); ?>"></script>

<style>
    .google-maps {
        position: relative;
        padding-bottom: 75%;
        height: 0;
        overflow: hidden;
    }

    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>
<div class="col-md-12" id="contenedor">

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Caracterizacion Del Pequeno Productor</h3>



            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','fincas/vista_finca.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>

        <div class="box-body">
            <div class="form-group ">
                <div class="column col-md-6 " id='dibujo_ubicacion'>

                    <h4>Ubicacion "Finca"</h4>
                    <div id="pintar">
                        <div class="google-maps">
                            <iframe src="https://maps.google.com/?q=2.622435,-76.569198&z=14&t=m&output=embed" width="300" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
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



        </div>

    </div>
    <!-- /.box -->
</div>
<!-- opcional -->

</div>

<div id="t"></div>

<script>
    // showGoogleMaps();
    mostrar();
    // listarVegetales2();
    // listarAnimales2();
</script>