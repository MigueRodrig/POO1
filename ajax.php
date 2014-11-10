<?php

require_once('bd.php');
require_once('materia.php');
require_once('menu.php');
    $materia = new Materia(); 
     $id_maestro = $_POST['idmae']; 
    //$materia -> seleccionaMaestro($id_maestro);
    
$materia -> materiasAsignadas($id_maestro);


 
      $materia -> asignarMateriaMaestro($id_maestro);

require_once('footer.php');
?>