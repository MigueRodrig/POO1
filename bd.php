<?php
$db_name="bd";
$db_server="localhost";
$db_user="root";
$db_password="";
$db_conexion=mysql_connect($db_server,$db_user,$db_password) or die ("Error en la conexion");
mysql_select_db($db_name,$db_conexion) or die("No existe la base de datos");

?>	