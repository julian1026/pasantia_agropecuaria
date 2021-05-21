var tabla;

function listar_lineasProductivas(){
tabla = $("#lineasProductivas").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [6, 12, 24, 48, -1], [6, 12, 24, 48, "All"] ],
   "pageLength": 6,
   "destroy":true,
   "async": false ,
   "processing": true,  
   "ajax":{
       "url":"../Controller/lineasProductivas/controlador_listarLineaspro.php",
       type:'POST',
       data:{"cod":1}
   },
   "columns":[
       {"data":"linea_nombre"},
       {"data":"clase_nombre"},

        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i>Editar </button>&nbsp;"
    //    +
    //    "<button style='font-size:10px;' type='button' class='plantas btn btn-secondary'><i class='fa fa-leaf'></i>"
    //     + "</button>&nbsp; <button style='font-size:10px;' type='button' class='animales btn btn-secondary'><i class='fa fa-paw'></i></button>"
    //     + "</button>&nbsp; <button style='font-size:10px;' type='button' class='vista_datos btn btn-secondary'><i class='fa  fa-eye'></i></button>"
    }
   ],

   "language":idioma_espanol,
   select: true
});
}


var selectPro1=document.querySelector('#txt_com_clase_editar');

function cargarClasesProductivas(){
    $.ajax({
        url:'../Controller/lineasProductivas/controlador_listarLineaspro.php',
        type:'POST',
        data:{cod:2}
    }).done(function(res){
        if(res.length>0){
        
                dato_actividad=JSON.parse(res); 
                // console.log(dato_actividad);
                selectPro1.innerHTML='';
                selectPro1.innerHTML=`<option value="0">Selecionar</option>`;
                for(let s of dato_actividad){
                    selectPro1.innerHTML+=`
                    <option value="${s.id_clase_pro}">${s.clase_nombre} </option>
                  `
                }
            
        }
    }) 
}
 

function registrarLineaPro(){
    var clase=document.getElementById('txt_com_clase_editar').value;
    var linea=document.getElementById('txt_lineaProductiva').value;

    console.log(clase)
    console.log(linea)
    if(clase=='0' ){
        return Swal.fire("Mensaje De Error","Por favor seleccionar clase productiva ","warning");
    }
    if(linea.length==0){
        return Swal.fire("Mensaje De Error","Por favor ingresar linea productiva ","warning");
    }


    $.ajax({
        url:'../Controller/lineasProductivas/controlador_listarLineaspro.php',
        type:'POST',
        data:{cod:3,clase,linea}
    }).done(function(res){
        if(res==1){
        
            Swal.fire("Mensaje De Confirmacion","Registro Exitoso ","success");
            tabla.ajax.reload();
            limpiar();
        }
    }) 
}

function limpiar() {
    document.getElementById('txt_com_clase_editar').value='';
    document.getElementById('txt_lineaProductiva').value='';
}



$('#lineasProductivas').on('click','.editar',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }

    $("#modalDecisionVegetal").modal({backdrop:'static', keyboard:false});
    $("#modalDecisionVegetal").modal('show');

    document.getElementById('txt_lineaProductiva').value=data.linea_nombre;
    document.getElementById('txt_idLinea').value=data.id_linea_pro;
    cambioBoton();
})

function cambioBoton(){
    let contenedor=document.getElementById('cambio');
    contenedor.innerHTML=` <button onclick="actualizarLineaPro()" class="btn btn-primary">Actualizar</button>
    <button onclick="cancelarLineaPro()" class="btn btn-danger">Cancelar</button>`
}

function cancelarLineaPro() {
    let contenedor=document.getElementById('cambio');
    limpiar();
    contenedor.innerHTML=`<button onclick="registrarLineaPro()" class="btn btn-success">Registrar</button>`;
}



function actualizarLineaPro() {

    var clase=document.getElementById('txt_com_clase_editar').value;
    var linea=document.getElementById('txt_lineaProductiva').value;
    var idLinea=document.getElementById('txt_idLinea').value;

    if(clase=='0' ){
        return Swal.fire("Mensaje De Error","Por favor seleccionar la clase productiva ","warning");
    }
    if(linea.length==0){
        return Swal.fire("Mensaje De Error","Por favor ingresar linea productiva ","warning");
    }


    $.ajax({
        url:'../Controller/lineasProductivas/controlador_listarLineaspro.php',
        type:'POST',
        data:{cod:4,clase,linea,idLinea}
    }).done(function(res){
        if(res==1){
        
            Swal.fire("Mensaje De Confirmacion","Actualizacion Exitosa ","success");
            cancelarLineaPro();
            tabla.ajax.reload();
            
        }
    }) 
}






// function prueba(){

//     let url='../Controller/lineasProductivas/controlador_listarLineaspro.php';
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