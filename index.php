<?php
	include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TripBrasil</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
	<link rel="shortcut icon" href="C:\xampp\htdocs\TripBrasil\TripBrasil\brasil.png" type="image/png">
<body>
	<nav class="navbar navbar-expand-lg bg-#009793">
     	<div class="container">
     		<a class="navbar-brand text-white text-center w-100" href="#">
                Brasil Trip <i rel="shortcut icon" href="C:\xampp\htdocs\TripBrasil\brasil.png" type="image/png"></i>
            </a>
        </div>
    </nav>

	<div class="container mt-3 col-md-3">
        <h2 class="text-center">Registro de Gastos</h2>
        <form action="procesar.php" method="POST">
            <label class="form-label" for="nombre">gasto:</label>
            <input type="hidden" id="accion" name="accion" value="agregar">
            <input type="text" class="form-control" id="gasto" name="gasto" placeholder="gasto" required><br>
            <label for="monto">monto:</label>
            <input type="text" class="form-control" id="monto" name="monto" placeholder="monto" required><br>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>

<?php

        $query = "SELECT * FROM brasil";
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
                            <th>IVA (21%)</th>
                            <th>MONTO</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
                $counter = '';
                while ($row = $result->fetch_assoc()) {
                    $counter++;
    ?>
                        <tr>
                            <td class="wrap"><?php echo $counter; ?></td>
                            <td class="wrap"><?php echo $row['gasto']; ?></td>
                            <td class="wrap"><?php echo number_format($row['monto']-($row['monto']*0.21), 2, ',', '.'). ' €'; ?></td>
                            <td class="wrap"><?php echo number_format($row['monto']*0.21, 2, ',', '.'). ' €'; ?></td>
                            <td class="wrap"><?php echo number_format($row['monto'], 2, ',', '.'). ' €'; ?></td>
                        </tr>

    <?php
                }
    ?>
                    </tbody>
                </table>
            </div>
    <?php
        }
        else {
    ?>

            <div class="container col-md-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No hay Datos</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">No se han encontado datos</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <img src="banner.jpg" class="img-fluid" alt="No Data">
            </div>
    <?php
        }
        $conn->close();
    ?>
</body>
</html>