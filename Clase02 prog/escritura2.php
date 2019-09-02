<?php

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];

$archivo = fopen("miArchivo.txt","w");

fwrite($archivo,$nombre.",".$apellido."\r\n");

fclose($archivo);

?>