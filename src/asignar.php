<?php
$mysqli = include_once "connexio.php";

$idIncidencia = $_GET["idIncidencia"];

$tecnics = $mysqli->query("SELECT idTecnic, nom FROM TECNIC");
$tipus = $mysqli->query("SELECT idTipus, nom FROM TIPUS");
?>

<h2>Asignar incidencia #<?php echo $idIncidencia; ?></h2>

<form action="guardar_asignacion.php" method="POST">
    
<input type="hidden" name="idIncidencia" value="<?php echo $idIncidencia; ?>">
    <label>Tecnic:</label>
    <select name="idTecnic" >

        <?php while ($tec = $tecnics->fetch_assoc()): ?>
            <option value="<?php echo $tec["idTecnic"]; ?>">
                <?php echo $tec["nom"]; ?>
            </option>
        <?php endwhile; ?>
    </select>


    

     <label>Tipus:</label>
    <select name="idTipus">
         <?php while ($ti = $tipus->fetch_assoc()): ?>
            <option value="<?php echo $ti["idTipus"]; ?>">
                <?php echo $ti["nom"]; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Guardar</button>
</form>