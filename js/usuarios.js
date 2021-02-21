

function verificarUsuario(){

    var name=$('#txt_usu').val();
    var pass=$('#txt_con').val();
  
  if(name.length==0 || pass.length==0){
      return Swal.fire("mensaje de Advertencia","llene los campos vacios","warning");
  }

    const nuevo = new FormData();

    nuevo.append('user',name);
    nuevo.append('pass',pass);

    let url='../Controller/usuario/controlador_verificar_usuario.php';
    const xhttp=new XMLHttpRequest();
    xhttp.open('POST',url,true);
    xhttp.send(nuevo);

    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            let datos=JSON.parse(this.responseText);
            if(datos==0){
                Swal.fire("Mensaje De Error","el usuario y/o contrase\u00f1a incorrecta","warning");
            }else{
                let R_usuario=datos[0];
                
                controlarSessiones(R_usuario)
            }
        }
    }
}

function controlarSessiones(R_usuario){
    console.log(R_usuario);
    cedula_registrador=R_usuario.num_identificacion;
    console.log(cedula_registrador);
    if(R_usuario.estado==='INACTIVO'){
        Swal.fire("Mensaje De Advertencia","Lo sentimos el usuario <b> "+R_usuario.user_name+ " </b> se encuentra suspendido, comuniquese con el administrador  ","warning");
    }else{
        const nuevo1 = new FormData();
        nuevo1.append('idusuario', R_usuario.idUsuario);
        nuevo1.append('user', R_usuario.user_name);
        nuevo1.append('rol', R_usuario.idRol);
        nuevo1.append('numero_registro', R_usuario.num_identificacion);


        let url='../Controller/usuario/controlador_crear_sessiones.php';
        const xhttp= new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(nuevo1);
        xhttp.onreadystatechange=function(){
            if(this.status==200 && this.readyState==4 ){
               redirigiendo(R_usuario.user_name);
            }
        }
    }
}


//funcion decarga que le da la bienvenida al usuario 
function redirigiendo(usuario){
    // console.log(usuario);
    let timerInterval
    Swal.fire({
    title: 'Bienvenido',
    html: 'Usuario <strong>'+usuario+' </strong> Ingresando al sistema <b> </b>...',
    timer: 2000,
    timerProgressBar: true,
    onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
        const content = Swal.getContent()
        if (content) {
            const b = content.querySelector('b')
            if (b) {
            b.textContent = Swal.getTimerLeft()
            }
        }
        }, 100)
    },
    onClose: () => {
        clearInterval(timerInterval)
    }
    }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
        location.reload();
    }
    })
}




//funcion de prueba
// function prueba(){

//     let url='../Controller/usuario/controlador_registrar_usuario.php';
//     const xhttp=new XMLHttpRequest();
//     xhttp.open('POST',url,true);
//     xhttp.send();

//     xhttp.onreadystatechange=function(){
//         if(this.status==200 && this.readyState==4){
//             let datos=JSON.parse(this.responseText);
//             // console.log(this.responseText);
//             console.log(datos);
//         }
//     }
// }





var table;
function listar_usuario(){
table = $("#tabla_usuario").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/usuario/controlador_usuario_listar.php",
       type:'POST'
   },
   "columns":[
       {"data":"idUsuario"},
       {"data":"user_name"},
       {"data":"nombre_rol"},
       {"data":"estado",
       render: function (data, type, row ) {
           if(data=='ACTIVO'){
               return "<span class='label label-success'>"+data+"</span>";                   
           }else{
             return "<span class='label label-danger'>"+data+"</span>";                 
           }
         }
       },  
       {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editar btn btn-warning'><i class='fa fa-edit'></i></button>&nbsp;"+
       "<button style='font-size:10px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-trash'></i></button>&nbsp;"
        + "</button>&nbsp; <button style='font-size:10px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>"}
   ],

   "language":idioma_espanol,
   select: true
});

 }

///////////////////



function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static', keyboard:false});
    $("#modal_registro").modal('show');
    cargarRoles();
}




var contenedorSelect=document.querySelector('#txt_com_rol');
var contenedorCambio=document.querySelector('#contenedorCambio');
var cadena=document.querySelector('#txt_com_rol_editar');
 function cargarRoles(){
    let url='../Controller/usuario/controlador_listar_roles.php';
    const xhttp=new XMLHttpRequest();
    xhttp.open('POST',url,true);
    xhttp.send();

    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            let datos=JSON.parse(this.responseText);
            if(datos.length>0){
                $("#opciones").val('0');
                if(contenedorSelect){
                contenedorSelect.innerHTML=`
                <option value="0">Selecionar Rol</option>
                `;
            }
                if(cadena){
                cadena.innerHTML='';
                for(let s of datos){
                    cadena.innerHTML+=`
                    <option value="${s.idRol}">${s.nombre_rol} </option>
                    `
                    }
                }
                for(let d of datos){
                    if (contenedorSelect){
                    contenedorSelect.innerHTML+=`
                    <option value="${d.idRol}">${d.nombre_rol} </option>
                    `}
                }

                opcionesRolSelect();
                 
            }else{
                contenedorSelect.innerHTML=`<option value="">valores no encontrados</option>`;
            }
        }
    }
 }
// if condicional ternario
// contenedorCambio?console.log('existe'):console.log('no exixtes');

// en esta funcion capturo el evento para desplegar diferente opciones, dependiendo del rol
 function opcionesRolSelect(){
    if(contenedorSelect){
        contenedorSelect.addEventListener('change',(e)=>{
        e.preventDefault(); 
        
        let dato=e.target.value;
            console.log(dato);
        switch (dato){
                
            case('1'):
                $("#txt_usuario").prop('disabled', false);
                $("#txt_pass").prop('disabled', false);
                $("#txt_passR").prop('disabled', false);
                contenedorCambio.innerHTML='';
            break;
            case('2'):
                $("#txt_usuario").prop('disabled', false);
                $("#txt_pass").prop('disabled', false);
                $("#txt_passR").prop('disabled', false);
                contenedorCambio.innerHTML='';
                contenedorCambio.innerHTML=`
                    <div class="col-md-12">
                        <h4 class='h4'>Datos Del Tecnico </h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Descripci&oacute;n de Estudio</label><br/>
                        <textarea class="form-control" aria-label="With textarea" id="txt_des_estudio"></textarea>
                    </div> 
                `;
            break;

            case('3'):
                $('#txt_usuario').val("");
                $('#txt_pass').val("");
                $('#txt_passR').val("");
                $("#txt_usuario").prop('disabled', true);
                $("#txt_pass").prop('disabled', true);
                $("#txt_passR").prop('disabled', true);
                contenedorCambio.innerHTML='';
                contenedorCambio.innerHTML=`
                    <div class="col-md-12">
                        <h4 class='h4'>Datos Referentes Al Agricultor </h4>
                    </div>
                    <div class="col-md-3">
                        <label for="">Personas Acargo</label><br/>
                        <input type="number" class='form-control' placeholder='Ingresar # personas' id='txt_personasAcargo'>
                    </div>
                `;
                    
            break;
        }
     });
    }
}


function registrarUsuario(){
/* DATOS Usuario*/
nom_usu=$('#txt_usuario').val();
pas1_usu=$('#txt_pass').val();
pas2_usu=$('#txt_passR').val();
rol_usu=$('#txt_com_rol').val();
/* DATOS PERSONALES*/
nombre1=$('#txt_nombre').val();
nombre2=$('#txt_nombre2').val();
apellido1=$('#txt_ape').val();
apellido2=$('#txt_ape2').val();
educacion=$('#txt_educacion').val();
tipo_identificacion=$('#txt_tipo_ide').val();
numero_ide=$('#txt_num_ide').val();
fecha_nacimiento=$('#txt_fecha_nacimiento').val();
correo=$('#txt_correo').val();
telefono=$('#txt_telefono').val();
foto=$('#txt_foto').val();
sexo=$('#txt_sexo').val();
etnia=$('#txt_etnia').val();
discapacidad=$('#txt_discapacidad').val();


const nuevo3 = new FormData();

if(rol_usu=='0'){
    return Swal.fire("Mensaje De Error","Por favor seleccionar un ROl ","warning");
}

if(rol_usu=='1' || rol_usu=='2'){
    if(nom_usu.length==0 || pas1_usu.length==0 || pas2_usu.length==0 ||
    rol_usu.length==0 || nombre1.length==0 || apellido1.length==0 || educacion.length==0 ||
    tipo_identificacion.length==0  || numero_ide.length==0 || fecha_nacimiento.length==0)
    {
        return Swal.fire("Mensaje De Error","Por favor ingresar los datos solicitados ","warning");
    }
}

if(rol_usu.length==0 || nombre1.length==0 || apellido1.length==0 || educacion.length==0 ||
    tipo_identificacion.length==0  || numero_ide.length==0)
    {
        return Swal.fire("Mensaje De Error","Por favor ingresar los datos solicitados ","warning");
    }


if(pas1_usu!=pas2_usu){
    return Swal.fire("Mensaje De Error","las contrase\u00f1a no coinciden verificar por favor  ","warning");
}

if(rol_usu=='2'){
    /* DATOS TECTNICO */
    des_estudio=$('#txt_des_estudio').val();
    if(des_estudio.length==0){
        return Swal.fire("Mensaje De Error","Por favor ingresar datos en el campo descripcion de estudio ","warning");
    }else{
        nuevo3.append('des_estudio',des_estudio);
        nuevo3.append('personas_acargo','');
    }
}

if(rol_usu=='3'){
    /* DATOS DEL AGROPECUARIO */
    personas_acargo=$('#txt_personasAcargo').val();
    if(personas_acargo==null){
        return Swal.fire("Mensaje De Error","Por favor ingresar datos en los campos personas acargo y su actividad agropecuaria ","warning");
    }else{
        nuevo3.append('personas_acargo',personas_acargo);
        nuevo3.append('des_estudio','');
    }
}

nuevo3.append('user',nom_usu);
nuevo3.append('pass',pas1_usu);
nuevo3.append('rol',rol_usu);
nuevo3.append('nombre1',nombre1);
nuevo3.append('nombre2',nombre2);
nuevo3.append('apellido1',apellido1);
nuevo3.append('apellido2',apellido2);
nuevo3.append('educacion',educacion);
nuevo3.append('tipo_identificacion',tipo_identificacion);
nuevo3.append('numero_ide',numero_ide);
nuevo3.append('fecha_nacimiento',fecha_nacimiento);
nuevo3.append('correo',correo);
nuevo3.append('telefono',telefono);
nuevo3.append('foto',foto);
nuevo3.append('sexo',sexo);
nuevo3.append('etnia',etnia);
nuevo3.append('discapacidad',discapacidad);
$.ajax({
    url:'../Controller/usuario/controlador_registrar_usuario.php',
    type:'POST',
    data:nuevo3,
    processData: false,  // tell jQuery not to process the data
    contentType: false   // tell jQuery not to set contentType
}).done(function(res){
    console.log(res);
    valor=JSON.parse(res);
    valor_res=parseInt(valor[0])
    if(valor_res>0){
        if(valor_res==1){
            $("#modal_registro").modal('hide');
            Swal.fire("Mensaje De Confirmacion "," registro Exitoso  ","success")
            .then((value)=>{
                // limpiarRegistro();
               table.ajax.reload();
            });           
 
        }else{
            return Swal.fire("Mensaje De Advertencia","este nombre de usuario <b>"+nom_usu+ " </b> ya se encuentran registrado  ","warning");
        }

    }else{
        return Swal.fire("Mensaje De Error","el registro no se pudo realizar  ","warning");
    }


    })
}


// function limpiarRegistro(){
// // $('#registrarFormulario')[0].reset();
// $('#txt_usu').val(" ");
// $('#txt_pass').val("");
// $('#txt_pass2').val(" ");
// }


// console.log(nom_usu,pas1_usu,pas2_usu,sexo_usu,rol_usu);

//  $('#registrarFormulario')[0].reset();

// return Swal.fire("Mensaje De Error","el usuario y/o contrase\u00f1a incorrecta","warning");
// }



/* desactivar usuario*/

$('#tabla_usuario').on('click','.desactivar',function(){
    var data=table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data=table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar el usuario?',
        text: "Una vez hecho esto el usuario no tendra acceso al sistema!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si!'
      }).then((result) => {
        if (result.value) {
          modificarEstado(data.idUsuario,'INACTIVO');
        }
      })
});
//activar usuario
$('#tabla_usuario').on('click','.activar',function(){
    var data=table.row($(this).parents('tr')).data();
    // console.log(data);
    if(table.row(this).child.isShown()){
        var data=table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar el usuario?',
        text: "Una vez hecho esto el usuario tendra acceso al sistema!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si!'
      }).then((result) => {
        if (result.value) {
          modificarEstado(data.idUsuario,'ACTIVO');
        }
      })
});

function modificarEstado(idUsuario,estado){
    var mensaje='';
    if(estado=="ACTIVO"){
        mensaje="Activo";
    }else{
        mensaje="Desactivo";
    }
    $.ajax({
        url:'../Controller/usuario/controlador_cabiarEstado_usuario.php',
        type:'POST',
        data:{
            idUsuario:idUsuario,
            estado:estado
        }
    }).done(function(res){
        if(res>0){
            Swal.fire("Mensaje De Confirmacion "," El Usuario se "+mensaje+" con exito ","success")
            table.ajax.reload();
        }

    })
}

cargarRoles();

//actualizarDatos
$('#tabla_usuario').on('click','.editar',function(){
    var data=table.row($(this).parents('tr')).data();
    // console.log(data);
    if(table.row(this).child.isShown()){
        var data=table.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static', keyboard:false});
    $("#modal_editar").modal('show');
    // console.log(data);
    $("#txt_idusuario").val(data.idUsuario);
    $("#txt_usu_editar").val(data.user_name);
    $("#txt_com_rol_editar").val(data.idRol);

})

function modificarUsuario(){
    idUsu=$('#txt_idusuario').val();
    idRol=$('#txt_com_rol_editar').val();

    if(idUsu.length==0 || idRol.length==0)
        {
            return Swal.fire("Mensaje De Error","Por favor no pueden ir campos vacios ","warning");
        }
        $.ajax({
            url:'../Controller/usuario/controlador_editarUsuario.php',
            type:'POST',
            data:{
                idUsuario:idUsu,
                idRol:idRol
            }
        }).done(function(res){
            if(res>0){
                $("#modal_editar").modal('hide');
                Swal.fire("Mensaje De Confirmacion "," El Usuario se actualizo con exito ","success")
                table.ajax.reload();
            }
            else{
                Swal.fire("Mensaje De error "," El Usuario no se pudo actualizar ","warning")
            }
    
        })
    
}