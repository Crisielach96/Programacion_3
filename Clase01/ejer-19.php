<?php 
abstract class FiguraGeometrica{
    protected $_color;
    protected $_perimetro;
    protected $_superfice;
    
    public function __construct(){
        $_color=0;
        $_perimetro=0;
        $_superfice=0;
    }

    function GetColor(){
        return $_color;
    }

    function SetColor($_color){
        $this->_color=$_color;
    }

    abstract function CalcularDatos();
    abstract function Dibujar();

    function ToString(){
    }

}