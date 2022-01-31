<?php 


$datos = getData();

echo '<pre>';
print_r($datos);
echo '</pre>';

echo json_encode($datos);
    


function getData()
{
    $_NOMBREARCHIVO = "Resistencias.txt";

    if (file_exists($_NOMBREARCHIVO) and filesize($_NOMBREARCHIVO)) {
        $file = fopen($_NOMBREARCHIVO, "rb");

        $archivo = fread($file, filesize($_NOMBREARCHIVO));

        fclose($file);

        $ice = array();

        $value = explode("\n", $archivo);


        foreach ($value as $key1 => $lineaActual) {
            $valores = explode(",", $lineaActual);

            foreach ($valores as $key2 => $valorActual) {
                $ice["Fila" .$key1][$key2] = $valorActual;
            }
        }

        return $ice;
    } else {
        return null;
    }
}