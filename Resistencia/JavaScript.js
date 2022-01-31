$(document).ready(function () {


    recuperarDatos();
    $('#radioTolerancia1').prop("checked", true);
    $('#radioTolerancia1').attr('checked', 'checked');


});


var gValorBanda1 = 'Negro';
var gValorBanda2 = 'Negro';
var gValorBanda3 = 'Negro';
var gValorTolerancia = 'Oro';


$('#ddBanda1 a').click(function () {
    var color = $(this).html();

    cambiarReferenciaColor('colorBanda1', color);
});

$('#ddBanda2 a').click(function () {
    var color = $(this).html();

    cambiarReferenciaColor('colorBanda2', color);
});

$('#ddBanda3 a').click(function () {
    var color = $(this).html();

    cambiarReferenciaColor('colorBanda3', color);
});


$('input[type=radio][name=radioTolerancia]').change(function () {

    cambiarColorTolerancia(this.value);
});


$('#btnGuardar').click(function () {

    guardarDatos();
});


function cambiarReferenciaColor(idBanda, color) {

    idBanda = '#' + idBanda;

    var colorFinal = '';
    var colorBordeFinal = '';
    var valorFinal = 'Negro';

    if (color == '0 - Negro' || color == '1 - Negro') {

        colorFinal = '#000000';
        colorBordeFinal = '#000000';
        valorFinal = "Negro";

        if (idBanda == '#colorBanda3') {

            valorFinal = "Negro";
        }

    } else if (color == '1 - Café' || color == '10 - Café') {
        colorFinal = '#611414';
        colorBordeFinal = '#611414';
        valorFinal = 'Café';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Café';
        }

    } else if (color == '2 - Rojo' || color == '100 - Rojo') {

        colorFinal = '#fc1e1e';
        colorBordeFinal = '#fc1e1e';
        valorFinal = 'Rojo';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Rojo';
        }

    } else if (color == '3 - Naranja' || color == '1000 - Naranja') {

        colorFinal = '#e65000';
        colorBordeFinal = '#e65000';
        valorFinal = 'Naranja';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Naranja';
        }

    } else if (color == '4 - Amarillo' || color == '10000 - Amarillo') {

        colorFinal = '#d9e002';
        colorBordeFinal = '#d9e002';
        valorFinal = 'Amarillo';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Amarillo';
        }

    } else if (color == '5 - Verde' || color == '100000 - Verde') {

        colorFinal = '#00a300';
        colorBordeFinal = '#00a300';
        valorFinal = 'Verde';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Verde';
        }

    } else if (color == '6 - Azul' || color == '1000000 - Azul') {

        colorFinal = '#006aa3';
        colorBordeFinal = '#006aa3';
        valorFinal = 'Azul';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Azul';
        }
    } else if (color == '7 - Violeta/Morado' || color == '10000000 - Violeta/Morado') {

        colorFinal = '#a3009b';
        colorBordeFinal = '#a3009b';
        valorFinal = 'Violeta/Morado';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Violeta/Morado';
        }

    } else if (color == '8 - Gris' || color == '100000000 - Gris') {

        colorFinal = '#5c5a5a';
        colorBordeFinal = '#5c5a5a';
        valorFinal = 'Gris';
        if (idBanda == '#colorBanda3') {

            valorFinal = 'Gris';
        }

    } else if (color == '9 - Blanco' || color == '1000000000 - Blanco') {

        colorFinal = '#ffffff';
        colorBordeFinal = '#000000';
        valorFinal = 'Blanco';

        if (idBanda == '#colorBanda3') {

            valorFinal = 'Blanco';
        }

    }

    if (idBanda == '#colorBanda1') {

        gValorBanda1 = valorFinal;

    } else if (idBanda == '#colorBanda2') {

        gValorBanda2 = valorFinal;

    } else if (idBanda == '#colorBanda3') {

        gValorBanda3 = valorFinal;
    }

    $(idBanda).css('background-color', colorFinal);
    $(idBanda).css('border', '1px solid ' + colorBordeFinal);
}

function cambiarColorTolerancia(idRadio) {

    var colorTolerancia = '';

    if (idRadio == 'option1') {
        colorTolerancia = 'goldenrod';
        gValorTolerancia = 'Oro';
    } else if (idRadio == 'option2') {
        colorTolerancia = 'silver';
        gValorTolerancia = 'Plata';
    }


    $('#colorTolerancia').css('background-color', colorTolerancia);
}


function recuperarDatos() {


    $.ajax({
        type: "POST",
        url: 'manipularArchivo.php',
        data: { 'indicador': 2 },
        dataType: "json",
        success: function (data) {

            if ($.trim(data)) {

                console.log(data);
                llenarTabla(data);

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

function guardarDatos() {


    datos = { 'indicador': 1, 'b1': gValorBanda1, 'b2': gValorBanda2, 'b3': gValorBanda3, 'tolerancia': gValorTolerancia };

    $.ajax({
        type: "POST",
        url: 'manipularArchivo.php',
        data: datos,
        dataType: "json",
        success: function (data) {

            if (data['success'] == 1) {

                recuperarDatos();

            }

        },
        error: function (e) {
            console.log(e);
        }
    });
}

function llenarTabla(datos) {

    $('#contenedorRegistros').html('');

    var registros = '';

    for (i = 0; i < datos.length; i++) {

        //Se crea una nueva fila para la tabla
        registros += '<tr>';
        var valBanda = '0';
        var valMul = 0;
        var tol = 0;
        for (j = 0; j < datos[i].length; j++) {

            //Se crea una nueva columna
            registros += '<td>';

            //Se agrega el dato a la columna
            if (j == 0) {
                registros += datos[i][j];
            }


            if (datos[i][j] == 'Negro') {

                if (j < 3) {
                    registros += '0';
                    valBanda += '0';

                } else {
                    registros += '1';
                    valMul += 1;
                }

            } else if (datos[i][j] == 'Café') {

                if (j < 3) {
                    registros += '1';
                    valBanda += '1';
                } else {
                    registros += '10';
                    valMul += 10;
                }

            } else if (datos[i][j] == 'Rojo') {


                if (j < 3) {
                    registros += '2';
                    valBanda += '2';
                } else {
                    registros += '100';
                    valMul += 100;
                }

            } else if (datos[i][j] == 'Naranja') {


                if (j < 3) {
                    registros += '3';
                    valBanda += '3';
                } else {
                    registros += '1000';
                    valMul += 1000;
                }

            } else if (datos[i][j] == 'Amarillo') {


                if (j < 3) {
                    registros += '4';
                    valBanda += '4';
                } else {
                    registros += '10000';
                    valMul += 10000;
                }

            } else if (datos[i][j] == 'Verde') {


                if (j < 3) {
                    registros += '5';
                    valBanda += '5';
                } else {
                    registros += '100000';
                    valMul += 100000;
                }


            } else if (datos[i][j] == 'Azul') {


                if (j < 3) {
                    registros += '6';
                    valBanda += '6';
                } else {
                    registros += '1000000';
                    valMul += 1000000;
                }


            } else if (datos[i][j] == 'Violeta/Morado') {


                if (j < 3) {
                    registros += '7';
                    valBanda += '7';
                } else {
                    registros += '10000000';
                    valMul += 10000000;
                }

            } else if (datos[i][j] == 'Gris') {


                if (j < 3) {
                    registros += '8';
                    valBanda += '8';
                } else {
                    registros += '100000000';
                    valMul += 100000000;
                }



            } else if (datos[i][j] == 'Blanco') {


                if (j < 3) {
                    registros += '9';
                    valBanda += '9';
                } else {
                    registros += '1000000000';
                    valMul += 1000000000;
                }


            } else if (datos[i][j] == 'Oro') {
                registros += '5%';
                tol = 5;
            } else if (datos[i][j] == 'Plata') {
                registros += '10%';
                tol = 10;
            }


            //Se agrega el color
            if (datos[i][j] == 'Negro') {
                registros += '<div class="alert mt-1" style="background-color:#000000; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Café') {
                registros += '<div class="alert mt-1" style="background-color:#611414; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Rojo') {
                registros += '<div class="alert mt-1" style="background-color:#fc1e1e; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Naranja') {
                registros += '<div class="alert mt-1" style="background-color:#e65000; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Amarillo') {
                registros += '<div class="alert mt-1" style="background-color:#d9e002; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Verde') {
                registros += '<div class="alert mt-1" style="background-color:#00a300; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Azul') {
                registros += '<div class="alert mt-1" style="background-color:#006aa3; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Violeta/Morado') {
                registros += '<div class="alert mt-1" style="background-color:#a3009b; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Gris') {
                registros += '<div class="alert mt-1" style="background-color:#5c5a5a; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Blanco') {
                registros += '<div class="alert mt-1" style="background-color:#ffffff; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Oro') {
                registros += '<div class="alert mt-1" style="background-color:goldenrod; border-color:#ffffff";></div>';
            } else if (datos[i][j] == 'Plata') {
                registros += '<div class="alert mt-1" style="background-color:silver; border-color:#ffffff";></div>';
            }

            //Se cierra la columna
            registros += '</td>';
        }

        //Se agrega una columna para el valor
        var valor = (valBanda * valMul);

        if (valor != 0) {
            
            registros += '<td>' + valor + ' Ω</td>';
        } else{
            valor = 1;
            registros += '<td>' + valor + ' Ω</td>';
        }
        //Se agrega una columna para el valor máximo
        var valMax = valor + (valor * (tol / 100));
        registros += '<td>' + valMax + ' Ω</td>';
        //Se agrega una columna para el valor mínimo
        var valMin = valor - (valor * (tol / 100));
        registros += '<td>' + valMin + ' Ω</td>';
        

        //Se cierra la fila actual
        registros += '</tr>';
    }


    $('#contenedorRegistros').append(registros);
}

function cambiarVisibilidadSuccess(referencia) {

    if (referencia == 1) {
        $('#contenedorSuccess').removeAttr('hidden');
    } else {
        $('#contenedorSuccess').attr('hidden', 'true');
    }
}

$('#contenedorTabla').mouseover(function () {

    cambiarVisibilidadSuccess(2);
});

