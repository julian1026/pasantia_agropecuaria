var contenedor = document.getElementById('contenedor');
var contenedor2 = document.getElementById('contenedor2');






function lineasProductivaPrimaria(){
    
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_lineas_productivas.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
      let nombre=[];
      let cantidad=[];
      let numero=0;
      var dato=JSON.parse(res);
      var datos=dato.data;
      if(datos.length>0){
        // console.log(datos);
        for(d of datos){
              numero+=parseInt(d.cantidadLinea);
              nombre.push(d.linea_nombre);
              cantidad.push(d.cantidadLinea);
        }
        
        var mensaje='Grafica en Barras,Linea Productiva Primaria, total fincas='+numero;
        graficarLineasProductivas(nombre,cantidad,mensaje,'bar');
      }
    })
}


function lineasProductivaSegundaria(){
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_lineas_productivas2.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
        let nombre=[];
        let cantidad=[];
        let numero=0;
        var dato=JSON.parse(res);
        var datos=dato.data;
        if(datos.length>0){
          // console.log(datos);
          for(d of datos){
                numero+=parseInt(d.cantidadLinea);
                nombre.push(d.linea_nombre);
                cantidad.push(d.cantidadLinea);
          }
         
          var mensaje='Grafica en Barras,Linea Productiva Segundaria, total fincas='+numero;
          graficarLineasProductivas(nombre,cantidad,mensaje,'bar');
        }
     
    })
}

function lineasProductivaTres(){
    $.ajax({
        url:'../Controller/graficos/controlador_graficos_lineas_productivas3.php',
        type:'POST'
        // data:{idPersona:idPersona}

    }).done(function(res){
        let nombre=[];
        let cantidad=[];
        let numero=0;
        var dato=JSON.parse(res);
        var datos=dato.data;
        if(datos.length>0){
          // console.log(datos);
          for(d of datos){
                numero+=parseInt(d.cantidadLinea);
                nombre.push(d.linea_nombre);
                cantidad.push(d.cantidadLinea);
          }
          
          var mensaje='Grafica en Barras,Linea Productiva Terciaria, total fincas='+numero;
          graficarLineasProductivas(nombre,cantidad,mensaje,'bar');
        }
    })
}



function graficarLineasProductivas(nombre,cantidad,tituloTabla,tipo){

    contenedor.innerHTML=`<canvas id="myChart" width="200" height="200"></canvas>`;
    var canvas = document.getElementById('myChart');
    var ctx = canvas.getContext('2d');
      var myChart = new Chart(ctx, {
        type: tipo,
        data: {
            labels:nombre,
            datasets: [{
                label: tituloTabla,
                data:cantidad,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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

        var tituloTabla='Grafica en Barras, Servicios Publicos, total fincas ='+numero;
        graficarServicios(nombres,cantidad,tituloTabla,'bar');
      }
    })
}



function graficarServicios(nombre,cantidad,tituloTabla,tipo){

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
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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







