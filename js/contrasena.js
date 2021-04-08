

function abrirModal(){
    $("#modalUpdatePassword").modal({backdrop:'static', keyboard:false});
    $("#modalUpdatePassword").modal('show');
}

//141592653589793238

function cambiarContrasena(){
    let password3=document.getElementById('txt_password').value;
    let password1=document.getElementById('txt_password1').value;
    let password2=document.getElementById('txt_password2').value;
    
    if(!password1 || !password2){

       return  Swal.fire('Mensaje De Error','Por favor deligenciar todos los campos','warning');
    }
    if(password1!=password2){

        return Swal.fire('Mensaje De Error','verificar que la nueva contrasena coincide con su verificacion. ','warning');
    }
    const nuevo6 = new FormData();
    nuevo6.append('password',password2);
    nuevo6.append('passwordOld',password3);
    $.ajax({
        url:'../Controller/usuario/controlador_cambiarContrasena.php',
        type:'POST',
        data:nuevo6,
        processData: false,  // tell jQuery not to process the data
        contentType: false   // tell jQuery not to set contentType
    }).done(function(res){
        // console.log(res);
        valor=JSON.parse(res);
        // console.log(valor);
        if(valor<2){
            if(valor==1){
                // $("#modalUpdatePassword").modal('hide');
                Swal.fire("Mensaje De Confirmacion "," Actualizacion Exitosa","success");
                limpiar();           
            }else{
                Swal.fire("Mensaje De Error "," Actualizacion fallida","warning");
            }
        }else{
            return Swal.fire("Mensaje De Error","contrasena actual no valida ","warning");
        }   
    })
}


function limpiar(){
    document.getElementById('txt_password1').value='';
    document.getElementById('txt_password2').value='';
}



// let array={"name":'camila','surname':'vastidas'};
// let surname='daniela';
// let gender='female';
// let nuevo=[];
// let array=[{'surname':'quintana','gender':'male', 'age':23},
// {'surname':'vasquez','gender':'female', 'age':20}];
// array.map( ({surname,gender})=>{
//     nuevo.push({surname,gender});
// })



// console.log(nuevo);

