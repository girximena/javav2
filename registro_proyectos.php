<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Proyectos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2><img class="py" src="imagenes/py.png" alt="py">Registro de Proyectos</h2>
        <form action="conexionProyecto.php" method="POST">
        <form>

        <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
            </div>
            <center><button type="submit" name="Registrar"><i class="fas fa-user-plus"></i>
                        Registrar</button></center>
                <br>
                <button type="submit" name="submit" value="buscar"><i class="fas fa-search"></i>search</button>
        </form>
    </div>
</body>
</html>
