<?php
if (isset($_POST['data'])) {

  header('Content-Type: application/json');

  include_once('clases/clases.php');

  $numeros = json_decode($_POST['data']);

  $numerosConvertidos = array();

  foreach ($numeros as $numeroActual) {

    if (fmod($numeroActual, 1) !== 0.00) {
      array_push($numerosConvertidos, (float) $numeroActual);
    } else {
      array_push($numerosConvertidos, (int) $numeroActual);
    }
  }


  $numNatural = new numeroNatural();
  $numNaturalNegativo = new numeroEnteroNegativo();
  $numDecimal = new numeroDecimalPositivo();
  $numDecimalNegativo = new numeroDecimalNegativo();
  $numPar = new numeroPar();
  $numImpar = new numeroImpar();

  foreach ($numerosConvertidos as $numeroActual) {


    if (is_int($numeroActual)) {
      if ($numeroActual >= 0) {
        $numNatural->agregarNumero($numeroActual);
      } elseif ($numeroActual < 0) {
        $numNaturalNegativo->agregarNumero($numeroActual);
      }
    } elseif (is_float($numeroActual)) {

      if ($numeroActual > 0) {
        $numDecimal->agregarNumero($numeroActual);
      } elseif ($numeroActual < 0) {

        $numDecimalNegativo->agregarNumero($numeroActual);
      }
    }
  }


  foreach ($numerosConvertidos as $numeroActual) {

    if ($numeroActual % 2 == 0) {

      $numPar->agregarNumero($numeroActual);
    } else {

      $numImpar->agregarNumero($numeroActual);
    }
  }

  $numerosProcesados = array();

  $numerosProcesados['numerosNaturales'] =  $numNatural->obtenerTodo();
  $numerosProcesados['numerosEnterosNegativos'] = $numNaturalNegativo->obtenerTodo();
  $numerosProcesados['numerosDecimalesPositivos'] = $numDecimal->obtenerTodo();
  $numerosProcesados['numerosDecimalesNegativos'] = $numDecimalNegativo->obtenerTodo();
  $numerosProcesados['numerosPares'] = $numPar->obtenerTodo();
  $numerosProcesados['numerosImpares'] = $numImpar->obtenerTodo();

  echo json_encode($numerosProcesados);
} else {
  echo json_encode(null);
}
