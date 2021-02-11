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
       {"data":"actividadAgropecuaria"},
       {"data":"num_identificacion"},
       {"data":"registrador"},
       {"data":"nombreVereda"},
        {"defaultContent":
       "<button style='font-size:10px;' type='button' class='editar btn btn-warning'><i class='fa fa-edit'></i> </button>&nbsp;"}
   ],

   "language":idioma_espanol,
   select: true
});
}