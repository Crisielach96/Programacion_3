<?php
$archivo2=fopen("miArchivo2.txt","w");

fwrite($archivo2,"Hola Mundo"."\r\n");
fwrite($archivo2,"Cristian"."\r\n");
fwrite($archivo2,"Sielach");
fclose($archivo2);

?>