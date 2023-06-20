<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .edit-link, .delete-link {
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }

    .edit-link:hover, .delete-link:hover {
        color: darkblue;
    }
</style>
<?php
// Validamos los datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

// Conectamos a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificamos la conexión a la base de datos
if (!$connection) {
    echo "No se ha podido conectar con el servidor: " . mysql_error();
    exit();
}

// Indicamos el nombre de la base de datos
$datab = "gestion";
// Seleccionamos la base de datos
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    echo "No se ha podido encontrar la Tabla";
    exit();
}
// Manejo de los botones del formulario
if (isset($_POST['Registrar'])) {
    $id=$_POST["ID"];
    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $Cargo = $_POST["Cargo"];
    
    // Insertamos los datos en la base de datos
    $instruccion_SQL = "INSERT INTO empleados (ID, Nombre, Apellido, Cargo) VALUES ($id,'$Nombre', '$Apellido', '$Cargo')";
    $resultado = mysqli_query($connection, $instruccion_SQL);

    if ($resultado) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . mysqli_error($connection);
    }
}
if (isset($_POST['submit'])) {
    // Acción para el botón "submit"
    $consulta = "SELECT * FROM empleados";
    $result = mysqli_query($connection, $consulta);

    if ($result) {
        echo "<table>";
        echo "<tr>";
        echo "<th><h1>ID</h1></th>";
        echo "<th><h1>Nombre</h1></th>";
        echo "<th><h1>Apellido</h1></th>";
        echo "<th><h1>Cargo</h1></th>";
        echo "<th><h1>Acciones</h1></th>";
        echo "</tr>";

        while ($colum = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><h2>" . $colum['ID'] . "</h2></td>";
            echo "<td><h2>" . $colum['Nombre'] . "</h2></td>";
            echo "<td><h2>" . $colum['Apellido'] . "</h2></td>";
            echo "<td><h2>" . $colum['Cargo'] . "</h2></td>";
            echo "<td>";
            echo "<a href='?action=edit&id=" . $colum['ID'] . "'>Editar</a> ";
            echo "<a href='?action=delete&id=" . $colum['ID'] . "'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error al realizar la consulta: " . mysqli_error($connection);
    }
}
// Lógica de edición y eliminación
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del registro a editar
    $consulta = "SELECT * FROM empleados WHERE ID = $id";
    $result = mysqli_query($connection, $consulta);

    if ($result && mysqli_num_rows($result) > 0) {
        $registro = mysqli_fetch_assoc($result);
        $nombre = $registro['Nombre'];
        $apellido = $registro['Apellido'];
        $cargo = $registro['Cargo'];
        
        // Mostrar el formulario de edición
        echo "<h3>Editar registro</h3>";
        echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
        echo "ID: <input type='text' name='ID' value='$id'>";
        echo "Nombre: <input type='text' name='Nombre' value='$nombre'><br>";
        echo "Apellido: <input type='text' name='Apellido' value='$apellido'><br>";
        echo "Cargo: <input type='text' name='Cargo' value='$cargo'><br>";
        echo "<input type='submit' name='submit_edit' value='Guardar'>";
        echo "</form>";
    } else {
        echo "No se encontró el registro a editar";
    }
}
if (isset($_POST['submit_edit'])) {
    $id = $_POST['ID'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $cargo = $_POST['Cargo'];
    
    // Actualizar los datos en la base de datos
    $instruccion_SQL = "UPDATE empleados SET  ID=$id, Nombre='$nombre', Apellido='$apellido', Cargo='$cargo' WHERE ID=$id";
    $resultado = mysqli_query($connection, $instruccion_SQL);

    if ($resultado) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($connection);
    }
}
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    // Eliminar el registro de la base de datos
    $id = $_GET['id'];
    $instruccion_SQL = "DELETE FROM empleados WHERE ID = $id";
    $resultado = mysqli_query($connection, $instruccion_SQL);

    if ($resultado) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($connection);
    }
}
// Cerrar la conexión
mysqli_close($connection);
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!-- Resto de los campos del formulario -->
    <input type="submit" name="submit" value="Mostrar tabla">
</form>
