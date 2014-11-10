<?php

class Materia {

    private $id_materia;
    private $Nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function seleccionaMaestro(){

        echo"<div class='table-responsive'>";
        echo"<form action='ajax.php' method='post' name='maestro' id='maestro'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td align=right>Selecciona Maestro:</td><td><select name='idmae'>";
         echo"<option>--- Selecciona maestro ---</option>";
        $sql02 ="SELECT * FROM usuario WHERE Estatus=1 and Nivel= 3 ORDER BY ApellidoPaterno ASC";
        $result02= mysql_query($sql02) or die ("Error $sql02");
        while($field= mysql_fetch_array($result02)){
            $id_maestro = $field['id_usuario'];
            $option = utf8_decode($field['id_usuario'].") ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']);
            echo"<option value=$id_maestro>$option</option>";
        }
    echo"</select></td></tr>";
        echo"<tr><td></td><td><input type='submit' value='seleccionar'></td></tr>";
        echo"</table>";
        echo"</form>";
    }

        public function datosMaestro($id_maestro){
            $sql04 ="SELECT * FROM usuario WHERE id_usuario = $id_maestro";
            $result04= mysql_query($sql04) or die ("Error $sql04");
            $existe = mysql_num_rows($result04);
            if($existe > 0){
                $nombre = $id_maestro .") ";
                $nombre .= mysql_result($result04, 0, 'ApellidoPaterno');
                $nombre .= " " .mysql_result($result04, 0, 'ApellidoMaterno');
                $nombre .=" " . mysql_result($result04, 0, 'Nombre');
                $nombre = utf8_decode($nombre);
                echo"<br>Maestro seleccionado:<strong>".$nombre."</strong>";
            }
        }
    public function materiasAsignadas($id_maestro){
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo "<tr><td colspan=2 align=center><strong>Materias Asignadas</strong></td></tr>";
            $sql04 = "SELECT * FROM usuario WHERE id_usuario = $id_maestro";
        $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
        $existe = mysql_num_rows($result04);
                if ($existe > 0) {
                        @$nombre .= " " . mysql_result($result04, 0, 'ApellidoPaterno');
                        $nombre .= " " . mysql_result($result04, 0, 'ApellidoMaterno');
                        $nombre .= " " . mysql_result($result04, 0, 'Nombre');
                        $nombre = utf8_decode($nombre);
                        $nombre = ucwords($nombre);
                    }

                    echo "<div class=table-responsive>";
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td colspan=2 align=center><strong>Materias Asignadas a: ".$nombre." </strong></td></tr>";
                    $sql01 = "SELECT * FROM maestro_materia WHERE id_usuario = $id_maestro GROUP BY id_materia";
                    $result01 = mysql_query($sql01)or die("Error $sql01");
                    $exis = mysql_num_rows($result01);
                    if ($exis ==0) {
                        echo"<tr><td><p><center><h3><b><font color='red'>NO HAY MATERIAS ASIGNADAS</font></center></h3></p></td></tr>";
                    }
                    else{
                    while($field = mysql_fetch_array($result01)){
                            $id = $field['id_materia'];
                            $sql04 = "SELECT * FROM materias WHERE id_materia = $id";
                            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
                            $nombre = utf8_decode(mysql_result($result04,0,'materia'));
                            echo "<tr><td>$nombre</td><td><a href=TestMateria.php?accion=2&maestro=$id_maestro&materia=$id>Eliminar</a></td></tr>";
                    }
        echo "</table>";
echo "</div>";
}
    }
    public function asignarMateriaMaestro($id_maestro){
        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\"  >";
        echo"<form action='TestMateria.php' method='POST' id='materias'>";
        echo"<tr><td colspan='4'><center><strong >ASIGNAR NUEVAS MATERIAS</strong></center></td></tr>";
        echo"<tr> <td ALIGN=right><b>Materia</b></td><td><select id=materia name=materia >";
        echo"<option>---Selecciona---</option>";
        $sql06 ="SELECT * FROM materias where estatus = 1 ORDER BY materia ASC";
        $result06= mysql_query($sql06) or die ("Error $sql06");
        while($field= mysql_fetch_array($result06)){
            $id_materia = $field['id_materia'];
            $option = utf8_decode($field['materia']);
            $sql07 ="SELECT * FROM maestro_materia where id_usuario = $id_maestro AND id_materia = $id_materia ";
            $result07= mysql_query($sql07) or die ("no se ejecuta consulta 7 $sql07");
            $existe = mysql_num_rows($result07);
            if($existe > 0){
                //echo"<option value=0>no disponible</option>";
            }
            else{
                echo"<option value=$id_materia>$option</option>";
            }
        }
        echo"</select><br></td></tr>";
        echo"<input type=hidden id=accion name=accion value=1>";
        echo"<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo"<tr><td colspan=2><center><input type=submit value=Agregar></center></td></tr>";
        echo"</form></table>";
        echo"</div>";

    }
  public function createMaestroMateria($id_maestro, $id_materia){
        if ($id_materia > 0){
            $insert01 = " INSERT INTO maestro_materia (id_usuario,id_materia) VALUES('$id_maestro','$id_materia')";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }
    }
    public function deleteMaestroMateria($id_maestro, $id_materia){
        if ($id_materia > 0){
            $delete01 = "DELETE FROM maestro_materia WHERE id_usuario = $id_maestro AND id_materia = $id_materia";
            $delete01 = mysql_query($delete01) or die('error en consulta delete01');
        }
    }

}
?>

