
var tabla;
function listar_persona(){
tabla = $("#tabla_persona").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [6, 12, 24, 48, -1], [6, 12, 24, 48, "All"] ],
   "pageLength": 6,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/persona/controlador_persona_listar.php",
       type:'POST'
   },
   "columns":[
       {"data":"numero"},
       {"data":"nombreCompleto"},
       {"data":"num_identificacion"},
    //    {"data":"sexo",
    //    render: function (data, type, row ) {
    //        if(data=='M'){
    //         return "Maculino";                    
    //        }else{
    //         return "Femenino";                 
    //        }
    //      }
    // 
       {"data":"telefono"},
       {"data":"correo"},
       {"data":"idRol",
       render: function (data,type,row){
            if(data=='3'){
               return "<button style='font-size:10px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;"
                +"<button style='font-size:10px;' type='button'  class='reg_finca btn btn-success'><i class='fa fa-newspaper-o'></i> </button>&nbsp;"
                +"<button style='font-size:10px;' type='button'  class='datosAgri btn btn-white'><i class='fa  fa-eye'></i> </button>"
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

// ------------mostrar datos de un solo agricultor---------------//

$('#tabla_persona').on('click','.datosAgri',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }

    cargar_contenido('contenido_principal','personas/vista_visualizacionAgri.php');
    idPersona=data.idPersona;

    cargar(idPersona);
  
})

function cargar(idPersona){
    $.ajax({
        url:'../Controller/persona/controlador_mostrarDatosAgri.php',
        type:'POST',
        data:{idPersona:idPersona}  
    }).done(function(res){
        if(res.length>0){ 
        datoX=JSON.parse(res); 
        datoP=datoX[0];
        // console.log(datoP);

           
            $("#txt_nombre").val(datoP.primer_nombre);
            $("#txt_nombre2").val(datoP.segundo_nombre);
            $("#txt_ape").val(datoP.primer_apellido);
            $("#txt_ape2").val(datoP.segundo_apellido);
            $("#txt_sexo").val(datoP.sexo);
            $("#txt_educacion").val(datoP.nivel_escolaridad);
            $("#txt_tipoIdentificacion").val(datoP.tipo_identificacion);
            $("#txt_num_ide").val(datoP.num_identificacion);
            $("#txt_etnia").val(datoP.etnia);
    
            $("#txt_fecha_nacimiento").val(datoP.fecha_ncm);
            $("#txt_correo").val(datoP.correo);
            $("#txt_telefono").val(datoP.telefono);
            $("#txt_acargo").val(datoP.PersonasAcargo);
            // console.log(datoP.descripcion_estudio);
        }
    }) 
}


//-----------cerrar---------------------//

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

// funcion abrir modal registro de finca


$('#tabla_persona').on('click','.reg_finca',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    idPer=data.idPersona;
    // console.log(idPer);
    obtenerIdAgricultor(idPer);
    const geolocalizacion=navigator.geolocation;
     geolocalizacion.getCurrentPosition(getPosition,error,options)//geolocalizador
    
    $("#modalRegistrarFinca").modal({backdrop:'static', keyboard:false});
    $("#modalRegistrarFinca").modal('show');
    // console.log(data);
    cargarCorregimientos();
    capturarIdentificadorCorregimiento();
    cargarActividadesAgro();
    obcionesLineasPro();
})
// obteniendo datos de georeferencia
// const button=document.getElementById('geolocalizador');
// button.addEventListener('click',function(e){
    //  const geolocalizacion=navigator.geolocation;
    //  geolocalizacion.getCurrentPosition(getPosition,error,options)

     
// })


/* esta funcion recibe el id de persona para poder consultar el id del agricultor*/
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

var options={
    enableHightAccuracy:true,
    timeout:5000,
    maximunAge:0
}
var getPosition=(position)=>{
    // console.log(position);
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



// ------funcion cargar correguimientos--------------//
var selectCorregimientos=document.querySelector('#txt_corregimiento');
function cargarCorregimientos(){
    $.ajax({
        url:'../Controller/finca/controlador_listar_corregimientos.php',
        type:'POST'
    }).done(function(res){
        if(res.length>0){
            dato=JSON.parse(res); 
            // console.log(dato);

            selectCorregimientos.innerHTML=`<option value="0">Selecionar</option>`;
            selectVereda.innerHTML=`<option value="0">Selecionar</option>`;
            

            for(let s of dato){
                selectCorregimientos.innerHTML+=`
                <option value="${s.idCorregimiento}">${s.nombre_corregimiento} </option>
                `
            }
        }
    }) 
}

// ----------cierre corregimientos---------------//



/* utilizar el evento change para capturar el id del corregimiento para asi poder listar las veredes 
y para tabien capturar el id del identificador del select, asi poder pintar las veredas en el select correpondiente
*/

function capturarIdentificadorCorregimiento(){
    if(selectCorregimientos){
        selectCorregimientos.addEventListener('change',(e)=>{
            e.preventDefault(); 
            let dato=e.target.value;
            let identificador1=e.target.id;
            console.log(identificador1);
            cargarVeredas(dato,identificador1);
    })
 }
}
//-------cierre-----------------//



//---------------------cargar veredas---------------------//
var selectVereda=document.querySelector('#txt_vered');
function cargarVeredas(id_corregimiento,txt_cambio_id){
    // let url='../Controller/veredas/controlador_listar_veredas.php';
    $.ajax({
        url:'../Controller/veredas/controlador_listar_veredas.php',
        type:'POST',
        data:{id_corregimiento:id_corregimiento}
    }).done(function(res){
        if(res.length>0){
            if(txt_cambio_id=='txt_corregimiento'){
                dato_actividad=JSON.parse(res); 
                console.log(dato_actividad);
                selectVereda.innerHTML=``;
                selectVereda.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectVereda.innerHTML+=`
                    <option value="${s.id_vereda}">${s.nombreVereda} </option>
                  `
                }
            }

        }
    }) 
        
    
}


//-------------------------



function RegistrarFinca(){
    
    longitud=$('#txt_longitud').val();
    latitud=$('#txt_latitud').val();
    nombre_finca=$('#txt_fincaNombre').val();
    hetereas=$('#txt_hetareas').val();
    servicio_agua=$('input[name=servicioAgua]:checked').val();
    energiaElectrica=$('input[name=energia_electrica]:checked').val();
    energiasAlternativas=$('input[name=energia_alternativa]:checked').val();
    servicioSanitario=$('input[name=servicio_sanitario]:checked').val();
    linea_pro1=$('#txt_pro_1').val();
    linea_pro2=$('#txt_pro_2').val();
    linea_pro3=$('#txt_pro_3').val();
    vereda=$('#txt_vered').val();
    console.log(vereda);

    // console.log(hetereas,linea_productiva,actividad_Agropecuaria,idAgricultor,vereda);
    if(longitud.length==0 || latitud.length==0 || nombre_finca.length==0 || hetereas.length==0
        ){
            return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
        }
    if(vereda==0){
        return Swal.fire("Mensaje De Error","Por favor seleccionar Vereda ","warning");
    }
    if(linea_pro1==0){
        return Swal.fire("Mensaje De Error","Por favor seleccionar la linea Productiva Primaria ","warning");
    }

    if(linea_pro1==linea_pro2 || linea_pro1==linea_pro3){
        return Swal.fire("Mensaje De Error","Las lineas productivas no pueden ser iguales ","warning");
    }
    if(linea_pro2!=0 || linea_pro3!=0){
        if(linea_pro2==linea_pro3){
            return Swal.fire("Mensaje De Error","Las lineas productivas no pueden ser iguales ","warning");
        }
        
    }

   if(linea_pro2==0){
       linea_pro2=46;
   }
   if(linea_pro3==0){
       linea_pro3=46;
   }
    
        var r_finca = new FormData();

        r_finca.append('longitud',longitud);
        r_finca.append('latitud',latitud);
        r_finca.append('nombre_finca',nombre_finca);
        r_finca.append('hetareas',hetereas);
        r_finca.append('Vereda',vereda);
        r_finca.append('agua',servicio_agua);
        r_finca.append('energiaElectrica',energiaElectrica);
        r_finca.append('energiaAlternativas',energiasAlternativas);
        r_finca.append('servicioSanitario',servicioSanitario);
        r_finca.append('linea_productiva1',linea_pro1);
        r_finca.append('linea_productiva2',linea_pro2);
        r_finca.append('linea_productiva3',linea_pro3);
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
                     Swal.fire("Mensaje De Confirmacion","Registro Exitoso ","success");
                     tabla.ajax.reload();
                    
                }else{
                    return Swal.fire("Mensaje De Error","El Registro no se pudo llevar acabo... ","warning");
                }
            }
            
        }
    
}


/* -----Abrir
cargar actividad Agropecuarias,
esta funccion es la encargada de poblar los select que hacen referencia a la actividad 
agropecuaria
--------------*/
var selectAgro1=document.querySelector('#txt_agro_1');
var selectAgro2=document.querySelector('#txt_agro_2');
var selectAgro3=document.querySelector('#txt_agro_3');
function cargarActividadesAgro(){
    $.ajax({
        url:'../Controller/finca/controlador_listar_ActividadesAgro.php',
        type:'POST'
    }).done(function(res){
        if(res.length>0){
            dato_actividad=JSON.parse(res); 
            // console.log(dato_actividad);

            selectAgro1.innerHTML=`<option value="0">Selecionar</option>`;
            selectAgro2.innerHTML=`<option value="0">Selecionar</option>`;
            selectAgro3.innerHTML=`<option value="0">Selecionar</option>`;
            // lineas productivas 
            selectPro1.innerHTML=`<option value="0">Selecionar</option>`;
            selectPro2.innerHTML=`<option value="0">Selecionar</option>`;
            selectPro3.innerHTML=`<option value="0">Selecionar</option>`;


            for(let s of dato_actividad){
                selectAgro1.innerHTML+=`
                <option value="${s.id_actividad_agro}">${s.actividadAgro_nombre} </option>
                `
                }
            for(let s of dato_actividad){
                selectAgro2.innerHTML+=`
                <option value="${s.id_actividad_agro}">${s.actividadAgro_nombre} </option>
                `
                }

            for(let s of dato_actividad){
                selectAgro3.innerHTML+=`
                <option value="${s.id_actividad_agro}">${s.actividadAgro_nombre} </option>
                `
                }
        }
    }) 
}

// -------cerrar------------------//


/* ---cargar linea productiva referentes a la actividad agropecuaria
 esta funcion recibe dos parametros, el primer parametro recibe el id de la actividad agropecuaria
 cuyo objetivo es listar todas las lineas productivas referentes a ese id,
 el otro parametro se encarga de identificar en cual select se pintaran los datos consultados 'cambio'-------*/
var selectPro1=document.querySelector('#txt_pro_1');
var selectPro2=document.querySelector('#txt_pro_2');
var selectPro3=document.querySelector('#txt_pro_3');
function cargarLineasProductivas(id_productiva,txt_cambio_id){
    $.ajax({
        url:'../Controller/finca/controlador_listar_lineas_pro.php',
        type:'POST',
        data:{id_productiva:id_productiva}
    }).done(function(res){
        if(res.length>0){
            if(txt_cambio_id=='txt_agro_1'){
                dato_actividad=JSON.parse(res); 
                // console.log(dato_actividad);
                selectPro1.innerHTML='';
                selectPro1.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro1.innerHTML+=`
                    <option value="${s.id_linea_pro}">${s.linea_nombre} </option>
                  `
                }
            }
            if(txt_cambio_id=='txt_agro_2'){
                dato_actividad=JSON.parse(res); 
                // console.log(dato_actividad);
                selectPro2.innerHTML='';
                selectPro2.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro2.innerHTML+=`
                    <option value="${s.id_linea_pro}">${s.linea_nombre} </option>
                  `
                }
            }

            if(txt_cambio_id=='txt_agro_3'){
                dato_actividad=JSON.parse(res); 
                // console.log(dato_actividad);
                selectPro3.innerHTML='';
                selectPro3.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro3.innerHTML+=`
                    <option value="${s.id_linea_pro}">${s.linea_nombre} </option>
                  `
                }
            }
        }
    }) 
}
//-----cerrar-------//



//------------------abierto--------------------//
/* esta funcion es la encargada de capturar 2 valores que seran enviados a la 
function cargarLineasProductivas, el primer parametro es el de tomar el valor de la actividad agropecuaria seleccionada 
atravez de evento change y 
el segundo parametro es el de tomar id de ese mismo select */
function obcionesLineasPro(){
    if(selectAgro1){
        selectAgro1.addEventListener('change',(e)=>{
            e.preventDefault(); 
            let dato=e.target.value;
            let identificador1=e.target.id;
            console.log(identificador1);
            cargarLineasProductivas(dato,identificador1);
    })
 }
    if(selectAgro2){
        selectAgro2.addEventListener('change',(e)=>{
            e.preventDefault(); 
            let dato=e.target.value;
            let identificador2=e.target.id;
            console.log(identificador2);
            cargarLineasProductivas(dato,identificador2);
    })
 }

    if(selectAgro3){
        selectAgro3.addEventListener('change',(e)=>{
            e.preventDefault(); 
            let dato=e.target.value;
            let identificador3=e.target.id;
            console.log(identificador3);
            cargarLineasProductivas(dato,identificador3);
    })
 }

}

// ------cerrado---------//

