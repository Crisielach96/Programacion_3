<?php echo "HOLA MUNDO!";
$nombre="crisTian";
$apellido="SIELACH";
echo "<br>";
$apellido=mb_strtolower($apellido);
$nombre=mb_strtolower($nombre);
echo ucfirst($apellido)." , ". ucfirst($nombre);
echo "<br>";
?>