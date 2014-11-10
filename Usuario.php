<?php
/**
 * Created by PhpStorm.
 * User: MAQ23-LAB2-TIC
 * Date: 12/09/14
 * Time: 06:04 PM
 */
include_once('bd.php');
class Usuario {
    private $id_usuario;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $telefono;
    private $calle;
    private $numero_externo;
    private $numero_interior;
    private $colonia;
    private $municipio;
    private $estado;
    private $CP;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $status;

    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){

        echo"<br>createUsuario";
        $insert01 ="INSERT INTO usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus)
                  Values ('$nombre','$apellidop','$apellidom','$nivel',1)";
        $execute01= mysql_query($insert01) or die ("Error $insert01");

    }

    public function readUsuarioG(){
        $sql01 ="SELECT * FROM usuario WHERE Estatus=1 ORDER BY ApellidoPaterno ASC";
        $result01= mysql_query($sql01) or die ("Error $sql01");
        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td align='center'><b>Clave</b></td><td align='center'><b>Nombre</b></b></td><td align='center'><b>Apellido Paterno</td><td align='center'><b>Apellido Materno</td><td align='center'><b>Tipo</b></td></tr>";
        $sql=mysql_query("select * from usuario  order by id_usuario desc ") or die (mysql_error());
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['id_usuario'];
            $this->nombre=$field['Nombre'];
            $this->apellido_paterno=$field['ApellidoPaterno'];
            $this->apellido_materno=$field['ApellidoMaterno'];
            $this->nivel=$field['Nivel'];
            switch($this->nivel){
                case 1;
                    $type="Administrador";
                    break;
                case 2;
                    $type="alumno";
                    break;
                case 3;
                    $type="maestro";
                    break;
            }
            echo"<tr><td align='center'>$this->id</td><td align='center'>$this->nombre</td><td align='center'>$this->apellido_paterno</td><td align='center'>$this->apellido_materno</td><td align='center'>$type</td></tr>";

        }
        echo"</table></div>";


    }

    public function readuS($id_usuario){



      $sql=mysql_query("select * from usuario where id_usuario='$id_usuario' ") or die (mysql_error());
        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td align='center'><b>Clave</b></td><td align='center'><b>Nombre</b></b></td><td align='center'><b>Apellido Paterno</td><td align='center'><b>Apellido Materno</td><td align='center'><b>Tipo</b></td></tr>";
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['id_usuario'];
            $this->nombre=$field['Nombre'];
            $this->apellido_paterno=$field['ApellidoPaterno'];
            $this->apellido_materno=$field['ApellidoMaterno'];
            $this->nivel=$field['Nivel'];

            switch($this->nivel){
               case 1;
                    $type="Administrador";

                    break;
                case 2;
                    $type="alumno";
                    break;
                case 3;
                    $type="maestro";
                    break;
            }

        }

        echo"<tr><td align='center'>$this->id</td><td align='center'>$this->nombre</td><td align='center'>$this->apellido_paterno</td><td align='center'>$this->apellido_materno</td><td align='center'>$type</td></tr>";
        echo"</table></div><hr><br><hr>";

    }



    public function updateUsuario($id_usuario,$nombre,$apellidop,$apellidom,$nivel){

        echo"<br>updateUsuario";
        $update01 ="UPDATE usuario SET Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Nivel='$nivel' WHERE id_usuario= $id_usuario";
        $execute01= mysql_query($update01) or die ("Error $update01");
    }

    public function deleteUsuario($id_usuario){

        echo"<br>deleteUsuario";
        $delete01 ="DELETE FROM usuario WHERE id_usuario=$id_usuario";
        $execute01= mysql_query($delete01) or die ("Error $delete01");
    }


}
?>
