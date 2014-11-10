<!DOCTYPE html>
<html lang="en">
<fieldset align="center">
    <legend><h3>Acceso Al Sistema</h3></legend>
    <form action='valida.php' method="POST" class="login">
        <br><div><label>Usuario</label><br>
            <input class='rounded user' name="Usuario" type="text" style='width:200px;' placeholder="Usuario"></div>
        <br>
        <div><label>Password</label><br>
            <input class='rounded passw' name="password" type="password" style='width:200px;' placeholder="*********"></div>
        <br>
        <div><input name="login" type="submit" class='rounded' value="Entrar"></div>
    </form>
</fieldset>

        <?php

       include('header.php');
        
       ?>
</html>

<!-- Bootstrap core JavaScript
================================================== -->


