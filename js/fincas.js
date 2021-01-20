var tabla;
function listar_fincas(){
tabla = $("#tabla_finca").DataTable({
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
       {"data":"actividadAgropecuaria"},
       {"data":"lineaProductiva"},
       {"data":"hectareas"},  
       {"data":"latitud"},
       {"data":"longitud"},
       {"data":"fecha_registro"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editar btn btn-warning'><i class='fa fa-edit'></i> </button>&nbsp;"+
       "<button style='font-size:10px;' type='button' class='plantas btn btn-secondary'><i class='fa fa-pagelines'></i>"
        + "</button>&nbsp; <button style='font-size:10px;' type='button' class='animales btn btn-secondary'><i class='fa fa-paw'></i></button>"
        + "</button>&nbsp; <button style='font-size:10px;' type='button' class='vista btn btn-secondary'><i class='fa  fa-eye'></i></button>"}
   ],

   "language":idioma_espanol,
   select: true
});
}
cargarVeredas();
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
    $("#txt_actividadAgro").val(data.actividadAgropecuaria);
    $("#txt_lineaProductiva").val(data.lineaProductiva);
    $("#txt_vereda").val(data.id_Vereda);
    fincaId=data.idFinca;
})




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

//
var actualizarFinca=()=>{
    console.log('eres campeon');
    longitud=$('#txt_longitud').val();
    latitud=$('#txt_latitud').val();
    nombre_finca=$('#txt_fincaNombre').val();
    hetereas=$('#txt_hetareas').val();
    actividad_Agropecuaria=$('#txt_actividadAgro').val();
    linea_productiva=$('#txt_lineaProductiva').val();
    vereda=$('#txt_vereda').val();
    idFinca=fincaId;
    console.log(hetereas,linea_productiva,actividad_Agropecuaria,vereda);
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
                     Swal.fire("Mensaje De Confirmacion","Actualizacion Exitosa ","success");
                    tabla.ajax.reload();
                }else{
                    Swal.fire("Mensaje De Error","La actualizacion no se pudo llevar acabo... ","warning");
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
    // idPer=data.idPersona;
    // console.log(idPer);
    // obtenerIdAgricultor(idPer);
    // const geolocalizacion=navigator.geolocation;
    //  geolocalizacion.getCurrentPosition(getPosition,error,options)//geolocalizador  
    $("#modalRegistrarVegetales").modal({backdrop:'static', keyboard:false});
    $("#modalRegistrarVegetales").modal('show');
    // console.log(data);
    // $("#txt_longitud").val(data.longitud);
    // $("#txt_latitud").val(data.latitud);
    // $("#txt_fincaNombre").val(data.nombre_finca);
    // $("#txt_hetareas").val(data.hectareas);
    // $("#txt_actividadAgro").val(data.actividadAgropecuaria);
    // $("#txt_lineaProductiva").val(data.lineaProductiva);
    // $("#txt_vereda").val(data.id_Vereda);
    // fincaId=data.idFinca;
})



//----------- cerrar gestion de  registro de vegetales-----------------------//



//----------- abrir gestion de  registro de vegetales-----------------------//

$('#tabla_finca').on('click','.animales',function(){
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
    $("#modalRegistrarAnimales").modal({backdrop:'static', keyboard:false});
    $("#modalRegistrarAnimales").modal('show');
    // console.log(data);
    // $("#txt_longitud").val(data.longitud);
    // $("#txt_latitud").val(data.latitud);
    // $("#txt_fincaNombre").val(data.nombre_finca);
    // $("#txt_hetareas").val(data.hectareas);
    // $("#txt_actividadAgro").val(data.actividadAgropecuaria);
    // $("#txt_lineaProductiva").val(data.lineaProductiva);
    // $("#txt_vereda").val(data.id_Vereda);
    // fincaId=data.idFinca;
})



//----------- cerrar gestion de  registro de vegetales-----------------------//
