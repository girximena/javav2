<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>INICIO DE SESIÓN</h1>
        <center> <img class="avatar" src="imagenes/sesion.png" alt="avatar"></center>
        <br>
        <br>
        <form action="conexion.Login.php" method="POST">
            <div class="form-group">
                <label for="usuario"></label>
                <input type="text"name="usuario" placeholder="usuario" required>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <br>
            <br>
            <br>
            <center>
                <input type="submit" value="SING IN ">
            </center>
        </form>
        <br> 
    
</body>
</html>
