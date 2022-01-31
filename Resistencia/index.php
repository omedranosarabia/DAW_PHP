<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Resistencia</title>";
include_once("../includes/header.php");
?>

<body>



    <div class="container">
        <br />
        <h2>REGISTRAR RESISTENCIA</h2>
        <br />
        <div class="row">
            <div class="col-lg-2">
                <form action="#" method="post">

                    <!--BANDA 1-->
                    <div>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="btnBanda1">
                                Valor Banda 1
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" id="ddBanda1">
                                <a class="dropdown-item" href="#">0 - Negro</a>
                                <a class="dropdown-item" href="#">1 - Café</a>
                                <a class="dropdown-item" href="#">2 - Rojo</a>
                                <a class="dropdown-item" href="#">3 - Naranja</a>
                                <a class="dropdown-item" href="#">4 - Amarillo</a>
                                <a class="dropdown-item" href="#">5 - Verde</a>
                                <a class="dropdown-item" href="#">6 - Azul</a>
                                <a class="dropdown-item" href="#">7 - Violeta/Morado</a>
                                <a class="dropdown-item" href="#">8 - Gris</a>
                                <a class="dropdown-item" href="#">9 - Blanco</a>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!--BANDA 2-->
                    <div>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="btnBanda2">
                                Valor Banda 2
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" id="ddBanda2">
                                <a class="dropdown-item" href="#">0 - Negro</a>
                                <a class="dropdown-item" href="#">1 - Café</a>
                                <a class="dropdown-item" href="#">2 - Rojo</a>
                                <a class="dropdown-item" href="#">3 - Naranja</a>
                                <a class="dropdown-item" href="#">4 - Amarillo</a>
                                <a class="dropdown-item" href="#">5 - Verde</a>
                                <a class="dropdown-item" href="#">6 - Azul</a>
                                <a class="dropdown-item" href="#">7 - Violeta/Morado</a>
                                <a class="dropdown-item" href="#">8 - Gris</a>
                                <a class="dropdown-item" href="#">9 - Blanco</a>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!--BANDA 3-->
                    <div>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="btnBanda3">
                                Valor Banda 3
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" id="ddBanda3">
                                <a class="dropdown-item" href="#">1 - Negro</a>
                                <a class="dropdown-item" href="#">10 - Café</a>
                                <a class="dropdown-item" href="#">100 - Rojo</a>
                                <a class="dropdown-item" href="#">1000 - Naranja</a>
                                <a class="dropdown-item" href="#">10000 - Amarillo</a>
                                <a class="dropdown-item" href="#">100000 - Verde</a>
                                <a class="dropdown-item" href="#">1000000 - Azul</a>
                                <a class="dropdown-item" href="#">10000000 - Violeta/Morado</a>
                                <a class="dropdown-item" href="#">100000000 - Gris</a>
                                <a class="dropdown-item" href="#">1000000000 - Blanco</a>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="mt-2">
                        <h4 class="text-primary">Tolerancia</h4>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioTolerancia" id="radioTolerancia1" value="option1" checked>
                        <label class="form-check-label" for="radioTolerancia1">
                            Oro
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioTolerancia" id="radioTolerancia2" value="option2">
                        <label class="form-check-label" for="radioTolerancia2">
                            Plata
                        </label>
                    </div>

                    <br />

                    <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button>
                </form>

                <br />

                <div id="contenedorSuccess" class="alert alert-success text-center" role="alert" hidden>
                    Valores almacenados
                </div>
            </div>
            <div class="col-lg-1">

                <div id="colorBanda1" class="alert" style="background-color:black; margin-top:6px;"></div>

                <div id="colorBanda2" class="alert" style="background-color:black; margin-top:35px;"></div>

                <div id="colorBanda3" class="alert" style="background-color:black; height:30px; margin-top:34px;"></div>

                <div id="colorTolerancia" class="alert mt-6" style="background-color:goldenrod; height:30px;"></div>

            </div>

            <div id="contenedorTabla" class="col-8 ml-4">
                <table class="table align-items-center table-dark" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Banda 1</th>
                            <th>Banda 2</th>
                            <th>Multiplicador</th>
                            <th>Tolerancia</th>
                            <th>Valor</th>
                            <th>Valor Máximo</th>
                            <th>Valor Mínimo</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="contenedorRegistros">
                    </tbody>
                </table>

            </div>
        </div>
        <br />


    </div>

</body>
<script type="text/javascript" src="JavaScript.js"></script>
<?php
include_once("../includes/footer.php");
?>

</html>