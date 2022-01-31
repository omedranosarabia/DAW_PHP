<?php 


class Producto{

    public $idProducto = "";
    public $nombre = "";
    public $descripcion = "";


    public function __construct()
    {
        $this->idProducto = "";
        $this->nombre = "";
        $this->descripcion = "";
    }

    public function saludar(){

        echo "Hola";

    }


}