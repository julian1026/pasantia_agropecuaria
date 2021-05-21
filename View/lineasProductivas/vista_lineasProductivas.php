<script type="text/javascript" src="../js/lineasProductivas.js?rev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-white box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Lineas Productivas</h3>

            <div class="box-tools pull-right">
                <button type="button" onclick="cargar_contenido('contenido_principal','menu/vista_menu.php')" class="btn btn-box-tool" data-widget="collapse"><i class="fa  fa-arrow-left"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <!-- ////////////////////////////////////////////// -->
        <div class="box-body">

            <div class="col-md-12">
                <br>
                <div class="col-md-6 ">
                    <div class="box box-white box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Clase Productiva</label>
                                <select class="form-control" id="txt_com_clase_editar" style='width: 100%;'>
                                </select>
                            </div>
                            <div class="form-group">

                                <input type="text" id="txt_idLinea" hidden />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Linea Productiva</label>
                                <input type="text" maxlength="30" class="form-control" id="txt_lineaProductiva" placeholder="ingresar">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <div id="cambio">
                                <button onclick="registrarLineaPro()" class="btn btn-success">Registrar</button>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">

                    <table id="lineasProductivas" class="display responsive nowrap table-bordered " cellspacing='0' style="width:100%">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col">Linea Productiva </th>
                                <th scope="col">Clase Productiva </th>
                                <th>Acci&oacute;n</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="bg-primary">
                                <th scope="col">Linea Productiva </th>
                                <th scope="col">Clase Productiva </th>
                                <th>Acci&oacute;n</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>

            <!-- aqui -->




        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box julian -->
</div>
<!-- no borrar, imprimir graficas -->


<!-- cierre de modal de actualizar de plantas -->

<script>
    listar_lineasProductivas();
    cargarClasesProductivas();
</script>