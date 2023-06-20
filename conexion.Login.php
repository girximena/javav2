<?php

include('db.php');

$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];

$consulta = "SELECT* FROM login where usuario = '$USUARIO' and password ='$PASSWORD' ";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:menu.php");
}else{
    include("index.php");
    ?>
    <div class="error-message">
        <h1>ERROR DE AUTENTIFICACIÓN</h1>
    </div>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>