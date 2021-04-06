var tabla;
function listar_fincas(){
tabla = $("#tabla_finca").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [6, 12, 24, 48, -1], [6, 12, 24, 48, "All"] ],
   "pageLength": 6,
   "destroy":true,
   "async": false ,
   "processing": true,  
   "ajax":{
       "url":"../Controller/finca/controlador_finca_listar.php",
       type:'POST'
   },
   dom: 'Bfrtilp',
   buttons: [{
           extend: 'excelHtml5',
           text: '<i class="fas fa-file-excel"></i> ',
           titleAttr: 'Exportar a Excel',
           className: 'btn btn-success'
       },
       {
           extend: 'pdfHtml5',
           text: '<i class="fas fa-file-pdf"></i> ',
           titleAttr: 'Exportar a PDF',
           className: 'btn btn-danger'
       },
       {
           extend: 'print',
           text: '<i class="fa fa-print"></i> ',
           titleAttr: 'Imprimir',
           className: 'bg bg-success'
       },
   ],
   "columns":[
       {"data":"numero"},
       {"data":"nombre_finca"},
       {"data":"linea_nombre"},
       {"data":"hectareas"},  
       {"data":"num_identificacion"},
       {"data":"fecha_registro"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;"+
       "<button style='font-size:10px;' type='button' class='plantas btn btn-secondary'><i class='fa fa-leaf'></i>"
        + "</button>&nbsp; <button style='font-size:10px;' type='button' class='animales btn btn-secondary'><i class='fa fa-paw'></i></button>"
        + "</button>&nbsp; <button style='font-size:10px;' type='button' class='vista_datos btn btn-secondary'><i class='fa  fa-eye'></i></button>"}
   ],

   "language":idioma_espanol,
   select: true
});
}



// declarando variables donde se cargaran los select 
var selectCorregimientos=document.querySelector('#txt_corregimiento');
var selectVereda=document.querySelector('#txt_vereda');



/* listar veredas sin parametro,esta funcion se necesita a la hora de actualizar
datos de la finca por ello todos los select tienen que estar cargados */

function listarVeredasPrincipal(){
    let id_corregimiento=null;
    $.ajax({
        url:'../Controller/veredas/controlador_listar_veredas.php',
        type:'POST',
        data:{id_corregimiento:id_corregimiento}   
    }).done(function(res){
        if(res.length>0){ 
        dato_actividad=JSON.parse(res); 
        if(selectVereda){
            selectVereda.innerHTML=``;
            selectVereda.innerHTML=`<option value="0">Selecionar</option>`;
            for(let s of dato_actividad){
                selectVereda.innerHTML+=`
                <option value="${s.id_vereda}">${s.nombreVereda} </option> `
            }
        }
        
        }
    }) 
}
listarVeredasPrincipal();//invocacion

/* -----Abrir
cargar actividad Agropecuarias,
esta funccion es la encargada de poblar los select que hacen referencia a la actividad 
agropecuaria
--------------*/
var selectAgro1=document.querySelector('#txt_agro_1');
var selectAgro2=document.querySelector('#txt_agro_2');
var selectAgro3=document.querySelector('#txt_agro_3');

var selectPro1=document.querySelector('#txt_pro_1');
var selectPro2=document.querySelector('#txt_pro_2');
var selectPro3=document.querySelector('#txt_pro_3');
function cargarActividadesAgro(){
    $.ajax({
        url:'../Controller/finca/controlador_listar_ActividadesAgro.php',
        type:'POST'
    }).done(function(res){
        if(res.length>0){
            dato_actividad=JSON.parse(res); 
            

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
// cargarActividadesAgro();
// -------cerrar------------------//


/* ---cargar linea productiva referentes a la actividad agropecuaria
 esta funcion recibe dos parametros, el primer parametro recibe el id de la actividad agropecuaria
 cuyo objetivo es listar todas las lineas productivas referentes a ese id,
 el otro parametro se encarga de identificar en cual select se pintaran los datos consultados 'cambio'-------*/

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



$('#tabla_finca').on('click','.editar',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    // idPer=data.idPersona;
    // console.log(idPer);
    // obtenerIdAgricultor(idPer);
    // const geolocalizacion=navigator.geolocation;
    //  geolocalizacion.getCurrentPosition(getPosition,error,options)//geolocalizador  
    $("#modalActualizarFinca").modal({backdrop:'static', keyboard:false});
    $("#modalActualizarFinca").modal('show');
    // console.log(data);
    $("#txt_longitud").val(data.longitud);
    $("#txt_latitud").val(data.latitud);
    $("#txt_fincaNombre").val(data.nombre_finca);
    $("#txt_hetareas").val(data.hectareas);
    
    console.log(data.ab_agua);
    if(data.ab_agua==1){
        document.getElementById('agua1').checked = true;
    }else{
        document.getElementById('agua0').checked = true;
    }
    
    if(data.e_electrica==1){
        document.getElementById('energia_electrica1').checked = true;
    }else{
        document.getElementById('energia_electrica0').checked = true;
    }


    if(data.e_alternativas==1){
        document.getElementById("energia_alternativa1").checked = true;
    }else{
        document.getElementById("energia_alternativa0").checked = true;
    }
    if(data.s_sanitario==1){
        document.getElementById("servicio_sanitario1").checked = true;
    }else{
        document.getElementById("servicio_sanitario0").checked = true;
    }
    // select de linea productiva
    $('#txt_pro_1').val(data.id_linea_pro1);
    $('#txt_pro_2').val(data.id_linea_pro2);
    $('#txt_pro_3').val(data.id_linea_pro3);
    
    $("#txt_vereda").val(data.id_vereda);
    $("#txt_corregimiento").val(data.idCorregimiento);
    // select de activida agropecuaria
    $('#txt_agro_1').val(data.idAgro1);
    $('#txt_agro_2').val(data.idAgro2);
    $('#txt_agro_3').val(data.idAgro3);
    idFinca=data.idFinca;
   console.log(data);
    
    fincaId=data.idFinca;
    // listarVeredasPrincipal();
    // cargarCorregimientos();
    cargarCorregimientos();
    cargarActividadesAgro();
    cargarLineasProductivas1();
    capturarIdentificadorCorregimiento();
    obcionesLineasPro();

})




//---------------------cargar corregimientos---------------------//

// var selectVereda=document.querySelector('#txt_vereda');
function cargarCorregimientos(){
    $.ajax({
        url:'../Controller/finca/controlador_listar_corregimientos.php',
        type:'POST'
    }).done(function(res){
        if(res.length>0){
            dato=JSON.parse(res); 
            selectCorregimientos.innerHTML=`<option value="0">Selecionar</option>`;
            
            for(let s of dato){
                selectCorregimientos.innerHTML+=`
                <option value="${s.idCorregimiento}">${s.nombre_corregimiento} </option>
                `
            }
        }
    }) 
}
// cargarCorregimientos();
// -----cerrar-------------//


// ----------cargar veredas---------//
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
// esta funcion espara que se carguen por defecto todas las lineas productivas
function cargarLineasProductivas1(){
    let id_productiva=null;
    $.ajax({
        url:'../Controller/finca/controlador_listar_lineas_pro.php',
        type:'POST',
        data:{id_productiva:id_productiva}
    }).done(function(res){
        if(res.length>0){
            
                dato_actividad=JSON.parse(res); 
                // console.log(dato_actividad);
                
                selectPro1.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro1.innerHTML+=`
                    <option value="${s.id_linea_pro}">${s.linea_nombre} </option>
                  `
                } 
                // console.log(dato_actividad);
                
                selectPro2.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro2.innerHTML+=`
                    <option value="${s.id_linea_pro}">${s.linea_nombre} </option>
                  `
                }
                // console.log(dato_actividad);
                
                selectPro3.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro3.innerHTML+=`
                    <option value="${s.id_linea_pro}">${s.linea_nombre} </option>
                  `
                }
        }
    }) 
}
// cargarLineasProductivas1();
//-----cerrar-------//



//


function actualizarFinca(){
    
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
    vereda=$('#txt_vereda').val();
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
        if(linea_pro2!=46 || linea_pro3!=46){
            if(linea_pro2==linea_pro3){
                return Swal.fire("Mensaje De Error","Las lineas productivas no pueden ser iguales ","warning");
            }
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
        r_finca.append('idFinca',idFinca);
       

        let url='../Controller/finca/controlador_actualizar_finca.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(r_finca);
    
        xhttp.onreadystatechange=function(){
            if(this.status==200 && this.readyState==4){
                console.log(this.responseText);
                let datos=JSON.parse(this.responseText);
                if(datos>0){
                    $("#modalActualizarFinca").modal('hide');
                     Swal.fire("Mensaje De Confirmacion","Registro Exitoso ","success");
                     tabla.ajax.reload();
                    
                }else{
                    return Swal.fire("Mensaje De Error","El Registro no se pudo llevar acabo... ","warning");
                }
            }
            
        }
    
}



//----------- abrir gestion de  registro de vegetales-----------------------//

$('#tabla_finca').on('click','.plantas',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }

    $("#modalDecisionVegetal").modal({backdrop:'static', keyboard:false});
    $("#modalDecisionVegetal").modal('show');
    idFinca=data.idFinca;
})


function abrirModalRegistroVegetales(){
    $("#modalRegistrarVegetales").modal({backdrop:'static', keyboard:false});
    $("#modalRegistrarVegetales").modal('show');
    $("#modalRegistrarVegetales").find("input,textarea,select").val("");
}
function registrarPlantas(){
    nombreVegetal=$('#txt_nombrePlanta').val();
    tipoVegetal=$('#txt_tipoVegetal').val();
    cantidadVegetal=$('#txt_vegetales_cantidad').val();
    informacionVegetal=$('#txt_informacionVgt').val();
   if(nombreVegetal.length==0 || tipoVegetal.length==0 
    || cantidadVegetal.length==0 || informacionVegetal.length==0 ){
      return  swal.fire("Mensaje De Error","Por favor complete todos los datos solicitados","warning");   
   }
   var Rplantas = new FormData();
   Rplantas.append('nombreVegetal',nombreVegetal);
   Rplantas.append('tipoVegetal',tipoVegetal);
   Rplantas.append('cantidadVegetal',cantidadVegetal);
   Rplantas.append('informacionVegetal',informacionVegetal);
   Rplantas.append('idFinca',idFinca);

    let url='../Controller/vegetales/controlador_registrar_vegetales.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(Rplantas);

        xhttp.onreadystatechange=function(){
                if(this.status==200 && this.readyState==4){
                    console.log(this.responseText);
                    let datos=JSON.parse(this.responseText);
                    if(datos>0){
                        $("#modalRegistrarVegetales").modal('hide');
                        Swal.fire("Mensaje De Confirmacion","Registro Exitoso ","success");
                        $("#modalRegistrarVegetales").find("input,textarea,select").val("");
                    }else{
                        Swal.fire("Mensaje De Error","El registro no se pudo llevar acabo... ","warning");
                    }
                }
            
        }
    
}



//----------- cerrar gestion de  registro de vegetales-----------------------//


//-------------funcion que redirige a la vista de Vegetales referentes a la finca -------------//


var redirigirVegetales=()=>{
    
    cargar_contenido('contenido_principal','fincas/vista_vegetales.php');
   
}

//-----------cierre---------------------//

//----------- abrir gestion de  registro de animales-----------------------//

$('#tabla_finca').on('click','.animales',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
  
    $("#modalDecisionAnimal").modal({backdrop:'static', keyboard:false});
    $("#modalDecisionAnimal").modal('show');
    idFinca=data.idFinca;
    nombreFinca=data.nombre_finca;

})

function abrirModalRegistroAnimales(){
    $("#modalRegistrarAnimales").modal({backdrop:'static', keyboard:false});
    $("#modalRegistrarAnimales").modal('show');
    $("#modalRegistrarAnimales").find("input,textarea,select").val("");
}

function registrarAnimales(){
    raza=$('#txt_razaAnimal').val();
    tipoAnimal=$('#txt_tipoAnimal').val();
    cantidadAnimales=$('#txt_cantidadAnimales').val();
    nombre_vacunas=$('#txt_nombreVacuna').val();
    informacionAnimal=$('#txt_informacionAnimal').val();
    
   if(raza.length==0 || tipoAnimal.length==0 
    || cantidadAnimales.length==0 || nombre_vacunas.length==0 || informacionAnimal.length==0){
       return swal.fire("Mensaje De Error","Por favor complete todos los campos solicitados","warning");   
   }
   var Ranimales = new FormData();
   Ranimales.append('raza',raza);
   Ranimales.append('tipoAnimal',tipoAnimal);
   Ranimales.append('cantidadAnimal',cantidadAnimales);
   Ranimales.append('nombreVacunas',nombre_vacunas);
   Ranimales.append('informacion',informacionAnimal);
   Ranimales.append('idFinca',idFinca);

    let url='../Controller/animales/controlador_registrar_animales.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(Ranimales);

        xhttp.onreadystatechange=function(){ 
                if(this.status==200 && this.readyState==4){
                    console.log(this.responseText);
                    let datos=JSON.parse(this.responseText);
                    if(datos>0){
                        $("#modalRegistrarAnimales").modal('hide');
                        Swal.fire("Mensaje De Confirmacion","Registro Exitoso ","success");
                        $("#modalRegistrarAnimales").find("input,textarea,select").val("");
                    }else{
                        Swal.fire("Mensaje De Error","El registro no se pudo llevar acabo... ","warning");
                    }
                }
            
        }
    
}


//----------- cerrar gestion de animales-----------------------//

//-------------funcion que redirige a la vista de animales referentes a la finca -------------//



var redirigirAnimales=()=>{
    
    cargar_contenido('contenido_principal','fincas/vista_animales.php');
   
}

//---------cierre---------------------------//


//----------- visualizacion  de datos de finca-----------------------//
// var contenido_global=document.querySelector("#contenido_principal");
$('#tabla_finca').on('click','.vista_datos',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
   
    // $("#txt_actividadAgro").val(data.actividadAgropecuaria);
    cargar_contenido('contenido_principal','fincas/vista_productor.php');
   
    idFinca=data.idFinca;
    
    mostrar();
})
// ------carga todos los datos referentes al dueno de la finca--------------
function mostrar(){
    var general = new FormData();
    general.append('idFinca',idFinca);
    let url='../Controller/finca/controlador_datos_generales.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(general);

    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            // console.log(this.responseText);
            let datos=JSON.parse(this.responseText);
            
            if(datos.length>0){
                // console.log(datos);
                dato=datos[0];
                // console.log(dato);
                console.log(dato);
                document.querySelector('#mapa').innerHTML=`
                <div class="google-maps">
                    <iframe src="https://maps.google.com/?q=${dato.latitud},${dato.longitud}&z=14&t=m&output=embed" width="300" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                `
                document.querySelector('#_nombreCompleto').innerHTML=`<p>${dato.nombreCompleto}</p>`;
                document.querySelector('#_tipoIdentificacion').innerHTML=`<p>${dato.tipo_identificacion}</p>`;
                document.querySelector('#_numeroIdentificacion').innerHTML=`<p>${dato.num_identificacion}</p>`;

                if(dato.fecha_ncm){
                    var fechaDeNacimiento = new Date(dato.fecha_ncm);
                    var hoy = new Date();
                    edad=parseInt((hoy - fechaDeNacimiento) / (1000*60*60*24*365));
                    document.querySelector('#_edad').innerHTML=`<p>${edad}</p>`;
                }

                document.querySelector('#_fechaNacimiento').innerHTML=`<p>${dato.fecha_ncm}</p>`;
                
                if(dato.sexo=='F'){
                    document.querySelector('#_sexo').innerHTML=`<p>Femenino</p>`;
                }else{
                    document.querySelector('#_sexo').innerHTML=`<p>Maculino</p>`;
                }
                
            
                document.querySelector('#_etnia').innerHTML=`<p>${dato.etnia}</p>`;
                document.querySelector('#_escolaridad').innerHTML=`<p>${dato.nivel_escolaridad}</p>`;
                document.querySelector('#_personasAcargo').innerHTML=`<p>${dato.PersonasAcargo}</p>`;
                document.querySelector('#_nombreFinca').innerHTML=`<p>${dato.nombre_finca}</p>`;
                
                document.querySelector('#_actividadAgropecuaria1').innerHTML=`<p>${dato.agroNombre1}</p>`;
                document.querySelector('#_lineaProductiva1').innerHTML=`<p>${dato.l1nombre}</p>`;
                document.querySelector('#_actividadAgropecuaria2').innerHTML=`<p>${dato.agroNombre2}</p>`;
                document.querySelector('#_lineaProductiva2').innerHTML=`<p>${dato.l2nombre}</p>`;
                document.querySelector('#_actividadAgropecuaria3').innerHTML=`<p>${dato.agroNombre3}</p>`;
                document.querySelector('#_lineaProductiva3').innerHTML=`<p>${dato.l3nombre}</p>`;

                document.querySelector('#_vereda').innerHTML=`<p>${dato.nombreVereda}</p>`;
                document.querySelector('#_corregimiento').innerHTML=`<p>${dato.nombre_corregimiento}</p>`;
                document.querySelector('#_municipio').innerHTML=`<p>${dato.nombre_mncp}</p>`;
                document.querySelector('#_via').innerHTML=`<p>via ${dato.nombreVereda}</p>`;
                document.querySelector('#_latitud').innerHTML=`<p>${dato.latitud}</p>`;
                document.querySelector('#_longitud').innerHTML=`<p>${dato.longitud}</p>`;   
                document.querySelector('#_departamento').innerHTML=`<p>${dato.nombre_department}</p>`;
                if(dato.ab_agua=='0'){
                    document.querySelector('#_ab_agua').innerHTML=`<p>No</p>`;
                }else{
                    document.querySelector('#_ab_agua').innerHTML=`<p>Si</p>`;
                }

                if(dato.e_electrica=='0'){
                    document.querySelector('#_energiaElectrica').innerHTML=`<p>No</p>`;
                
                }else{
                    document.querySelector('#_energiaElectrica').innerHTML=`<p>Si</p>`;
                }

                if(dato.s_sanitario=='0'){
                    document.querySelector('#_servicioSanitario').innerHTML=`<p>No</p>`;
                
                }else{
                    document.querySelector('#_servicioSanitario').innerHTML=`<p>Si</p>`;
                }

                if(dato.e_alternativas=='0'){
                    document.querySelector('#_energiaAlternativas').innerHTML=`<p>No</p>`;
                
                }else{
                    document.querySelector('#_energiaAlternativas').innerHTML=`<p>Si</p>`;
                
                }
                
                

                
                
            }else{
                Swal.fire("Mensaje De Error","No se pueden visualizar los datos... ","warning");
            }
        }
        
    }

}

//-----------visualizacion de datos de finca-----------------------//


// -------  funciones que permiten cargar mapa --------------//

function showGoogleMaps() {
    //Creamos el punto a partir de la latitud y longitud de una dirección:
    // var point = new google.maps.LatLng('41.397122', '2.152873');
    var point = new google.maps.LatLng('2.622435','-76.569198');
//  '2.606093'  , '-76.561364'
    //Configuramos las opciones indicando zoom, punto y tipo de mapa
    var myOptions = {
        zoom: 15,
        center: point,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //Creamos el mapa y lo asociamos a nuestro contenedor
    var map = new google.maps.Map(document.getElementById("map-container-google-3"), myOptions);

    //Mostramos el marcador en el punto que hemos creado
    var marker = new google.maps.Marker({
        position: point,
        map: map,
        title: "Nombre empresa - Calle Balmes 192, Barcelona"
    });
}


function imprimirDatos() {
    

    var divToPrint=document.getElementById('contenedor');

    var newWin=window.open('','Print-Window');
  
    newWin.document.open();
  
    newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  
    newWin.document.close();
  
    setTimeout(function(){newWin.close();},10);
  }


// let datos=[{age:12, name:'julian', lastName:'calambas'},
//         {age:14, name:'camila', lastName:'ortiz'}
// ]
// let nuevo=[];
// if(datos){
//     datos.map(({age,name,lastName})=>{
//         nuevo.push({age,name,lastName});
//     })
// }

// console.log(nuevo);



