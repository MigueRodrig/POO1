<?php
require('bd.php');
include ('incripta.php');
?>
<?php
$user=$_POST['Usuario'];
$psw2=$_POST['password'];
if ($user=="" or $psw2=="")
{
$msg="Los campos deben ir llenos2";
print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
	exit;
	}
$sql="select * from usuario where Usuario='$user' and password='$psw2'";
$consulta=mysql_query($sql) or die ("Error de consulta $sql");
$cuantos=mysql_num_rows($consulta);
	if ($cuantos==0)
	{
		$msg="El usuario o password no son correctos";
		print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
		exit;
		}
	else 
	{
	$idu=mysql_result($consulta, 0, 'id_usuario');
	$activo=mysql_result($consulta, 0, 'Estatus');
	$tipo=mysql_result($consulta, 0, 'Nivel');
	if ($activo=='0')
	{
	$msg='El usuario esta logeado, consulta a su administrador';
	print "<meta http-equiv='refresh' content='0; url=index.php?msg=$msg'>";
	exit;
	}
	else
	{
	     $ids=encode_this("idu=$idu&act=$activo&tipo=$tipo");
	print "<meta http-equiv='refresh' content='0; url=acceso.php?$ids'>";
	}
	}
	?>