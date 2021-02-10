var tabla;
function listar_vegetales(){
tabla = $("#tabla_Vegetales").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/vegetales/controlador_vegetales_listar.php",
       type:'POST',
       data: {"idFinca": idFinca}
   },
   "columns":[
    {"data":"idPlantaciones"},
       {"data":"nombre"},
       {"data":"tipo"},
       {"data":"vegetales_cantidad"},
       {"data":"informacion"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editarVegetales btn btn-warning'><i class='fa fa-edit'></i> </button>&nbsp;"
       }
   ],

   "language":idioma_espanol,
   select: true
});
}


//------abriendo modal de actualizar vegetales---------------//
$('#tabla_Vegetales').on('click','.editarVegetales',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    $("#modalActualizarVegetales").modal({backdrop:'static', keyboard:false});
    $("#modalActualizarVegetales").modal('show');
 
    idVegetal=data.idPlantaciones;
    // console.log(idVegetal);
    // console.log(data);
    $("#txt_updt_nombrePlanta").val(data.nombre);
    $("#txt_updt_tipoVegetal").val(data.tipo);
    $("#txt_updt_vegetales_cantidad").val(data.vegetales_cantidad);
    $("#txt_updt_informacionVgt").val(data.informacion);
    

})

//-------fin--------------//////


//-------actualizacion de vegetales---------//

var actualizarVegetales=()=>{
   
    nombreVegetal=$('#txt_updt_nombrePlanta').val();
    tipo_vegetal=$('#txt_updt_tipoVegetal').val();
    cantidad_vegetal=$('#txt_updt_vegetales_cantidad').val();
    informacionVegetal=$('#txt_updt_informacionVgt').val();
    
    // console.log(hetereas,linea_productiva,actividad_Agropecuaria,vereda);
    if(nombreVegetal.length==0 || tipo_vegetal.length==0 || cantidad_vegetal.length==0){
            return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
        }

        var updt_vegetales = new FormData();

        updt_vegetales.append('nombreVegetal',nombreVegetal);
        updt_vegetales.append('tipoVegetal',tipo_vegetal);
        updt_vegetales.append('cantidadVegetal',cantidad_vegetal);
        updt_vegetales.append('informacionVegetal',informacionVegetal);
        updt_vegetales.append('idVegetal',idVegetal);
        let url='../Controller/vegetales/controlador_actualizar_vegetales.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(updt_vegetales);
    
        xhttp.onreadystatechange=function(){
            if(this.status==200 && this.readyState==4){
                let datos=JSON.parse(this.responseText);
                if(datos>0){
                    $("#modalActualizarVegetales").modal('hide');
                     Swal.fire("Mensaje De Confirmacion","Actualizacion Exitosa ","success");
                    tabla.ajax.reload();
                }else{
                    Swal.fire("Mensaje De Error","La actualizacion no se pudo llevar acabo... ","warning");
                }
            }
            
        }
}

//-----cerrar actualizacion de vegetales-------//


//---funcion para listar Vegetales en tabla normal----------

function listarVegetales2(){
    $.ajax({
        url:'../Controller/vegetales/controlador_vegetales_listar.php',
        type:'POST',
        data:{
            idFinca:idFinca
        }
    }).done(function(res){
       
          datos=JSON.parse(res);
          datosV=datos.data;
          if(datosV){
            if(datosV.length>0){
                     document.getElementById('pintarVegetales').innerHTML='';
                        for(vegetales of datosV){
                        document.getElementById('pintarVegetales').innerHTML+=`
                        <tr>
                            <td>${vegetales.nombre}</td>
                            <td>${vegetales.tipo}</td>
                            <td>${vegetales.vegetales_cantidad}</td>
                            <td>${vegetales.informacion}</td>
                        </tr>`;
                    }
            }
        }else{
            document.getElementById('tablaVegetalesVisualizacion').innerHTML='';
        }
    })
}
