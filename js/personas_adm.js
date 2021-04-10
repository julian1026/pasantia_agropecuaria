var tabla;
function listar_personaADM(){
tabla = $("#tabla_personaADM").DataTable({
   "ordering":false,
   "paging": true,
   "searching": { "regex": true },
   "lengthMenu": [ [6, 12, 24, 48, -1], [6, 12, 24, 48, "All"] ],
   "pageLength": 6,
   "destroy":true,
   "async": false ,
   "processing": true,
   "ajax":{
       "url":"../Controller/persona/controlador_personal_adm_listar.php",
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
            
               return "<button style='font-size:10px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i> </button>&nbsp;"
                +"<button style='font-size:10px;' type='button'   class='datos btn btn-white'><i class='fa  fa-eye'></i> </button>";
           }
       }
   ],

   "language":idioma_espanol,
   select: true
});
}



$('#tabla_personaADM').on('click','.editar',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    
    $("#modal_actualizar_personales").modal({backdrop:'static', keyboard:false});
    $("#modal_actualizar_personales").modal('show');
    console.log(data);
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

$('#tabla_personaADM').on('click','.datos',function(){
    var data=tabla.row($(this).parents('tr')).data();
    // console.log(data);
    if(tabla.row(this).child.isShown()){
        var data=tabla.row(this).data();
    }
    // console.log(data);
    cargar_contenido('contenido_principal','personas/vista_visualizacionDatos.php');
    idPersona=data.idPersona;
    console.log(idPersona);
    llenarDatos(idPersona);
    
})

function llenarDatos(idPersona){
    $.ajax({
        url:'../Controller/persona/controlador_mostrarDatosADM.php',
        type:'POST',
        data:{idPersona:idPersona}  
    }).done(function(res){
        if(res.length>0){ 
        datoX=JSON.parse(res); 
        console.log(datoX);
        datoP=datoX[0];
        console.log(datoP);

           
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
            $("#txt_descripcion").val(datoP.descripcion_estudio);
            // console.log(datoP.descripcion_estudio);
        }
    }) 
}



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

function imprimirDatos() {
    // var ficha = document.getElementById('');
    // var divToPrint=document.getElementById('registrarFormulario');

    // var newWin=window.open('','Print-Window');
  
    // newWin.document.open();
  
    // newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  
    // newWin.document.close();
  
    // setTimeout(function(){newWin.close();},10);
    // window.print();
    $.print('#registrarFormulario');
  }

  function pruebaDivAPdf() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#registrarFormulario')[0];

    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };

    pdf.fromHTML(
        source, 
        margins.left, // x coord
        margins.top, { // y coord
            'width': margins.width, 
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            pdf.save('datosPersonales.pdf');
        }, margins
    );
}