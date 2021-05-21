<script type="text/javascript" src="../js/usuarios.js?rev=<?php echo time(); ?>"></script>
<script type="text/javascript" src="../js/fincas.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-white box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Gestion De Fincas</h3>
            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','menu/vista_menu.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>

            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">

            <!-- <div class="form-group">

                <div class="col-lg-2">
                    <button class="btn btn-success" onclick='AbrirModalRegistro()' style="width:100%">
                        <i class="glyphicon glyphicon-plus"></i>
                        Nuevo Registro
                    </button>
                </div>

                <div class="col-lg-10">

                </div>
            </div> -->

            <br>




            <table id="tabla_finca" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">#</th>
                        <th scope="col">finca</th>
                        <th scope="col">Linea Productiva 1</th>
                        <th scope="col">Hectareas</th>
                        <th scope="col">cedula</th>
                        <th scope="col">FechaRegistro</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="bg-primary">
                        <th scope="col">#</th>
                        <th scope="col">finca</th>
                        <th scope="col">Linea Productiva 1</th>
                        <th scope="col">Hectareas</th>
                        <th scope="col">cedula</th>
                        <th scope="col">FechaRegistro</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- modal registro global -->

<!-- Modal -->
<div class='container has-success'>
    <form id="registrarFormulario" autocomplete="false" onsubmit="return false">
        <div class="modal fade" id="modal_registro" role="dialog">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title ">Formulario de Registro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- formulario -->

                            <div class="group">
                                <div class="col-md-12">
                                    <h4 class='h4'>Datos de Usuario </h4>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Rol</label>
                                    <select class="form-control" name="rol" id="txt_com_rol" style='width: 100%;'>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="txt_user">Usuario</label><br />
                                    <input type="text" class='form-control' placeholder='nombre usuario' id='txt_usuario'>
                                </div>
                                <div class="col-md-3">
                                    <label for="txt_pass">contrase&ntilde;a</label><br />
                                    <input type="password" class='form-control' placeholder='ingrese contrase&ntilde;a' id='txt_pass'>
                                </div>

                                <div class="col-md-3">
                                    <label for="txt_passRep">Repetir Contrase&ntilde;a</label>
                                    <input type="password" class='form-control' placeholder='repetir contrase&ntilde;a' id='txt_passR'>
                                </div>

                                <!-- js-example-basic-single -->

                            </div>

                            <!-- nombre y apellidos -->
                            <div class="group">
                                <div class="col-md-12">
                                    <h4 class='h4'>Datos Personales </h4>
                                </div>
                            </div>
                            <!--  -->


                            <div class="group mt-5">
                                <div class="col-md-3">
                                    <label for="txt_nombre"> Primer Nombre</label><br />
                                    <input type="text" class='form-control' placeholder='Ingrese Nombre' id='txt_nombre'>
                                </div>
                                <div class="col-md-3">
                                    <label for="txt_nombre2">Segundo Nombre</label><br />
                                    <input type="text" class='form-control' placeholder='Ingrese Nombre' id='txt_nombre2'>
                                </div>

                                <div class="col-md-3">
                                    <label for="txt_ape">Primer Apellido</label><br />
                                    <input type="text" class='form-control' placeholder='Ingresar Apellido' id='txt_ape'>
                                </div>

                                <div class="col-md-3">
                                    <label for="txt_ape2">Segundo Apellido</label><br />
                                    <input type="text" class='form-control' placeholder='Ingresar Apellido' id='txt_ape2'>
                                </div>

                            </div>

                            <div class="group">

                                <div class="col-md-3">
                                    <label for="">Sexo</label><br />
                                    <select class="form-control" name="sexo" id='txt_sexo' value='M' style='width: 100%;'>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Formaci&oacute;n Academica</label><br />
                                    <select class="form-control" name="educacion" value='ninguna' id='txt_educacion' style='width: 100%;'>
                                        <option value="ninguna">Ninguno</option>
                                        <option value="primaria">Primaria</option>
                                        <option value="bachiller">Bachiller</option>
                                        <option value="tecnico">Tecnico</option>
                                        <option value="profesional">Profesional</option>
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label for="">Tipo de Identificaci&oacute;n</label><br />
                                    <select class="form-control" name="tipo_ide" value='cedula_ciudadania' id='txt_tipo_ide' style='width: 100%;'>
                                        <option value="cedula_ciudadania">Cedula de Ciudadania</option>
                                        <option value="cedula_cafetera">Cedula Cafetera</option>
                                        <option value="cedula_extranjeria">Cedula de Extranjeria</option>

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="txt_identificacion">Numero de Identicaci&oacute;n</label><br />
                                    <input type="text" class='form-control' placeholder='Ingresar # identificaci&oacute;n' id='txt_num_ide'>
                                </div>

                            </div>
                            <div class="group">
                                <div class="col-md-3">
                                    <label for="">Etnia</label><br />
                                    <select class="form-control" name="etnia" id='txt_etnia' value='0' style='width: 100%;'>
                                        <option value="0">Seleccionar</option>
                                        <option value="Negro">Negro</option>
                                        <option value="Mulato">Mulato</option>
                                        <option value="Afrocolombiano">Afrocolombiano</option>
                                        <option value="Afrodescendiente">Afrodescendiente</option>
                                        <option value="Indigena">Indigena</option>
                                        <option value="GitanoORomm">Gitano o Rrom</option>
                                        <option value="Palenquero">Palenquero del san basilio</option>
                                        <option value="Ninguna">Ninguna</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Discapacidad</label><br />
                                    <select class="form-control" name="discapacidad" id='txt_discapacidad' value='no' style='width: 100%;'>
                                        <option value="no">no</option>
                                        <option value="si">si</option>
                                    </select>
                                </div>
                            </div>

                            <!-- fecha,foto, correo, telefono -->

                            <div class="group">

                                <div class="col-md-3">
                                    <label for="">Fecha Nacimiento</label><br />
                                    <input type="date" class='form-control' min="1940-01-01" max="2005-12-31" placeholder='fecha nacimiento' id='txt_fecha_nacimiento'>
                                </div>


                                <div class="col-md-3">
                                    <label for="">Correo Electronico</label><br />
                                    <input type="email" class='form-control' placeholder='ingresa correo' id='txt_correo'>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Telefono</label><br />
                                    <input type="text" class='form-control' placeholder='Ingresar # telefonico' id='txt_telefono'>
                                </div>


                            </div>

                            <!--  -->

                            <div class="group" id='contenedorCambio'>

                            </div>

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick='registrarUsuario()'><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- terminacion del modal-->
    </form>
</div>

<!-- modal actualizar finca -->
<!-- Modal -->
<!--  -->
<div class="modal fade has-success" id="modalActualizarFinca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="txt_RegistrarFinca" autocomplete="false" onsubmit="return false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar Registro de Finca</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="group">

                            <div class="col-md-4">
                                <label for="txt_longitud" class="col-form-label">Longitud:</label>
                                <input type="text" class="form-control" id="txt_longitud" required="">
                            </div>
                            <div class="col-md-4">
                                <label for="txt_latitud" class="col-form-label">Latitud:</label>
                                <input type="text" class="form-control" id="txt_latitud" required="">
                            </div>

                            <div class="col-md-4">
                                <label for="txt_fincaNombre" class="col-form-label">Altitud: </label>
                                <input type="text" class="form-control" id="txt_Altitud" maxlength="40" required="">
                            </div>

                        </div>

                        <div class="group">

                            <div class="col-md-4">
                                <label for="txt_fincaNombre" class="col-form-label">Nombre Finca: </label>
                                <input type="text" class="form-control" id="txt_fincaNombre" maxlength="40" required="">
                            </div>


                            <div class="col-md-4">
                                <label for="">Corregimiento</label>
                                <select class="form-control" id="txt_corregimiento" style='width: 100%;'>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Vereda</label>
                                <select class="form-control" id="txt_vereda" style='width: 100%;'>
                                </select>
                            </div>
                        </div>

                        <div class="group">
                            <div class="col-md-3">
                                <label for="">Abastecimiento de Agua</label><br />
                                <input type="radio" id='agua1' name="servicioAgua" value="1" checked>si
                                <input type="radio" id="agua0" name="servicioAgua" value="0" checked>no
                            </div>
                            <div class="col-md-3">
                                <label for="">Energia Electrica</label><br />
                                <input type="radio" id="energia_electrica1" name="energia_electrica" value="1" checked>si
                                <input type="radio" id="energia_electrica0" name="energia_electrica" value="0" checked>no
                            </div>
                            <div class="col-md-3">
                                <label for="">Energias Alternativas</label><br />
                                <input type="radio" id="energia_alternativa1" name="energia_alternativa" value="1" checked>si
                                <input type="radio" id="energia_alternativa0" name="energia_alternativa" value="0" checked>no
                            </div>
                            <div class="col-md-3">
                                <label for="">Servicio Sanitario</label><br />
                                <input type="radio" id="servicio_sanitario1" name="servicio_sanitario" value="1" checked>si
                                <input type="radio" id="servicio_sanitario0" name="servicio_sanitario" value="0" checked>no
                            </div>
                        </div>
                        <!-- si -->
                        <div class="group">
                            <div class="col-md-4">
                                <label for="">Actividad Agropecuaria Primaria</label>
                                <select class="form-control" id="txt_agro_1" style='width: 100%;'>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="">Actividad Agropecuaria Segundaria</label>
                                <select class="form-control" id="txt_agro_2" style='width: 100%;'>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="">Actividad Agropecuaria Terciaria</label>
                                <select class="form-control" id="txt_agro_3" style='width: 100%;'>
                                </select>
                            </div>

                        </div>


                        <div class="group ">
                            <div class="column col-md-4">
                                <label for="">Linea Productiva Primaria</label>
                                <select class="form-control" id="txt_pro_1" style='width: 100%;'>
                                </select>
                            </div>

                            <div class="column col-md-4">
                                <label for="">Linea Productiva Segundaria</label>
                                <select class="form-control" id="txt_pro_2" style='width: 100%;'>
                                </select>
                            </div>

                            <div class="column col-md-4">
                                <label for="">Linea Productiva Terciaria</label>
                                <select class="form-control" id="txt_pro_3" style='width: 100%;'>
                                </select>
                            </div>
                        </div>

                        <div class="group">
                            <div class="col-md-4">
                                <label for="txt_hetareas" class="col-form-label">#Hectareas de la finca:</label>
                                <input type="text" class="form-control" min="10" max="100" id="txt_hetareas" required="">
                            </div>
                            <div class="column col-md-4">
                                <label for="">Fecha Registro</label>
                                <input type="date" class="form-control" id="txt_registroFinca">
                            </div>
                        </div>

                        <!-- no -->
                        <div class="col-md-12">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick='actualizarFinca()'>Actualizar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </form>
</div>
<!-- cierre de modal de actualizar finca -->

<!-- modal de registro de plantas -->
<div class="modal fade has-success" id="modalRegistrarVegetales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Registro De Vegetales</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="txt_Registrar_plantas" autocomplete="false" onsubmit="return false">
                    <div class="form-group">

                        <label for="txt_nombrePlanta" class="col-form-label">Nombre Del Vegetal:</label>
                        <input type="text" class="form-control" id="txt_nombrePlanta">


                        <label for="txt_tipoVegetal" class="col-form-label">Tipo De Vegetal:</label>
                        <input type="text" class="form-control" id="txt_tipoVegetal">

                        <label for="txt_vegetales_cantidad" class="col-form-label">Cantidad De Plantas:</label>
                        <input type="number" class="form-control" min="10" max="100" id="txt_vegetales_cantidad">

                        <label for="txt_informacionVgt" class="col-form-label">Informacion General:</label>

                        <textarea class="form-control" rows="4" id="txt_informacionVgt" placeholder="Enter ..."></textarea>


                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick='registrarPlantas()'>Registro</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- cierre de modal de registro de plantas -->



<!-- abierto modal registro de animales -->
<div class="modal fade has-success" id="modalRegistrarAnimales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Registro De Animales</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="txt_Registrar_animales" autocomplete="false" onsubmit="return false">
                    <div class="form-group">

                        <label for="txt_tipoAnimal" class="col-form-label">Nombre Del Tipo De Animal:</label>
                        <input type="text" class="form-control" id="txt_tipoAnimal">


                        <label for="txt_razaAnimal" class="col-form-label">Nombre De La Raza Del Animal:</label>
                        <input type="text" class="form-control" id="txt_razaAnimal">

                        <label for="txt_nombreVacuna" class="col-form-label">Nombre De Vacuna:</label>
                        <input type="text" class="form-control" id="txt_nombreVacuna">


                        <label for="txt_cantidadAnimales" class="col-form-label">Cantidad De Animales:</label>
                        <input type="number" class="form-control" min="10" max="100" id="txt_cantidadAnimales">

                        <label for="txt_informacionAnimal" class="col-form-label">Informacion General Del Animal:</label>

                        <textarea class="form-control" rows="4" id="txt_informacionAnimal" placeholder="Enter ..."></textarea>


                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick='registrarAnimales()'>Registro</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- cierre de modal de registro de Animales -->


<!-- boton de decision vegetales  modal-->



<div class="modal bd-example-modal-sm" id="modalDecisionVegetal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Vegetales</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">


                <button type="button" class="btn btn-success  " onclick="abrirModalRegistroVegetales()" data-dismiss="modal">Registrar</button>
                <button type="button" class="btn btn-primary  " onclick="redirigirVegetales()" data-dismiss="modal">Listar</button>



            </div>

            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>

        </div>
    </div>
</div>
<!-- cierre de modal decision vegetal -->


<!-- abrir modal decision animal -->


<div class="modal bd-example-modal-sm" id="modalDecisionAnimal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Animales</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <button type="button" class="btn btn-success " onclick="abrirModalRegistroAnimales()" data-dismiss="modal">Registrar</button>

                <button type="button" class="btn btn-primary " onclick="redirigirAnimales()" id="redirigirA" data-dismiss="modal">Listar</button>

            </div>
            <br>
            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>

        </div>
    </div>
</div>

<!-- cerrar modal decision animal -->

<script>
    $(document).ready(function() {
        $('#tabla_finca').DataTable({
            responsive: true
        })
        listar_fincas();

    });
</script>