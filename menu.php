<?php
require('header.php');
$idu=$_COOKIE['id_usuario'];
$acceso=$_COOKIE['acceso'];
$tipo=$_COOKIE['tipo'];
if($idu=="" or $acceso=="")
{	print "<meta http-equiv='refresh' content='0; url=index.php?msg='>";
    exit;
}
if($tipo=="3")
{
    ?>
<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
    <li><a href="#">Sistema Escolar</a></li>
        <li class="active"><a href="index.php">Inicio</a></li>
        <li><a href="muestra_materias.php">Materias asignadas</a></li>
        
     
    </ul>
</div><!--/.nav-collapse -->
<div class="container theme-showcase" role="main">
<?php
    require_once('bd.php');
    $sql="select * from usuario where id_usuario=$idu";
    $consulta=mysql_query($sql) or die ("error de consulta $sql");
    $idu=mysql_result($consulta, 0, 'id_usuario');
    $nombre=mysql_result($consulta, 0, 'Nombre');
	$nombre=ucwords("$nombre");
    $Ap=mysql_result($consulta, 0, 'ApellidoPaterno');
    $Ap=ucwords("$Ap");
    $Am=mysql_result($consulta, 0, 'ApellidoMaterno');
    $Am=ucwords("$Am");
    echo"<div>Bienvenido Maestro:<b>$nombre $Ap $Am</div><br>";




}
if($tipo=="1")
{

    ?>

<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>
        <li><a href="testuser.php">Administracion usuarios</a></li>
        
        <li><a href="TestMateria.php">Asignar Materias a Maestro</a></li>
        <li><a href="testalumno.php">Asignar alumnos a Grupo</a></li>
      
    </ul>
</div><!--/.nav-collapse -->
<div class="container theme-showcase" role="main">
<?php    
    require_once('bd.php');
    $sql="select * from usuario where id_usuario=$idu";
    $consulta=mysql_query($sql) or die ("error de consulta $sql");
    $idu=mysql_result($consulta, 0, 'id_usuario');
    $nombre=mysql_result($consulta, 0, 'Nombre');
	$nombre=ucwords("$nombre");
    $Ap=mysql_result($consulta, 0, 'ApellidoPaterno');
    $Ap=ucwords("$Ap");
    $Am=mysql_result($consulta, 0, 'ApellidoMaterno');
    $Am=ucwords("$Am");
    echo"<div>Bienvenido Administrador:<b>$nombre $Ap $Am</div><br>";
}
?>