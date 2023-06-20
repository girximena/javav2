<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1><img class="em" src="imagenes/em.png" alt="em">Registro de Empleados</h1>
        <form action="conexionEmple.php" method="POST">
        <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="ID" name="ID" placeholder="id" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="Apellido" name="Apellido" placeholder="Apellido" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="Cargo" name="Cargo" placeholder="Cargo" required>
            </div>
            <center><button type="submit" name="Registrar"><i class="fas fa-user-plus"></i>
                        Registrar</button></center>
                <br>
                <button type="submit" name="submit" value="buscar"><i class="fas fa-search"></i>search</button>
        </form>
    </div>   
</body>
</html>
