<?php
$mysqli = include_once "connexio.php";

$tecnics = $mysqli->query("SELECT idTecnic, nom FROM TECNIC")
->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Técnico</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

<div class="panel">

<h1 class="text-center mb-4">Gestió d'Incidències</h1>

<div class="row g-4">

    <div class="col-md-5">

        <div class="box">
            <h5>Tots els tècnics</h5>

            <div class="tecnic-list mt-2">

                <?php foreach ($tecnics as $t): ?>
                    <div>
                        <?= $t["nom"] ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>

    <div class="col-md-7">

        <div class="box mb-3 text-center">
            <h5>Entrar per ID d'incidència</h5>

            <form action="gestionarIncidencia.php" method="GET">
                <input type="number" name="id" class="form-control mt-3" placeholder="ID incidència" required>
                <button class="btn btn-primary w-100 mt-3">Entrar</button>
            </form>
        </div>

        <div class="box text-center">
            <h5>Veure totes les incidències</h5>

            <a href="llistatTecnico.php" class="btn btn-success w-100 mt-2">
                Entrar
            </a>
        </div>

    </div>

</div>

</div>

</body>
</html>