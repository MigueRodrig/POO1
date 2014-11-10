<?php
require_once('Alumno.php');
require_once('menu.php');
require_once('bd.php');
require ('grupo.php');
 $alumno = new Alumno();
    $grupo = new Grupo();


    if (isset($_GET['accion'])){
     switch($_GET['accion']){
         case 1:
             echo "<div class=\"alert alert-warning\" role=alert>
                        <center><h3>Alumno asignado correctamente.</h3></center>
                    </div>";
             break;
         case 2:
             $grupo->desasignarAlumnoGrupo($_GET['alumno_id']);
             echo "<div class=\"alert alert-info\" role=alert>
                        <center><h3>Alumno desasignado correctamente.</h3></center>
                    </div>";
             break;
     }
    }

    echo  "<div class=row>";
        
        echo "<div >";
            echo "<div class=table-responsive>";
            echo "<table class=\"table table-striped\">";
                echo "<form action=asignar_grupo.php method=POST>";
                $alumno->readAlumno();
                $grupo->readGrupo();
                echo "<tr><td align=center><input type=submit name=opcion value=Agregar></td></tr>";
                echo "</form>";
            echo "</table>";
            echo "</div>";
        echo "</div>";
       
    echo "</div>";

    require ('footer.php');
?>