$(document).ready(function () {
  inicializarValores();
});

//Objeto con evento de cambio de valor para el valor a
var gHayInputs = {
  aInternal: false,
  aListener: function (val) {

    modificarDisabledBoton(val);


  },
  set a(val) {
    this.aInternal = val;
    this.aListener(val);
  },
  get a() {
    return this.aInternal;
  }
}

var gCantidadElementos = 0;



$('#btnEnviarDatos').click(function () {

  recuperarNumeros();

});

//Oculta la alerta de números inválidos al pasar el cursor sobre el input
$('#txtCantidadInput').hover(function () {
  $('#contenedorAlerta').attr('hidden', 'true');
});

//Al clicar sobre el botón para generar los inputs se invoca a la función
//correspondiente
$('#btnGenerarInput').click(function () {
  validarCantidadCajas();
});


function validarCantidadCajas() {

  if ($('#frmGenerarInput')[0].checkValidity()) {

    $('#btnEnviarDatos').removeAttr('disabled');

    gCantidadElementos = $('#txtCantidadInput').val();

    crearInputs(gCantidadElementos);
    gHayInputs.a = true;

  } else {

    $('#contenedorAlerta').removeAttr('hidden');
  }

}

//Función que genera la cantidad de input solicitada por el usuario
function crearInputs(cantidad) {

  var inputsHtml = '';

  $('#contenedorInputs').html('');



  if ($('#chbGenerarNumeros').prop('checked')) {

    for (var i = 0; i < cantidad; i++) {

      var numero = (Math.random() * 100).toFixed(2);

      if (numero > 2 && numero < 40) {

        numero *= -1;

      } else if (numero > 60 && numero < 70) {

        numero /= 0.5;

      } else if (numero > 70 && numero < 80) {

        numero = Math.floor(numero) * -1;

      } else if (numero > 80 && numero < 98) {

        numero = Math.floor(numero);
      } else {

        numero = 0;

      }

      inputsHtml += '<div class="col-2 text-center"><label class="form-control-label">Número ' + (i + 1) + '</label><input id="txtValor' + i + '" value="' + numero + '" name="cantidadNumeros" class="form-control" type="number" placeholder="Número ' + (i + 1) + '"></div>';

    }

  } else {
    for (var i = 0; i < cantidad; i++) {

      inputsHtml += '<div class="col-2 text-center"><label class="form-control-label">Valor ' + (i + 1) + '</label><input id="txtValor' + i + '" name="cantidadNumeros" class="form-control" type="number" placeholder="Número ' + (i + 1) + '"></div>';
    }
  }
  $('#contenedorInputs').html(inputsHtml);
}

//Función que permite establecer valores por defecto 
//cuando la página está lista
function inicializarValores() {

  $('#txtCantidadInput').val('');
  gHayInputs.a = false;
  gCantidadElementos = 0;
  $('#lblCantidadInputs1').attr('hidden', true);
  $('#btnEnviarDatos').attr('disabled', true);
  $('#chbGenerarNumeros').prop('checked', false);
  $('#txtCantidadInput').focus();
  $('#contenedorClasificacion').attr('hidden', true);
}

//Habilita o deshabilita el botón para el envío de los datos
function modificarDisabledBoton(validacion) {

  if (validacion) {
    $('#btnEnviar').removeAttr('disabled');
  } else {
    $('#btnEnviar').attr('disabled', true);
  }
}

function recuperarNumeros() {

  var numeros = [];

  for (var i = 0; i < gCantidadElementos; i++) {

    if ($('#txtValor' + i).val() != '' && !isNaN($('#txtValor' + i).val())) {
      numeros[i] = $('#txtValor' + i).val();
    }
  }

  enviarNumeros(numeros);


}

function enviarNumeros(numeros) {

  console.log(numeros);

  var numerosJSON = JSON.stringify(numeros);


  $.ajax({
    type: "POST",
    url: 'analizarNumeros.php',
    data: { data: numerosJSON },
    dataType: "json",
    success: function (data) {

      if ($.trim(data)) {


        mostrarClasificacion(data);


      }
      else {
        console.log("Casi");

      }

    },
    error: function (e) {
      console.log(e);
    }
  });
}

function mostrarClasificacion(numeros) {

  $('#contTotalNaturales').html(numeros['numerosNaturales'].length);
  $('#contTotalEnterosNegativos').html(numeros['numerosEnterosNegativos'].length);
  $('#contTotalDecimalesPositivos').html(numeros['numerosDecimalesPositivos'].length);
  $('#contTotalDecimalesNegativos').html(numeros['numerosDecimalesNegativos'].length);
  $('#contTotalPares').html(numeros['numerosPares'].length);
  $('#contTotalImpares').html(numeros['numerosImpares'].length);

  var insercionActual = '';
  for (var i = 0; i < numeros['numerosNaturales'].length; i++) {
    insercionActual += '<a class="dropdown-item" href="#">' + numeros['numerosNaturales'][i] + '</a>';
  }

  $('#cont1').html(insercionActual);

  insercionActual = '';
  for (var i = 0; i < numeros['numerosEnterosNegativos'].length; i++) {
    insercionActual += '<a class="dropdown-item" href="#">' + numeros['numerosEnterosNegativos'][i] + '</a>';
  }

  $('#cont2').html(insercionActual);

  insercionActual = '';
  for (var i = 0; i < numeros['numerosDecimalesPositivos'].length; i++) {
    insercionActual += '<a class="dropdown-item" href="#">' + numeros['numerosDecimalesPositivos'][i] + '</a>';
  }

  $('#cont3').html(insercionActual);
  insercionActual = '';
  for (var i = 0; i < numeros['numerosDecimalesNegativos'].length; i++) {
    insercionActual += '<a class="dropdown-item" href="#">' + numeros['numerosDecimalesNegativos'][i] + '</a>';
  }

  $('#cont4').html(insercionActual);
  insercionActual = '';
  for (var i = 0; i < numeros['numerosPares'].length; i++) {
    insercionActual += '<a class="dropdown-item" href="#">' + numeros['numerosPares'][i] + '</a>';
  }

  $('#cont5').html(insercionActual);
  insercionActual = '';
  for (var i = 0; i < numeros['numerosImpares'].length; i++) {
    insercionActual += '<a class="dropdown-item" href="#">' + numeros['numerosImpares'][i] + '</a>';
  }

  $('#cont6').html(insercionActual);

  $('#contenedorClasificacion').removeAttr('hidden');

}


