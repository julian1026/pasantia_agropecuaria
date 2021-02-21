<?php

// $f='julian1026';
// echo(md5($f));

// if(md5($f)==('4d186321c1a7f0f354b297e8914ab240')){
//     echo('correcto');
// }else{
//     echo('incorrecto');
// }



// conexión
$mysqli = @new mysqli('localhost', 'root', '', 'appAgropecuaria');

if (isset($_POST['enviar'])) {
    $arreglo = array();
    $filename = $_FILES["file"]["name"];
    $info = new SplFileInfo($filename);
    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

    if ($extension == 'csv') {
        $filename = $_FILES['file']['tmp_name'];
        $handle = fopen($filename, "r");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $arreglo[] = $data;
            // $arreglo[] = $data[1];
        }
        fclose($handle);
        // foreach ($arreglo as $x => $x_value) {
        //     echo "Key=" . $x . ", Value=" . $x_value;
        //     echo "<br>";
        // }

        foreach ($arreglo as $val) {
            // print $val . '<br/>';
            foreach ($val as $v) {
                print $v . '<br/>';

                $q = "INSERT INTO linea_productiva (linea_nombre,id_clase_pro) VALUES ( 
                    '$v',
                    '1'
                )";

                $mysqli->query($q);
            }
            // fclose($handle);
            // print $numero
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Importación</title>
</head>

<body>
    <!-- <!--  -->
    <form enctype="multipart/form-data" method="post" action="">
        CSV File:<input type="file" name="file" id="file">
        <input type="submit" value="Enviar" name="enviar">
    </form> -->
    <!-- <script src="https://maps.google.com/maps/api/js?sensor=false"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script>
    <div id="showMap" style="width: 450px; height: 350px;"> </div> -->
</body>

<!-- <script type="text/javascript">
    function showGoogleMaps() {
        //Creamos el punto a partir de la latitud y longitud de una dirección:
        var point = new google.maps.LatLng('2.606093', '-76.561364');

        //Configuramos las opciones indicando zoom, punto y tipo de mapa
        var myOptions = {
            zoom: 15,
            center: point,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        //Creamos el mapa y lo asociamos a nuestro contenedor
        var map = new google.maps.Map(document.getElementById("showMap"), myOptions);

        //Mostramos el marcador en el punto que hemos creado
        var marker = new google.maps.Marker({
            position: point,
            map: map,
            title: "Nombre empresa - Calle Balmes 192, Barcelona"
        });
    }
    showGoogleMaps();
</script> -->

</html>