<?php

$archivo2=fopen("miArchivo2.txt","r");

while(!feof($archivo2))
{
   echo "<br>".fread($archivo2,filesize("miArchivo2.txt"));
}

fclose($archivo2);

?>