
var tabla;
var paint;
function listar_fincas(){

tabla = $("#tabla_visitar_finca").DataTable({
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
   "columns":[
       {"data":"numero"},
       {"data":"nombre_finca"},
       {"data":"linea_nombre"},
       {"data":"num_identificacion"},
       {"data":"registrador"},
       {"data":"nombreVereda"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='reporte btn btn-primary'><i class='fa fa-edit'>&nbsp; Visitar</i> </button>&nbsp;"}
   ],
   
   "language":idioma_espanol,
   select: true
});
}


$('#tabla_visitar_finca').on('click','.reporte',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    idFinca=data.idFinca;
    cargar_contenido('contenido_principal','fincas/vista_reportes.php');
    

})

function listar(){
  const nuevo4 = new FormData();
  nuevo4.append('idFinca',idFinca);
  nuevo4.append('cod',1);
  $.ajax({
    url:'../Controller/visitaFinca/controlador_visitarFinca.php',
    type:'POST',
    data:nuevo4,
    processData: false,  // tell jQuery not to process the data
    contentType: false   // tell jQuery not to set contentType
}).done(function(res){
    // console.log(res);
    valor=JSON.parse(res);
    datos=valor[0];
    cargarValoresCabecera(datos);
})
}

function listarAll(){
    const nuevo5 = new FormData();
    nuevo5.append('idFinca',idFinca);
    nuevo5.append('cod',2);
    $.ajax({
      url:'../Controller/visitaFinca/controlador_visitarFinca.php',
      type:'POST',
      data:nuevo5,
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
  }).done(function(res){
     var valor=JSON.parse(res);
    //  console.log(valor);
    mostrar(valor);
  })
}



function mostrar(arreglo){
    
    var paint=document.querySelector('#listaVisitasUX');
    paint.innerHTML='';
        numero=arreglo.length;
        if(arreglo){
            arreglo.map(valor=>{
                paint.innerHTML+=`
                <div class="col-md-12 bg-success">
                        <div class="card text-white ">
                        <div class="card-header">
                            visita #<b>${numero}</b>
                            <div class="pull-right">
                                <b>Registrador :</b> ${valor.nombreRegistrador}  <b>CC:</b>${valor.registrador_cedula}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Objectivo de la Visita</label>
                                    <p>${valor.objetivoVisita}</p>
        
                                    <br>
                                    <label>Sistema de Produccion</label>
                                    <p>${valor.sistemasProduccion}</p>
                                    <br>
                                    <label>Situacion Encontrada</label>
                                    <p>${valor.situacionEncontrada}</p>
                                    <br>
                                    <label>Acividades Realizadas/Recomendaciones/Compromisos</label>
                                    <p>${valor.actividadRealizada}</p>
                                    <br>
                                    <label>Actividad Realizada/Recomendacion Ambiental</label>
                                    <p>${valor.actividadPendientes}</p>
                                    <br>
        
                                </div>
        
                            </div>
        
                        </div>
                    </div>
                </div>
                
                `;
                numero--;
            })
        }

}



function cargarValoresCabecera(datos){
    document.querySelector('#txt-beneficiario').innerHTML=`<p>${datos.nombreCompleto}</p>`;
    document.querySelector('#txt-cc').innerHTML=`<p>${datos.num_identificacion}</p>`;
    document.querySelector('#txt-finca').innerHTML=`<p>${datos.nombre_finca}</p>`;
    document.querySelector('#txt-corregimiento').innerHTML=`<p>${datos.nombre_corregimiento}</p>`;
    document.querySelector('#txt-veredad').innerHTML=`<p>${datos.nombreVereda}</p>`;

}

function registrarVisita(){
  var hoy=new Date();
  var fecha=hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();

  let visita=document.getElementById('txt_objetivo').value;
  let sistema=document.getElementById('txt_produccion').value;
  let situacion=document.getElementById('txt_situacion').value;
  let actividad1=document.getElementById('txt_actividad1').value;
  let actividad2=document.getElementById('txt_actividad2').value;
  const nuevo3 = new FormData();
  if(!visita || !sistema || !situacion || !actividad1 || !actividad2){
    return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
  }

  console.log(visita,sistema,situacion,actividad1,actividad2,fecha);
  nuevo3.append('visita',visita);
  nuevo3.append('sistemas',sistema);
  nuevo3.append('situacion',situacion);
  nuevo3.append('actividad1',actividad1);
  nuevo3.append('actividad2',actividad2);
  nuevo3.append('fecha',fecha);
  nuevo3.append('idFinca',idFinca);

  $.ajax({
        url:'../Controller/finca/controlador_registro_visitarFinca.php',
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
                Swal.fire("Mensaje De Confirmacion "," Registro exitoso ","success");
                limpiarFormularioR(); 
                listarAll();         
            }
        }else{
            return Swal.fire("Mensaje De Error","Actualizacion Fallida ","warning");
        }   
    })
}

function limpiarFormularioR(){
  document.getElementById('txt_objetivo').value='';
  document.getElementById('txt_produccion').value='';
  document.getElementById('txt_situacion').value='';
  document.getElementById('txt_actividad1').value='';
  document.getElementById('txt_actividad2').value='';
}



var tabla1;

function listar_fincasActualizar(){
  
    const nuevo6 = new FormData();
    nuevo6.append('cod',3);
    tabla1 = $("#tabla_fincaActualizar").DataTable({
        "ordering":false,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [6, 12, 24, 48, -1], [6, 12, 24, 48, "All"] ],
        "pageLength": 6,
        "destroy":true,
        "async": false ,
        "processing":true,
        "ajax":{
            "url":"../Controller/visitaFinca/controlador_visitarFinca.php",
            type:'POST',
            data:{'cod':3,'idFinca':idFinca}
        },
        "columns":[
            {"data":"numero"},
            {"data":"objetivoVisita"},
            {"data":"registrador_cedula"},
             {"defaultContent":
            "<button style='font-size:10px;' type='button' class='reporte btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;"}
        ],
     
        "language":idioma_espanol,
        select: true
     });
}

function UXactualizarFinca(){
    cargar_contenido('contenido_principal','fincas/vista_visitarFincaActualizar.php');
}


$('#tabla_fincaActualizar').on('click','.reporte',function(){
    var data=tabla1.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla1.row(this).child.isShown()){
        var data=tabla1.row(this).data();
    }
    $("#modal_actualizarRegistroFinca").modal({backdrop:'static', keyboard:false});
    $("#modal_actualizarRegistroFinca").modal('show');
    console.log(data);
    idVisitas=data.idvisitas;
    $("#txt_objetivo").val(data.objetivoVisita);
    $("#txt_produccion").val(data.sistemasProduccion);
    $("#txt_situacion").val(data.situacionEncontrada);
    $("#txt_actividad1").val(data.actividadRealizada);
    $("#txt_actividad2").val(data.actividadPendientes);
    // document.querySelector('#')

})

function ActualizarVisita(){

    let visita=document.getElementById('txt_objetivo').value;
    let sistema=document.getElementById('txt_produccion').value;
    let situacion=document.getElementById('txt_situacion').value;
    let actividad1=document.getElementById('txt_actividad1').value;
    let actividad2=document.getElementById('txt_actividad2').value;
    const nuevo7 = new FormData();
    if(!visita || !sistema || !situacion || !actividad1 || !actividad2){
      return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
    }
    nuevo7.append('objetivoVisita',visita);
    nuevo7.append('sistemasProduccion',sistema);
    nuevo7.append('situacionEncontrada',situacion);
    nuevo7.append('actividadRealizada',actividad1);
    nuevo7.append('actividadPendientes',actividad2);
    nuevo7.append('idVisitas',idVisitas);
    nuevo7.append('cod',4);
    nuevo7.append('idFinca',null);
    $.ajax({
        url:'../Controller/visitaFinca/controlador_visitarFinca.php',
        type:'POST',
        data:nuevo7,
        processData: false,  // tell jQuery not to process the data
        contentType: false   // tell jQuery not to set contentType
    }).done(function(res){
        // console.log(res);
        valor=JSON.parse(res);
        // console.log(valor);
        if(valor>0){
            if(valor==1){
                $("#modal_actualizarRegistroFinca").modal('hide');
                Swal.fire("Mensaje De Confirmacion "," Actualizacion Exitosa","success");
                     tabla1.ajax.reload();
                limpiarFormularioR();           
            }
        }else{
            return Swal.fire("Mensaje De Error","Actualizacion Fallida ","warning");
        }   
    })
}



function GeneratePdf() {
    let element=document.querySelector('#pdf');
    var opt = {
        margin:       0.5,
        filename:     'historialVisitas.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
      };
      html2pdf(element, opt);

}


/*
function prueba(){

    let url='../Controller/finca/controlador_finca_listar.php';
    const xhttp=new XMLHttpRequest();
    xhttp.open('POST',url,true);
    xhttp.send();

    xhttp.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            let datos=JSON.parse(this.responseText);
            // console.log(this.responseText);
            console.log(datos);
        }
    }
}
prueba();

*/


// https://www.dolarsi.com/api/api.php?type=valoresprincipales

//  function cargar(){


//     const data = { user_name: 'admin123',contrasena:'08c2972134a06141166d5cb9796ec699' };
    
//      fetch('http://localhost/agropecuaria/public/api/v1/autenticar/login', {
//         method: 'POST', // or 'PUT'
//         headers: {
//           'Content-Type': 'application/json',
//         },
//         body: JSON.stringify(data),
//       })
//       .then(response => response.json())
//       .then( data => {
//         console.log('Success:', data);
//       })
//       .catch((error) => {
//         console.error('Error:', error);
//       });


//     fetch('http://localhost/agropecuaria/public/api/v1/personas')
//     // Handle success
//     .then(response => response.json())  // convert to json
//     .then(json => console.log(json))    //print data to console
//     .catch(err => console.log('Request Failed', err)); // Catch errors


   
// }
// cargar();


// let datos=[3,14,15,92,65,35,89,79,32,38];

// datos.map((d,i)=>{
//     let string='';
//     for(i=0; i<d; i++){
//         string+='*';
//     }
//     console.log(string);
// })

