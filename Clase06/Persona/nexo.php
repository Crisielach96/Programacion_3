<?php

include_once ("AccesoDatos.php");
include_once ("usuario.php");

$op = isset($_POST['op']) ? $_POST['op'] : NULL;

switch ($op) {
    case 'accesoDatos':
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("select id, nombre AS nombre, apellido AS apellido, "
        . "mail AS mail, clave AS clave, perfil AS perfil, estado AS estado FROM usuarios");
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new cd);
        
        foreach ($consulta as $usuario) {
        
            print_r($usuario->MostrarDatos());
            print("
                    ");
        }

        break;
 
    case 'mostrarTodos':

        $usuarios = usuarios::TraerTodosLosUsuarios();
        
        foreach ($usuarios as $usuario) {
            
            print_r($usuario->MostrarDatos());
            print("
                    ");
        }
    
        break;

    case 'insertarUsuario':
    
        $miUsuario = new usuario();
        $miUsuario->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
        $miUsuario->apellido = isset($_POST['apellido']) ? $_POST['apellido'] : NULL;;
        $miUsuario->mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
        $miUsuario->clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
        $miUsuario->perfil = isset($_POST['perfil']) ? $_POST['perfil'] : NULL;;
        $miUsuario->estado = isset($_POST['estado']) ? $_POST['estado'] : NULL;
        
        $miCD->InsertarUsuario();

        echo "ok";
        
        break;

    case 'modificarCd':
    
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : NULL;;
        $mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
        $clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : NULL;;
        $estado = isset($_POST['estado']) ? $_POST['estado'] : NULL;
    
        echo usuario::ModificarUsuario();
            
        break;

    case 'eliminarCd':
    
        $miUsuario = new usuario();
        $miUsuario->id = $id = isset($_POST['id']) ? $_POST['id'] : NULL;;
        
        $miUsuario->EliminarUsuario($miUsuario);

        echo "ok";
        
        break;
        
        
    default:
        echo ":(";
        break;
}