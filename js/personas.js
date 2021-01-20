
var tabla;
function listar_persona(){
tabla = $("#tabla_persona").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/persona/controlador_persona_listar.php",
       type:'POST'
   },
   "columns":[
       {"data":"idPersona"},
       {"data":"nombreCompleto"},
       {"data":"tipo_identificacion"},
       {"data":"num_identificacion"},
       {"data":"sexo",
       render: function (data, type, row ) {
           if(data=='M'){
            return "Maculino";                    
           }else{
            return "Femenino";                 
           }
         }
       },  
       {"data":"fecha_ncm"},
       {"data":"nivel_escolaridad"},
       {"data":"telefono"},
       {"data":"correo"},
       {"data":"idUsuario"},
       {"data":"idRol",
       render: function (data,type,row){
            if(data=='3'){
               return "<button style='font-size:10px;' type='button' class='editar btn btn-warning'><i class='fa fa-edit'></i> </button>&nbsp;"
                +"<button style='font-size:10px;' type='button'  class='reg_finca btn btn-success'><i class='fa fa-newspaper-o'></i> </button>"
                }else{
                   return "<button style='font-size:10px;' type='button' class='editar btn btn-warning'><i class='fa fa-edit'></i> </button>&nbsp;"
                }
           }
       }
   ],

   "language":idioma_espanol,
   select: true
});

document.getElementById("tabla_persona_filter").style.display="";

    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });
 }

///////////////////
function filterGlobal() {
    $('#tabla_persona').DataTable().search(
    $('#global_filter1').val(),
    ).draw();
}

// abrir modal actualizar datos personales



$('#tabla_persona').on('click','.editar',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    $("#modal_actualizar_personales").modal({backdrop:'static', keyboard:false});
    $("#modal_actualizar_personales").modal('show');
    // console.log(data);
    $("#txt_idUsuario_editar").val(data.idPersona);
    $("#txt_nombre_editar").val(data.primer_nombre);
    $("#txt_nombre2_editar").val(data.segundo_nombre);
    $("#txt_ape_editar").val(data.primer_apellido);
    $("#txt_ape2_editar").val(data.segundo_apellido);
    $("#txt_sexo_editar").val(data.sexo);
    $("#txt_educacion_editar").val(data.nivel_escolaridad);
    $("#txt_tipo_ide_editar").val(data.tipo_identificacion);
    $("#txt_num_ide_editar").val(data.num_identificacion);
    $("#txt_etnia_editar").val(data.etnia);
    $("#txt_discapacidad_editar").val(data.discapacidad);
    $("#txt_fecha_nacimiento_editar").val(data.fecha_ncm);
    $("#txt_correo_editar").val(data.correo);
    $("#txt_telefono_editar").val(data.telefono);
})

function actualizarDatosPersonas(){
    idPersona=$('#txt_idUsuario_editar').val();
    nombre1=$('#txt_nombre_editar').val();
    nombre2=$('#txt_nombre2_editar').val();
    apellido1=$('#txt_ape_editar').val();
    apellido2=$('#txt_ape2_editar').val();
    educacion=$('#txt_educacion_editar').val();
    tipo_identificacion=$('#txt_tipo_ide_editar').val();
    numero_ide=$('#txt_num_ide_editar').val();
    fecha_nacimiento=$('#txt_fecha_nacimiento_editar').val();
    correo=$('#txt_correo_editar').val();
    telefono=$('#txt_telefono_editar').val();
    foto=$('#txt_foto_editar').val();
    sexo=$('#txt_sexo_editar').val();
    etnia=$('#txt_etnia_editar').val();
    discapacidad=$('#txt_discapacidad_editar').val();

    const nuevo3 = new FormData();

    if(idPersona.length==0 || etnia==0 || discapacidad==0 || nombre1.length==0 || apellido1.length==0 || educacion.length==0 ||
        tipo_identificacion==''  || numero_ide.length==0 || fecha_nacimiento.length==0 
        || telefono.length==0 || sexo.length==0)
        {
            return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
        }
        nuevo3.append('idPersona',idPersona);
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
            url:'../Controller/persona/controlador_actualizar_persona.php',
            type:'POST',
            data:nuevo3,
            processData: false,  // tell jQuery not to process the data
            contentType: false   // tell jQuery not to set contentType
        }).done(function(res){
            // console.log(res);
            valor=JSON.parse(res);
            // console.log(valor);
            if(valor>0){
                if(valor==1){
                    $("#modal_actualizar_personales").modal('hide');
                    Swal.fire("Mensaje De Confirmacion "," Actualizacion Exitosa  ","success")
                    .then((value)=>{
                        // limpiarRegistro();
                       tabla.ajax.reload();
                    });           
                }
            }else{
                return Swal.fire("Mensaje De Error","Actualizacion Fallida ","warning");
            }   
        })
}

// funcion abrir modal encuesta


$('#tabla_persona').on('click','.reg_finca',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    idPer=data.idPersona;
    console.log(idPer);
    obtenerIdAgricultor(idPer);
    const geolocalizacion=navigator.geolocation;
     geolocalizacion.getCurrentPosition(getPosition,error,options)//geolocalizador
    
    $("#modalRegistrarFinca").modal({backdrop:'static', keyboard:false});
    $("#modalRegistrarFinca").modal('show');
    // console.log(data);
})
// obteniendo datos de georeferencia
// const button=document.getElementById('geolocalizador');
// button.addEventListener('click',function(e){
    //  const geolocalizacion=navigator.geolocation;
    //  geolocalizacion.getCurrentPosition(getPosition,error,options)

     
// })

var options={
    enableHightAccuracy:true,
    timeout:5000,
    maximunAge:0
}
var getPosition=(position)=>{
    cargarVeredas();
    $("#txt_latitud").val(position.coords.latitude);
    $("#txt_longitud").val(position.coords.longitude);
    // console.log(position.coords);
    nav=navigator.userAgent;
    // console.log(nav);
    
    // window.alert('julian');
}
var error=(error)=>console.log(error);
// cierre de funciones que buscan ubicacion

//---------------------cargar veredas---------------------//
var contenedorVereda=document.querySelector('#txt_vereda');
function cargarVeredas(){
    let url='../Controller/veredas/controlador_listar_veredas.php';
    const xhttp=new XMLHttpRequest();
    xhttp.open('POST',url,true);
    xhttp.send();

    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            let datos=JSON.parse(this.responseText);
            if(datos.length>0){
                contenedorVereda.innerHTML='';
                contenedorVereda.innerHTML=`
                <option value="0">Selecionar Vereda</option>
                `;
                if(contenedorVereda){
                for(let s of datos){
                    contenedorVereda.innerHTML+=`
                    <option value="${s.id_vereda}">${s.nombreVereda} </option>
                    `
                    }
                } 
            }else{
                contenedorSelect.innerHTML=`<option value="">valores no encontrados</option>`;
            }
        }
        
    }
}
// -------obtener idAgricultor-----------------//
function obtenerIdAgricultor(idPer){
    var l_agricultor = new FormData();

    l_agricultor.append('idPer',idPer);
    let url='../Controller/agricultor/controlador_listar_agricultor.php';
    const xhttp=new XMLHttpRequest();
    xhttp.open('POST',url,true);
    xhttp.send(l_agricultor);

    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            // console.log(this.responseText);
            let datos=JSON.parse(this.responseText);
            if(datos.length>0){
                // console.log(datos[0].idAgricultor);
                 idAgricultor=datos[0].idAgricultor;
            }
        }
        
    }
}


//-------------------------



function RegistrarFinca(){
    longitud=$('#txt_longitud').val();
    latitud=$('#txt_latitud').val();
    nombre_finca=$('#txt_fincaNombre').val();
    hetereas=$('#txt_hetareas').val();
    actividad_Agropecuaria=$('#txt_actividadAgro').val();
    linea_productiva=$('#txt_lineaProductiva').val();
    vereda=$('#txt_vereda').val();
    console.log(hetereas,linea_productiva,actividad_Agropecuaria,idAgricultor,vereda);
    if(longitud.length==0 || latitud.length==0 || nombre_finca.length==0 || hetereas.length==0
        || actividad_Agropecuaria.length==0 ||linea_productiva.length==0){
            return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
        }
    
        var r_finca = new FormData();

        r_finca.append('longitud',longitud);
        r_finca.append('latitud',latitud);
        r_finca.append('nombre_finca',nombre_finca);
        r_finca.append('hetareas',hetereas);
        r_finca.append('actividad_Agropecuaria',actividad_Agropecuaria);
        r_finca.append('linea_productiva',linea_productiva);
        r_finca.append('vereda',vereda);
        r_finca.append('idAgricultor',idAgricultor);

        let url='../Controller/finca/controlador_registrar_finca.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(r_finca);
    
        xhttp.onreadystatechange=function(){
            if(this.status==200 && this.readyState==4){
                console.log(this.responseText);
                let datos=JSON.parse(this.responseText);
                if(datos>0){
                    $("#modalRegistrarFinca").modal('hide');
                    return Swal.fire("Mensaje De Confirmacion","Registro Exitoso ","success");
                    
                }else{
                    return Swal.fire("Mensaje De Error","El Registro no se pudo llevar acabo... ","warning");
                }
            }
            
        }
    
}




