<?php

$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

$user="root";
$pass="";
$host="localhost";
$base="mercado";

$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : NULL;
$estado = isset($_POST['estado']) ? $_POST['estado'] : NULL;
$clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
$perfil = isset($_POST['perfil']) ? $_POST['perfil'] : NULL;

$id_producto = isset($_POST['id_p']) ? $_POST['id_p'] : NULL;
$cod_barra = isset($_POST['cod_barra']) ? $_POST['cod_barra'] : NULL;
$productName = isset($_POST['productName']) ? $_POST['productName'] : NULL;
$image_path = isset($_POST['image_path']) ? $_POST['image_path'] : NULL;

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

        $sql = "INSERT INTO `usuarios`(`nombe`, `apellido`, `clave`, `perfil`, `estado`) VALUES ('$name','$lastName','$clave',$perfil,$estado)";
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
        $sql = "DELETE FROM `usuarios` WHERE `id`=$id";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "Update_us":
        $sql = "UPDATE `usuarios` SET `nombe`='$name',`apellido`='$lastName',`clave`='$clave',`perfil`=$perfil,`estado`=$estado WHERE `id`=$id";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "MostrarPorId_us":
        $sql = "SELECT `id`, `nombe`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE `id`=$id";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;

        case "MostrarPorEstado_us":
        $sql = "SELECT * FROM `usuarios` WHERE `estado`=$estado";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;

        case "Insert_pr":

        $sql = "INSERT INTO `productos`(`codigo_barra`, `nombre`, `path_foto`) VALUES ('$cod_barra','$productName','$image_path')";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "MostrarTodos_pr":
        $sql = "SELECT * FROM productos";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;

        case "Delete_pr":
        $sql = "DELETE FROM `productos` WHERE `id`=$id_producto";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "Update_pr":
        $sql = "UPDATE `productos` SET `codigo_barra`='$cod_barra',`nombre`='$productName',`path_foto`='$image_path' WHERE `id`=$id_producto";
        $rs = $con->query($sql);

        echo "Filas afectadas: " . mysqli_affected_rows($con) ;
        break;

        case "MostrarPorId_pr":
        $sql = "SELECT `id`, `codigo_barra`, `nombre`, `path_foto` FROM `productos` WHERE `id`=$id_producto";
        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){
            $user_arr[] = $row;
        }    
        var_dump($user_arr);
        break;
    }

    mysqli_close($con);

?>