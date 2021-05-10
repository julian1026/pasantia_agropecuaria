var tabla;
function listar_fincas(){
tabla = $("#tabla_reporte2").DataTable({
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
       {"data":"longitud"},  
       {"data":"latitud"},  
       {"data":"nombreVereda"},  
       {"data":"num_identificacion"},
       {"data":"registrador"},
       {"data":"fecha_registro",render: function (data, type, row ) {
       return data.substr(0,10);
      }
      }
    ],

   "language":idioma_espanol,
   select: true
});
}

// funcion de prueba
// function prueba(){

//     let url='../Controller/finca/controlador_finca_listar.php';
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
// prueba();

function CargarTecnicos(){
    selectTecnicos=document.getElementById('txt_tecnicoSelect');
    $.ajax({
        url:'../Controller/tecnicos/controlador_listar_tecnicos.php',
        type:'POST'
    }).done(function(res){
        if(res.length>0){
            dato=JSON.parse(res); 
            // console.log(dato);

            selectTecnicos.innerHTML=`<option value="0">Selecionar</option>`;
            selectTecnicos.innerHTML=`<option value="0">Selecionar</option>`;
            
            if(dato){
                // console.log(dato)
                for(let s of dato){
                    selectTecnicos.innerHTML+=`
                    <option value="${s.idPersona}">${s.primer_nombre} ${s.segundo_nombre} ${s.primer_apellido} ${s.segundo_apellido} </option>
                    `
                }
            }
         
        }
    }) 
}






function cargarReporte(){
    let cedulaTecnico=document.getElementById('txt_tecnicoSelect').value;
    let fechaI=document.getElementById('txt-fechaInicio').value;
    let fechaf=document.getElementById('txt-fechaFinal').value;

    if(cedulaTecnico==0 || !fechaI || !fechaf){
        return Swal.fire("Mensaje De Error","Por favor debe seleccionar un tecnico, una fecha inicial y final  ","warning");
    }

    if(fechaI>fechaf){
        return Swal.fire("Mensaje De Error","La fecha inicial debe ser menor a la final ","warning");
    }


    $.ajax({
        url:'../Controller/finca/controlador_reporte2.php',
        type:'POST',
        data:{cedula:cedulaTecnico,fechaI:fechaI,fechaF:fechaf},
    }).done(function(res){
        if(res){
            dato=JSON.parse(res); 
            let numero=dato.length;
            if(numero>0){
                // console.log(dato);
                listarReporte2(dato);
            }else{
                Swal.fire('mensaje de Advertencia','No se encontraron registros','warning');
            }
           
        }
    }) 
}


function listarReporte2(data1){
    tabla = $("#tabla_reporte2").DataTable({
        "ordering":false,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [6, 12, 24, 48, -1], [6, 12, 24, 48, "All"] ],
        "pageLength": 6,
        "destroy":true,
        "async": false ,
        "processing": true,   
         "data":data1,//asignancion de data externa
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
            {"data":"longitud"},  
            {"data":"latitud"},  
            {"data":"nombreVereda"},  
            {"data":"num_identificacion"},
            {"data":"registrador"},
            {"data":"fecha_registro",render: function (data, type, row ) {
            return data.substr(0,10);
           }
           }
         ],
     
        "language":idioma_espanol,
        select: true
     });
     }


    

function recargar(){
    cargar_contenido('contenido_principal','fincas/vista_reporteDos.php');
}


   
          
                    
                    
