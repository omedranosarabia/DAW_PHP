<?php
session_start();

header('Content-Type: application/json');


$_NOMBREARCHIVO = "Resistencias.txt";

if (isset($_POST['indicador'])) {

    $indicador = $_POST['indicador'];

    if ($indicador == 1) {
        if (isset($_POST['b1'], $_POST['b2'], $_POST['b3'], $_POST['tolerancia'])) {
            global $_NOMBREARCHIVO;
            $_IDACTUAL = 0;

            $b1 = $_POST['b1'];
            $b2 = $_POST['b2'];
            $b3 = $_POST['b3'];
            $tolerancia = $_POST['tolerancia'];

            if (writeFile($b1, $b2, $b3, $tolerancia)) {
                echo json_encode(array('success' => 1));
            } else {
                echo json_encode(array('success' => 0));
            }
        }
    } elseif ($indicador == 2) {


        $datos = getData();


        echo json_encode($datos);
    }
}


function getData()
{
    global $_NOMBREARCHIVO;

    if (file_exists($_NOMBREARCHIVO) and filesize($_NOMBREARCHIVO)) {

        $file = fopen($_NOMBREARCHIVO, "rb");

        $archivo = fread($file, filesize($_NOMBREARCHIVO));

        fclose($file);

        $ice = array();

        $value = explode("\n", $archivo);


        foreach ($value as $key1 => $lineaActual) {

            $valores = explode(",", $lineaActual);

            foreach ($valores as $key2 => $valorActual) {

                $ice[$key1][$key2] = str_replace(' ', '', $valorActual);
            }
        }

        return $ice;
    } else {

        return null;
    }
}

function writeFile($b1, $b2, $b3, $tolerancia)
{
    global $_NOMBREARCHIVO;
    global $_IDACTUAL;



    if (!file_exists($_NOMBREARCHIVO)) {
        $_IDACTUAL = 1;
        $txt = "$_IDACTUAL, $b1, $b2, $b3, $tolerancia";
        touch($_NOMBREARCHIVO);
        chmod($_NOMBREARCHIVO, 0775);
        fopen($_NOMBREARCHIVO, 'a');
        $myfile = fopen($_NOMBREARCHIVO, 'a');
        fwrite($myfile, $txt);
    } else {
        $lastId = getLastId();
        $_IDACTUAL = ($lastId + 1);
        if ($lastId == 0) {
            $txt = "$_IDACTUAL, $b1, $b2, $b3, $tolerancia";
        } else {
            $txt = "\n$_IDACTUAL, $b1, $b2, $b3, $tolerancia";
        }

        $myfile = fopen($_NOMBREARCHIVO, "a") or die("Unable to open file!");
        fwrite($myfile, $txt);
    }

    fclose($myfile);

    return true;
}

function getLastId()
{
    global $_NOMBREARCHIVO;
    global $_IDACTUAL;

    if (file_exists($_NOMBREARCHIVO) and filesize($_NOMBREARCHIVO)) {
        $file = fopen($_NOMBREARCHIVO, "rb");
        $archivo = fread($file, filesize($_NOMBREARCHIVO));
        fclose($file);
        $value = explode("\n", $archivo);

        $lastLine = explode(",", end($value));

        return reset($lastLine);
    } else {
        return 0;
    }
}
