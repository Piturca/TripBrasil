<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		if ($_POST) {
			$accion = $_POST['accion'];

			function ejecutar_query($sql){
				include 'conn.php';
				if ($conn->query($sql) === TRUE) {
			        return 'ok';
			    } else {
			        echo "Error: " . $conn->error;
			    }
			    $conn->close();
				}
			}
$id = (isset($_POST["id"])) ? $_POST["id"] : '';
$gasto = (isset($_POST["gasto"])) ? $_POST["gasto"] : '';
$monto = (isset($_POST["monto"])) ? $_POST["monto"] : '';

			switch ($accion) {
				case 'agregar':
				    $sql = "INSERT INTO brasil VALUES ('', '$gasto', '$monto')";
				    if (ejecutar_query($sql) == 'ok') {
	?>
				    	<script>
                            Swal.fire({
                                icon: 'success',
                                title: '¡¡¡Listo !!!',
                                text: '¡Gasto agregado!'
                            }).then(function() {
                                window.location = "index.php";
                            });
                        </script>
	<?php
				    }
					break;
				}
	?>
