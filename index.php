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

    <link rel="icon" type="image/png" href="./brasil_favicon.png">


</head>
	<link rel="shortcut icon" href="C:\xampp\htdocs\TripBrasil\TripBrasil\brasil.png" type="image/png">
<body>
	<nav class="navbar navbar-expand-lg bg-success">
     	<div class="container">
     		<a class="navbar-brand text-white text-center w-100" href="#" style="display: flex; justify-content: center; align-items: center;">
                <h1>Brasil Trip</h1> <img style="height: 60px;" src="./brasil.png" alt="">
            </a>
        </div>
    </nav>

	<div class="container mt-3 col-md-3">
        <h2 class="text-center">Registro de Gastos</h2>
        <form action="procesar.php" method="POST">
            <label class="form-label" for="nombre">Gasto:</label>
            <input type="hidden" id="accion" name="accion" value="agregar">
            <input type="text" class="form-control" id="gasto" name="gasto" placeholder="Introduce el gasto" required><br>
            <label for="monto">Monto:</label>
            <input type="text" class="form-control" id="monto" name="monto" placeholder="Introduce el monto" required><br>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>

<?php

        $query = "SELECT id, gasto, monto FROM brasil";
        try {
            $result = $conn->query($query);
        } catch (Exception $e) {
            echo "Error en la consulta";
        }


        $resultTotal = $conn->query("SELECT SUM(monto) AS total FROM brasil")->fetch_assoc()['total'];

        if ($result->num_rows > 0) {
           switch (true) {
                case $resultTota > 800:
                    $alert = 'danger';
                    // code...
                    break;
                case $resultTota > 500;
                    $alert = 'warning';

                default:
                    $alert = 'success'; // code...
                    break;
        }
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
                            <td class="wrap"><?php echo number_format($row['monto']-($row['base']*0.21), 2, ',', '.'). ' €'; ?></td>
                            <td class="wrap"><?php echo number_format($row['IVA']*0.21, 2, ',', '.'). ' €'; ?></td>
                            <td class="wrap"><?php echo number_format($row['monto'], 2, ',', '.'). ' €'; ?></td>
                        </tr>

    <?php
                }
    ?>
                        <tr>
                            <td colspan="4" class="wrap" style="text-align: right;"><b>Total</b></td>
                            <td class="wrap"><?php echo number_format($resultTotal, 2, ',', '.'). ' €'; ?></td>
                        </tr>
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