

var opc1=document.getElementById("opc1");
var opc2=document.getElementById("opc2");
var opc3=document.getElementById("opc3");
var opc4=document.getElementById("opc4");
var opc5=document.getElementById("opc5");
var opc6=document.getElementById("opc6");
var opc7=document.getElementById("opc7");
var opc8=document.getElementById("opc8");

if(opc1){
    opc1.addEventListener('click', function(){
        cargar_contenido('contenido_principal','usuarios/vista_usuario_listar.php');
    });
    opc2.addEventListener('click', function(){
        cargar_contenido('contenido_principal','personas/vista_personas_administrativos.php');
    });
    opc8.addEventListener('click', function(){
        cargar_contenido('contenido_principal','lineasProductivas/vista_lineasProductivas.php');
    });
}

opc3.addEventListener('click', function(){
    cargar_contenido('contenido_principal','personas/vista_persona_listar.php');
});
opc4.addEventListener('click', function(){
    cargar_contenido('contenido_principal','fincas/vista_finca.php');
});
opc5.addEventListener('click', function(){

    cargar_contenido('contenido_principal','fincas/vista_visitar_finca.php');
});
opc6.addEventListener('click', function(){
    cargar_contenido('contenido_principal','fincas/vista_reporteDos.php');
});
opc7.addEventListener('click', function(){
    cargar_contenido('contenido_principal','graficas/vista_graficas.php');
});