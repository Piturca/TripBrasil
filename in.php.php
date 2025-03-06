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

	</style>

    </style>

</head>

<body>
	<nav class="navbar navbar-expand-lg bg-primary">
     	<div class="container">
     		<a class="navbar-brand text-white" href="#">
                Brasil Trip <i rel="shortcut icon" href="C:\xampp\htdocs\TripBrasil\TripBrasil\brasil.png" type="image/png"></i>
            </a>
     		<h2 class="text-center">Registro de Gastos</h2>
	<div class="container mt-3 col-md-3">


        <form action="procesar.php" method="POST">
            <label class="form-label" for="nombre">Gasto:</label>
            <input type="hidden" id="accion" name="accion" value="agregar">
            <input type="text" class="form-control" id="Gasto" name="Gasto" placeholder="Gasto" required><br>
            <label for="Monto">Monto:</label>
            <input type="text" class="form-control" id="Monto" name="Monto" placeholder="Monto" required><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <?php

        $query = "SELECT * FROM inma_brasil";
        $result = $conn->query($query);

        if ($result->num_rows > 0)
    ?>
     <div class="container mt-3 table-responsive">
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>GASTO</th>
                            <th>BASE</th>
                            <th>IVA</th>
                            <th>MONTO</th>
                        </tr>
                    </thead>
                    <tbody>
</body>
</html>