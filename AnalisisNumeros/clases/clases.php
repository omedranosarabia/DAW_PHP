<?php

class numero
{

    public $numeros;

    public function __construct()
    {
        $this->numeros = array();
    }

    public function obtenerCantidadTotal()
    {

        return count($this->numeros);
    }

    public function agregarNumero($numero)
    {
        if (is_numeric($numero)) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }

    public function sumarNumeros()
    {
        return array_sum($this->numeros);
    }

    public function obtenerTodo()
    {

        return $this->numeros;
    }
}

class numeroEntero extends numero
{
    public $numeros;

    public function __construct()
    {
        $this->numeros = array();
    }

    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_int($numero)) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }
}

class numeroNatural extends numeroEntero
{
    public $numeros;

    public function __construct()
    {
        $this->numeros = array();
    }


    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_int($numero) && $numero >= 0) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }
}

class numeroEnteroNegativo extends numeroEntero
{
    public $numeros;

    public function __construct()
    {
        $this->numeros = array();
    }

    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_int($numero) && $numero < 0) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }
}

class numeroDecimalPositivo extends numero
{
    public $numeros;

    public function __construct()
    {
        $this->numeros = array();
    }

    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_float($numero) && $numero > 0) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }
}

class numeroDecimalNegativo extends numero
{

    public $numeros;

    public function __construct()
    {
        $this->numeros = array();
    }

    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_float($numero) && $numero < 0) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }
}

class numeroPar extends numeroEntero
{
    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_int($numero) && ($numero % 2 == 0)) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }
}

class numeroImpar extends numeroEntero
{

    public function agregarNumero($numero)
    {
        if (is_numeric($numero) && is_int($numero) && ($numero % 2 != 0)) {
            array_push($this->numeros, $numero);
            return true;
        } else {
            return false;
        }
    }


}
