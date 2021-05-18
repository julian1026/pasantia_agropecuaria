<script type="text/javascript" src="../js/usuarios.js?rev=<?php echo time(); ?>"></script>


<div class="col-md-12">
  <div class="box box-white box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Gestion de Usuarios</h3>
      <div class="box-tools pull-right">
        <button type="button" onclick="cargar_contenido('contenido_principal','menu/vista_menu.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
        </button>
      </div>


      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <!-- ////////////////////////////////////////////// -->
    <div class="box-body">

      <div class="form-group">

        <div class="col-lg-2">
          <button class="btn btn-success" onclick='AbrirModalRegistro()' style="width:100%">
            <i class="glyphicon glyphicon-plus"></i>
            Nuevo Registro
          </button>
        </div>

        <div class="col-lg-10">

        </div>
      </div>
      <br>
      <br>



      <table id="tabla_usuario" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
        <thead>
          <tr class="bg-primary">
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Rol</th>
            <th scope="col">Estado</th>
            <th scope="col">Acci&oacute;n</th>
          </tr>
        </thead>

        <tfoot>
          <tr class="bg-primary">
            <th>#</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acci&oacute;n</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>


<!-- modal de apertura registro -->

<!-- Trigger the modal with a button
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<!-- Modal -->
<div class='container  has-success'>
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

                <!-- <div class="col-md-3">
                  <label for="">Discapacidad</label><br />
                  <select class="form-control" name="discapacidad" id='txt_discapacidad' value='no' style='width: 100%;'>
                    <option value="no">no</option>
                    <option value="si">si</option>
                  </select>
                </div> -->

                <div class="col-md-3">
                  <label for="">Telefono</label><br />
                  <input type="text" class='form-control' placeholder='Ingresar # telefonico' id='txt_telefono'>
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

  <!-- modal de modificar abrir -->
  <form id="editarFormulario" autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_editar" role="dialog" style="width:100%;">
      <div class="modal-dialog">
        <!-- Modal content    -->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Usuario</h4>
          </div>
          <div class="modal-body">


            <input type="text" id="txt_idusuario" hidden /> <br />
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="txt_usu_editar" placeholder="editar usuario" disabled>



            <label for="">Rol</label>
            <select class="form-control" name="rol1" id="txt_com_rol_editar" style='width: 100%;'>
            </select>

            <label for="">Nueva Contrase&ntilde;a</label>
            <input type="text" class="form-control" id="txt_contra" placeholder="ingrese nueva contrase&ntilde;a">



          </div>

          <div class="modal-footer">
            <button class="btn btn-primary" onclick="modificarUsuario();">Actualizar</button>
            <button type="button" class="btn btn-danger mt-5" data-dismiss="modal">Cerrar</button>
          </div>

        </div>

      </div>
    </div>
  </form>




</div>






<!-- -------------------------------------------------------------------------- -->


<script>
  $(document).ready(function() {
    $('#tabla_usuario').DataTable({
      responsive: true
    })
    listar_usuario();
    cargarRoles();
  });
</script>