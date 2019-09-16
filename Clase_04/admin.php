<?php

$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

$user="root";
$pass="";
$host="localhost";
$base="mercado";

$con = @mysqli_connect($host,$user,$pass,$base);

    if(!$con)
    {
        echo "<pre>Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error: " . mysqli_connect_error() . PHP_EOL . "</pre>";
        return;
    }

    echo "<pre>Éxito: Se realizó una conexión a MySQL!!!." . PHP_EOL;
    echo "Información del host: " . mysqli_get_host_info($con) . PHP_EOL . "</pre>";

    switch($queHago){

        case "Insert_us":

        $sql = "INSERT INTO `usuarios`(`nombe`, `apellido`, `clave`, `perfil`, `estado`) VALUES ('Hernan','Malonos','9514',5,2)";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "MostrarTodos_us":
        $sql = "SELECT * FROM usuarios";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;

        case "Delete_us":
        $sql = "DELETE FROM `usuarios` WHERE `id`=5";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "Update_us":
        $sql = "UPDATE `usuarios` SET `nombe`='Damian_m',`apellido`='Sielach_m',`clave`='111',`perfil`=1,`estado`=1 WHERE `id`=5";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "MostrarPorId_us":
        $sql = "SELECT `id`, `nombe`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE `id`=7";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;

        case "MostrarPorEstado_us":
        $sql = "SELECT * FROM `usuarios` WHERE `estado`=1";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;
    }

    mysqli_close($con);

?>