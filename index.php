<?php
	include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TripBrasil</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="d-flex flex-column min-vh-100">

	<!-- Barra de navegación -->
	<nav class="navbar navbar-expand-lg bg-success">
     	<div class="container">
     		<a class="navbar-brand text-white text-center w-100" href="#">
                <strong>Brasil Trip</strong> <img src="C:\xampp\htdocs\TripBrasil" width="40" height="40">
            </a>
     	</div>
	</nav>

    <!-- Contenido principal -->
	<div class="container mt-3 col-md-3">
        <h2 class="text-center">Registro de Gastos</h2>
        <form action="procesar.php" method="POST">
            <label class="form-label" for="nombre">Gasto:</label>
            <input type="hidden" id="accion" name="accion" value="agregar">
            <input type="text" class="form-control" id="Gasto" name="Gasto" placeholder="Gasto" required><br>
            <label for="Monto">Monto:</label>
            <input type="text" class="form-control" id="Monto" name="Monto" placeholder="Monto" required><br>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>

    <!-- Tabla de datos -->
    <?php
        $query = "SELECT * FROM inma_brasil";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
    ?>
    <div class="container mt-3 table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>GASTO</th>
                    <th>BASE</th>
                    <th>IVA</th>
                    <th>MONTO</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['gasto'] ?></td>
                        <td><?= $row['base'] ?></td>
                        <td><?= $row['iva'] ?></td>
                        <td><?= $row['monto'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>

    <!-- Barra azul en la parte inferior -->
    <footer class="bg-success text-white text-center py-3 mt-auto">
        &copy; 2025 TripBrasil - Todos los derechos reservados
    </footer>

</body>
</html>
