var tabla;
function listar_animales(){
tabla = $("#tabla_Animales").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
   "pageLength": 10,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/animales/controlador_animales_listar.php",
       type:'POST',
       data: {"idFinca": idFinca}
   },
   "columns":[
    {"data":"idAnimales"},
       {"data":"tipo"},
       {"data":"raza"},
       {"data":"nombre_vacunas"},
       {"data":"cantidad_animales"},
       {"data":"informacion"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editarAnimales btn btn-warning'><i class='fa fa-edit'></i> </button>&nbsp;"
       }
   ],

   "language":idioma_espanol,
   select: true
});
}

//------abriendo modal de actualizar animales---------------//
$('#tabla_Animales').on('click','.editarAnimales',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    $("#modalActualizarAnimales").modal({backdrop:'static', keyboard:false});
    $("#modalActualizarAnimales").modal('show');
 
    idAnimal=data.idAnimales;
    // console.log(idVegetal);
    // console.log(data);
    $("#txt_updt_tipoAnimal").val(data.tipo);
    $("#txt_updt_razaAnimal").val(data.raza);
    $("#txt_updt_nombreVacuna").val(data.nombre_vacunas);
    $("#txt_updt_cantidadAnimales").val(data.cantidad_animales);
    $("#txt_updt_informacionAnimal").val(data.informacion)

})

//-------fin--------------//////

//-------actualizacion de animales---------//

var actualizarAnimales=()=>{
   
    tipoAnimal=$('#txt_updt_tipoAnimal').val();
    razaAnimal=$('#txt_updt_razaAnimal').val();
    nombreVacuna=$('#txt_updt_nombreVacuna').val();
    cantidadAnimal=$('#txt_updt_cantidadAnimales').val();
    informacionAnimal=$('#txt_updt_informacionAnimal').val();
    // console.log(hetereas,linea_productiva,actividad_Agropecuaria,vereda);
    if(tipoAnimal.length==0 || cantidadAnimal.length==0 || informacionAnimal.length==0){
            return Swal.fire("Mensaje De Error","Por favor verificar que los campos se encuentren diligenciados ","warning");
        }

        var updt_animales = new FormData();

        updt_animales.append('tipoAnimal',tipoAnimal);
        updt_animales.append('razaAnimal',razaAnimal);
        updt_animales.append('nombreVacuna',nombreVacuna);
        updt_animales.append('cantidadAnimal',cantidadAnimal);
        updt_animales.append('informacionAnimal',informacionAnimal);
        updt_animales.append('idAnimal',idAnimal);
        let url='../Controller/animales/controlador_actualizar_animales.php';
        const xhttp=new XMLHttpRequest();
        xhttp.open('POST',url,true);
        xhttp.send(updt_animales);
    
        xhttp.onreadystatechange=function(){
            if(this.status==200 && this.readyState==4){
                let datos=JSON.parse(this.responseText);
                if(datos>0){
                    $("#modalActualizarAnimales").modal('hide');
                     Swal.fire("Mensaje De Confirmacion","Actualizacion Exitosa ","success");
                    tabla.ajax.reload();
                }else{
                    Swal.fire("Mensaje De Error","La actualizacion no se pudo llevar acabo... ","warning");
                }
            }
            
        }
}

//-----cerrar actualizacion de animales-------//

// funcion para listar animales, vista agricultor-----//

/*function listarAnimales2(){
    $.ajax({
        url:'../Controller/animales/controlador_animales_listar.php',
        type:'POST',
        data:{
            idFinca:idFinca
        }
    }).done(function(res){
       
          datos=JSON.parse(res);
          datosV=datos.data;
          if(datosV){
                if(datosV.length>0){
                    document.getElementById('pintarAnimales').innerHTML='';
                        for(animales of datosV){
                            document.getElementById('pintarAnimales').innerHTML+=`
                            <tr>
                                <td>${animales.tipo}</td>
                                <td>${animales.raza}</td>
                                <td>${animales.cantidad_animales}</td>
                                <td>${animales.nombre_vacunas}</td>
                                <td>${animales.informacion}</td>
                            </tr>`;
                        }
                    }
                }else{
                    document.getElementById('tablaAnimalesVisualizacion').innerHTML='';
                }
    })
}
*/