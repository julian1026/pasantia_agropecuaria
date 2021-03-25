var tabla;
function listar_fincas(){
tabla = $("#tabla_visitar_finca").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/finca/controlador_finca_listar.php",
       type:'POST'
   },
   "columns":[
       {"data":"idFinca"},
       {"data":"nombre_finca"},
       {"data":"linea_nombre"},
       {"data":"num_identificacion"},
       {"data":"registrador"},
       {"data":"nombreVereda"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='reporte btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;"}
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
    cargar_contenido('contenido_principal','fincas/vista_reportes.php');

})
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

 function cargar(){


    fetch('http://localhost/agropecuaria/public/api/v1/personas')
    // Handle success
    .then(response => response.json())  // convert to json
    .then(json => console.log(json))    //print data to console
    .catch(err => console.log('Request Failed', err)); // Catch errors
}
cargar();


// let datos=[3,14,15,92,65,35,89,79,32,38];

// datos.map((d,i)=>{
//     let string='';
//     for(i=0; i<d; i++){
//         string+='*';
//     }
//     console.log(string);
// })

