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
        }
        // fclose($handle);
        // foreach ($arreglo as $x => $x_value) {
        //     echo "Key=" . $x . ", Value=" . $x_value;
        //     echo "<br>";
        // }
        $numero = 1;
        foreach ($arreglo as $val) {
            // print $val;
            foreach ($val as $v) {
                print $numero;
                print $v . '<br/>';

                $q = "INSERT INTO vereda (nombreVereda,corregimiento_id) VALUES ( 
                    '$v',
                    '$numero'
                )";

                $mysqli->query($q);
            }
            // fclose($handle);
            // print $numero;
            $numero++;
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

    <form enctype="multipart/form-data" method="post" action="">
        CSV File:<input type="file" name="file" id="file">
        <input type="submit" value="Enviar" name="enviar">
    </form>

</body>

<script>

</script>

</html>