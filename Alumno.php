<?php
    require('Usuario.php');
    class Alumno extends Usuario{

        private $grupo;

        public function readAlumno(){
                $sql01 = "SELECT * FROM usuario WHERE Estatus = 1 AND Nivel=3 ORDER BY ApellidoPaterno ASC";
                    $result01 = mysql_query($sql01) or die("Error $sql01");
                    $total_alumnos = mysql_num_rows($result01);
                    while ($field = mysql_fetch_array($result01)) {
                        $nombre = utf8_decode($field['Nombre']." ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']);
                        $sql03="SELECT * FROM alumno_grupo WHERE id_usuario = $field[id_usuario]";
                        $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
                        $existe = mysql_num_rows($result03);
                        if($existe == 0) {
                            echo "<tr><td><input type=checkbox name=al$field[id_usuario]> $nombre </td></tr>";
                        }else{
                    $id_grupo = mysql_result($result03,0,'id_grupo');
                    echo "<tr><td>$nombre, ya tiene grupo asignado.";
                    echo " (".$this->grupoAsignado($id_grupo).")";
                    echo "<a href=testalumno.php?accion=2&alumno_id=$field[id_usuario]>Desasignar</a> </td></tr>";
                }
            }
            echo "<input type=hidden name=total value=$total_alumnos>";
            $result02 = mysql_query('SELECT id_usuario FROM Usuario ORDER BY id_usuario DESC LIMIT 1;');
            if (mysql_num_rows($result02) > 0)
                $ultimo = mysql_fetch_row($result02);
            echo "<input type=hidden name=ultimo value=$ultimo[0]>";
        }

        public function grupoAsignado($id){
            $sql04 = "SELECT * FROM grupo WHERE id_grupo = $id";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $existe = mysql_num_rows($result04);
            if($existe > 0) {
                return mysql_result($result04, 0, 'nom_grupo');
            }else{
                return 0;
            }
        }
    }


?>