<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>lab 2</title>
</head>

<body>
    <p class="h1">Busque la materias</p>
    <form action="" method="GET">
        <label for="search">Busque por el nombre de la materia:</label>
        <input type="text" class="form-control" id="search" name="search" required>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <h2>Nombres</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre de la materia</th>
            <th>Nombre del profesor</th>
        </tr>
        <tbody>
            <?php
            if (isset($_GET['search'])) {
                require_once 'conexion.php';

                $searchTerm = $_GET['search'];

                $stmt = $conn->prepare("CALL Buscar(?)");
                $stmt->bind_param("s", $searchTerm);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>' . $row['profesor'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No existe.</td></tr>';
                }

                $stmt->close();
                $conn->close();
            }
            ?>
        </tbody>
    </table>
</body>

</html>