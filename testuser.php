<?php
require_once('usuario.php');
require_once('menu.php');
require_once('bd.php');
$usuario = new Usuario();

echo"<div class=table-responsive>
                 <form name=alumno action='testuser.php' method='Post'>
                    <table class=\"table table-bordered\">
                         <tr><td align='right'>Nombre(s):</td><td><input type=text name=nombre></input></td><td colspan=2  align='right'>Escribe la clave del registro a modificar: </td><td><INPUT type=text name=idm><input type=submit name=submit value=Modificar></td></tr>
                         <tr><td  align='right'>Apellido Paterno:</td><td><input type=text name=apellidop></input></td><td colspan=2  align='right'>Escribe la clave del registro a eliminar:</td><td> <INPUT type=text name=idb><input type=submit name=submit value=Borrar></td></tr>
                         <tr><td  align='right'>Apellido Materno:</td><td><input type=text name=apellidom></input></td><td colspan=2  align='right'>Escribe la clave del registro para realizar la busqueda:</td><td> <INPUT type=text name=idbuscar><input type=submit name=submit value=Buscar></td></tr>
                         <tr><td  align='right'>Nivel:</td><td><select name=nivel>
                             <option value=1> Administrador</option>
                             <option value=2> Maestro</option>
                             <option value=3> Alumno</option>
                             </select></td></tr>
                         <tr><td colspan=2 align=center><input type=submit name=submit value=Alta></td></tr>

                     </table>
                 </form>
        </div>";



if(isset($_POST['submit'])){
    switch($_POST['submit']) {
        case "Alta":
            echo"<div class=\"alert alert-success\" role=alert>";
            echo"<br>Bot&oacute;n: ". $_POST['submit'];echo"</center><br>";
            echo"<center><h4>Alta realizada correctamente</h4></center>";
            echo "</div>";
            $usuario->createUsuario("$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]","$_POST[nivel]");
            BREAK;
        case "Borrar":
            echo"<div class=\"alert alert-danger\" role=alert>";
            echo"<br><center><h4>Bot&oacute;n: ". $_POST['submit'];echo"</center><br>";
            echo"<center><h4>Se elimino el registro correctamente</h4></center>";
            echo "</div>";
            $usuario->deleteUsuario($_POST['idb']);
            BREAK;
        case "Modificar":
            echo"<div class=\"alert alert-warning\" role=alert>";
            echo"<br>Bot&oacute;n: ".$_POST['submit'];echo"</center><br>";
            echo"<center><h4>El registro se modifico correctamente</h4></center>";
            echo "</div>";
            $usuario->updateUsuario($_POST['idm'],"$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]","$_POST[nivel]");
            BREAK;
        case "Buscar":
            echo"<div class=\"alert alert-info\" role=alert>";
            echo"<br>Bot&oacute;n: ". $_POST['submit'];
            echo "</div>";
            $usuario->readuS($_POST['idbuscar']);
            BREAK;

    }


}


$usuario->readUsuarioG();


require('footer.php');


?>

