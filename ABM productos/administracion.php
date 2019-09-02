<?php

require "clases/productos.php";

$op=2;

$productos = new productos("Milanesa","000001");

switch($op){
    case 1:
    
    $guardar=productos::Guardar($productos);
    
    if($guardar){
        echo "Se guardo correctamente";
    }
    else{
        echo "No se guardo";
    }
    break;

    case 2:
productos::traerTodos($productos);

    break;
}

?>