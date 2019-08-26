<?php 
$vec=array(rand(0,10),rand(0,10),rand(0,10),rand(0,10),rand(0,10));
$suma=0;
$promedio=0;

for($i=0;$i<count($vec);$i++)
{
    $suma+=$vec[$i];
}

$promedio=$suma/count($vec);

var_dump($vec);
echo "<br>";
echo "suma: " . $suma;
echo "<br>";
echo "Promedio: " . $promedio;
echo "<br>";
if($promedio>6)
{
    echo "El promedio es superior a 6";
}
else if($promedio<6){
    echo "El promedio es inferior a 6";
}
else{
    echo "El promedio es igual a 6";
}