<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Análisis de Números</title>";
include_once("../includes/header.php");
?>

<body>

    <div class="container">
        <br />
        <h2>ANÁLISIS DE NÚMEROS</h2>

        <div class="row">
            <div class="col-2">
                <form name="form1" method="post" action="#" id="frmGenerarInput">
                    <div class="form-group">
                        <label for="example-number-input" class="form-control-label">Cantidad de cajas</label>
                        <input id="txtCantidadInput" name="cantidadNumeros" class="form-control" type="number" value="1" min="1" max="100" required value="" placeholder="Cantidad">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="example-number-input" class="form-control-label">Generar números</label>
                            </div>
                            <div class="col-6">
                                <label class="custom-toggle">
                                    <input id="chbGenerarNumeros" type="checkbox" checked>
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary btn-block" name="button" id="btnGenerarInput">Generar</button>
                    </div>
                </form>
                <div id="contenedorAlerta" class="alert alert-danger text-center" role="alert" hidden>
                    Ingrese un número entero positivo menor o igual a 100
                </div>
            </div>
            <div class="col-2 text-center">
                <label for="example-number-input" class="form-control-label mt-4">Realizar análisis</label>
                <button type="button" class="btn btn-outline-primary btn-block mt-1" id="btnEnviarDatos">Clasificar Números</button>
            </div>
            <div id="contenedorClasificacion" class="col-8">
                <div class="row">
                    <div class="col-2">
                        <h3>Números Naturales</h3>
                    </div>
                    <div class="col-2">
                        <h3>Números Enteros Negativos</h3>
                    </div>
                    <div class="col-2">
                        <h3>Números Decimales Positivos</h3>
                    </div>
                    <div class="col-2">
                        <h3>Números Decimales Negativos</h3>
                    </div>
                    <div class="col-2">
                        <h3>Números Pares</h3>
                    </div>
                    <div class="col-2">
                        <h3>Números Impares</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <h3>Total: <span id="contTotalNaturales" style="color:#4e94ff"></span></h3>
                    </div>
                    <div class="col-2">
                        <h3>Total: <span id="contTotalEnterosNegativos" style="color:#4e94ff"></span></h3>
                    </div>
                    <div class="col-2">
                        <h3>Total: <span id="contTotalDecimalesPositivos" style="color:#4e94ff"></span></h3>
                    </div>
                    <div class="col-2">
                        <h3>Total: <span id="contTotalDecimalesNegativos" style="color:#4e94ff"></span></h3>
                    </div>
                    <div class="col-2">
                        <h3>Total: <span id="contTotalPares" style="color:#4e94ff"></span></h3>
                    </div>
                    <div class="col-2">
                        <h3>Total: <span id="contTotalImpares" style="color:#4e94ff"></span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Números</button>
                            <div id="cont1" class="dropdown-menu">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Números</button>
                            <div id="cont2" class="dropdown-menu">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Números</button>
                            <div id="cont3" class="dropdown-menu">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Números</button>
                            <div id="cont4" class="dropdown-menu">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Números</button>
                            <div id="cont5" class="dropdown-menu">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Números</button>
                            <div id="cont6" class="dropdown-menu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contenedorInputs" class="row">

        </div>
    </div>

</body>

<script type="text/javascript" src="scripts/numeros.js"></script>
<?php
include_once("../includes/footer.php");
?>

</html>