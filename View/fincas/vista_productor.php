<script type="text/javascript" src="../js/fincas.js?rev=<?php echo time(); ?>"></script>
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
<div class="col-md-12">

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Caracterizacion Del Pequeno Productor</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// style="width: 360px; height: 400px;"-->
        <div class="box-body">
            <div class="form-group">
                <div class="form-group col-md-4" id='dibujo_ubicacion'>

                    <h3>Ubicacion "Finca"</h3>

                    <!-- <div id="showMap" class="form-control"> </div> -->

                    <div id="map-container-google-3" class="z-depth-1-half map-container-3">

                    </div>

                </div>
                <div class="form-group col-md-3">

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

                    <label for="">Sexo:</label>
                    <div id="_sexo"></div>

                    <label for="">Etnia:</label>
                    <div id="_etnia"></div>

                    <label for="">Formacion Academica:</label>
                    <div id='_escolaridad'></div>


                    <label for="">Personas Acargo:</label>
                    <div id="_personasAcargo"></div>



                </div>


                <div class="form-group col-md-3">

                    <label for="">Nombre Finca:</label>
                    <div id="_nombreFinca"></div>


                    <label for="">Actividad Agropecuaria:</label>
                    <div id="_actividadAgropecuaria"></div>


                    <label for="">Linea Productiva:</label>
                    <div id="_lineaProductiva"></div>

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

                <div class="col-md-2" id='imagenes'>


                </div>

            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- opcional -->
</div>

<script>
    showGoogleMaps();
    mostrar();
</script>