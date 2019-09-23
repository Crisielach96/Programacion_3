<?php
    class usuario{
        public $id;
        public $nombre;
        public $apellido;
        public $mail;
        public $clave;
        public $perfil;
        public $esatdo;

    public function MostrarDatos()
    {
            return $this->id." - ".$this->nombre." - ".$this->apellido." - ".$this->mail." - ".$this->clave." - ".$this->perfil." - ".$this->estado;
    }

    public static function TraerTodosLosUsuarios()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT id, nombre AS nombre, apellido AS apellido, "
                                                        . "mail AS mail, clave AS clave, perfil AS perfil, estado AS estado FROM usuarios");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new cd);                                                

        return $consulta; 
    }

    public function InsertarUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (id, nombre, apellido, mail, clave, perfil, estado)"
                                                    . "VALUES(:id, :nombre, :apellido, :mail, :clave, :perfil, :estado)");
        
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':perfl', $this->perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_INT);


        $consulta->execute();   

    }

    public function ModificarUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, mail=:mail, clave=:clave, perfil=:perfil, estado=:estado WHERE id = :id");
            
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':perfl', $this->perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_INT);
    
    
        $consulta->execute();   
    
    }
    
    public static function EliminarUsuario($usuario)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");
        
        $consulta->bindValue(':id', $usuario->id, PDO::PARAM_INT);

        return $consulta->execute();

    }

}

?>