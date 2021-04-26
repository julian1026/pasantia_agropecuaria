var contenedor = document.getElementById('contenedor');
var contenedor2 = document.getElementById('contenedor2');






function lineasProductivaPrimaria(){
    
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_lineas_productivas.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
  
      document.getElementById("identificador-grafica").value=1;
         
      let nombre=[];
      let cantidad=[];
      let colores=[];
      let numero=0;
      var dato=JSON.parse(res);
      var datos=dato.data;
      if(datos.length>0){
        // console.log(datos);
        for(d of datos){
              numero+=parseInt(d.cantidadLinea);
              nombre.push(d.linea_nombre);
              cantidad.push(d.cantidadLinea);
              colores.push(colorRGB());
        }
        
        var mensaje='Grafica en Barras,Linea Productiva Primaria, total fincas='+numero;
        graficarLineasProductivas(nombre,cantidad,colores,mensaje,'bar');
      }
    })
}


function lineasProductivaSegundaria(){
    document.getElementById("identificador-grafica").value=2;
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_lineas_productivas2.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
        let nombre=[];
        let cantidad=[];
        let colores=[];
        let numero=0;
        var dato=JSON.parse(res);
        var datos=dato.data;
        if(datos.length>0){
          // console.log(datos);
          for(d of datos){
                numero+=parseInt(d.cantidadLinea);
                nombre.push(d.linea_nombre);
                cantidad.push(d.cantidadLinea);
                colores.push(colorRGB());
          }
         
          var mensaje='Grafica en Barras,Linea Productiva Segundaria, total fincas='+numero;
          graficarLineasProductivas(nombre,cantidad,colores,mensaje,'bar');
        }
     
    })
}

function lineasProductivaTres(){
    document.getElementById("identificador-grafica").value=3;
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_lineas_productivas3.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
        let nombre=[];
        let cantidad=[];
        let colores=[];
        let numero=0;
        var dato=JSON.parse(res);
        var datos=dato.data;
        if(datos.length>0){
          // console.log(datos);
          for(d of datos){
                numero+=parseInt(d.cantidadLinea);
                nombre.push(d.linea_nombre);
                cantidad.push(d.cantidadLinea);
                colores.push(colorRGB());
          }
          
          var mensaje='Grafica en Barras,Linea Productiva Terciaria, total fincas='+numero;
          graficarLineasProductivas(nombre,cantidad,colores,mensaje,'bar');
        }
    })
}



function graficarLineasProductivas(nombre,cantidad,colores,tituloTabla,tipo){
    // contenedor.innerHTML+=`<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    // `;
    contenedor.innerHTML=`<canvas id="myChart" width="10" height="10"></canvas>`;
    var canvas = document.getElementById('myChart');
    var ctx = canvas.getContext('2d');
      var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels:nombre,
            datasets: [{
                label: tituloTabla,
                data:cantidad,
                backgroundColor: colores,
                borderColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}


function serviciosFinca(){
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_serviciosFinca.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
      let nombres=['agua_si','agua_no','energiaEletrica_si','energiaEletrica_no',
    'energiasAlternativas_si','energiasAlternativas_no','servicioSanitario_si','servicioSanitario_no'];
      let cantidad=[];
      let colores=[];
      var dato=JSON.parse(res);
      var datos=dato.data;
      let numero;
      if(datos.length>0){
          for(s of datos){
            cantidad.push(s.aguaSi);
            cantidad.push(s.aguaNo);
            cantidad.push(s.electricaSi);
            cantidad.push(s.electricaNo);
            cantidad.push(s.alternativasSi);
            cantidad.push(s.alternativasNo);
            cantidad.push(s.sanitarioSi);
            cantidad.push(s.sanitarioNo);
            numero=s.cantidaFincas;
             
          }
          for(let i=1 ; i<=numero; i++  ){
            colores.push(colorRGB());
          }

        var tituloTabla='Grafica en Barras, Servicios Publicos, total fincas ='+numero;
        graficarServicios(nombres,cantidad,colores,tituloTabla,'bar');
      }
    })
}



function graficarServicios(nombre,cantidad,colores,tituloTabla,tipo){
    contenedor2.innerHTML=`<canvas id="myChart2" width="200" height="200"></canvas>`;
    var canvas = document.getElementById('myChart2');
    var ctx = canvas.getContext('2d');
      var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels:nombre,
            datasets: [{
                label: tituloTabla,
                data:cantidad,
                backgroundColor:colores,
                borderColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

// genera colores aleatoriamente
function generarNumero(numero){
	return (Math.random()*numero).toFixed(0);
    }

    function colorRGB(){
        var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
        return "rgb" + coolor;
    }


    function imprimirDatos() {

        
        // var elemento=document.getElementById("grupoButton").innerHTML;
       
        // elemento.className += "hidden";
        $('#grupoButton').addClass('hidden');
        $('#buttonSolo').addClass('hidden');
        window.print();
        $('#grupoButton').removeClass('hidden');
        $('#buttonSolo').removeClass('hidden');
      }



    //   function generarPdf(){
    //     const $elementoParaConvertir =document.querySelector("#num"); // <-- Aquí puedes elegir cualquier elemento del DOM
    //     html2pdf()
    //         .set({
    //             margin: 1,
    //             filename: 'documento.pdf',
    //             image: {
    //                 type: 'jpeg',
    //                 quality: 0.98
    //             },
    //             html2canvas: {
    //                 scale: 3, // A mayor escala, mejores gráficos, pero más peso
    //                 letterRendering: true,
    //             },
    //             jsPDF: {
    //                 unit: "in",
    //                 format: "a3",
    //                 orientation: 'portrait' // landscape o portrait
    //             }
    //         })
    //         .from($elementoParaConvertir)
    //         .save()
    //         .catch(err => console.log(err));
    //   }

    

    function pdfGraficaUno(){
        let element = document.getElementById('graficaUno');
        let fileName='graficas-lineas.pdf';
        GeneratePdf(element,fileName)  
    }

    function pdfGraficaDos(){
        let element = document.getElementById('graficaDos');
        let fileName='graficas-servicios.pdf';
        GeneratePdf(element,fileName)  
    }



      function GeneratePdf(element,fileName) {
        var opt = {
            margin:       0.5,
            filename:     fileName,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
          };
          html2pdf(element, opt);

    }

    


