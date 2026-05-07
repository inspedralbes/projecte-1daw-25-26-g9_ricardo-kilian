<?php
$mysqli = include_once "../../connexio.php";
$tecnics = $mysqli->query("SELECT idTecnic, nom FROM TECNIC")
->fetch_all(MYSQLI_ASSOC);
?>

<main class="container mt-4 admin-bg">
<title>Tecnic</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="inici_Admin text-center">

<h1 class="text-center mb-4">Gestió d'Incidències</h1>
        
<div class="Accio mt-4">

    <h5>Tots els tècnics</h5>

    <div class="tecnic-list mt-2">

        <?php foreach ($tecnics as $t): ?>
         <div>
        <?= $t["nom"] ?>
         </div>
        <?php endforeach; ?>

    </div>

    <div class="Accio mt-4">

        <h5>Entrar per id</h5>
         <form action="llistattecnic.php" method="GET">
            <input type="number" name="id" class="form-control mt-3" placeholder="ID incidència" required>
            <button class="btn btn-primary w-100 mt-3">Entrar</button>
        </form>
    </div>

    <div class="Accio mt-4">

        <div class="box text-center">
            <h5>Veure totes les incidències</h5>

            <a href="llistattecnic.php" class="btn btn-primary w-100 mt-3">Entrar</a>
        </div>

    </div>

</div>

</main>

