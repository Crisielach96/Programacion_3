<?php

class productos{
    private $nombre;
    private $codBarra;

    public function __construct($nombre=NULL, $codBarra=NULL){
        if($nombre != NULL && $codBarra != NULL)
        {
            $this->nombre=$nombre;
            $this->codBarra=$codBarra;
        }
    }

    public function toString() : string
    {
        return  $this->codBarra." - ".$this->nombre."\r\n";
    }

    public static function Guardar($ob){
        $retorno=false;
        $archivo=fopen("./archivos/productos.txt","a");
        if(fwrite($archivo, $ob->toString())!=false)
        {
            $retorno=true;
        }
        fclose($archivo);
        return $retorno;
    }

    public static function Traertodos($ob){
        $archivos=fopen("./archivos/productos.txt","r");
        //$productos=array();
        while(!feof($archivo)){
            $todosLosProductos=$this->explode("-",$archivo);
        }
        return $todosLosProductos;

    }
}

?>