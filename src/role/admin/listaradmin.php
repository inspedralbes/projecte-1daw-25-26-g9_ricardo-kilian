<?php include '../../structure/header.php'; ?>

<?php
$mysqli = include_once "../../connexio.php";
$resultado = $mysqli->query("SELECT idIncidencia, descripcio, data, idDepartament,
idTecnic, idTipus, dataFinalitzacio, prioritat FROM INCIDENCIA");
$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<main class="container mt-5">
    <?php include '../../structure/adminStructure/navBarAdmin.php'; ?>
    <h1 class="mb-4 text-center">Llistat d'Incidències</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripció</th>
                    <th>Data</th>
                    <th>Departament</th>
                    <th>Tècnic</th>
                    <th>Tipus</th>
                    <th>Finalització</th>
                    <th>Prioritat</th>
                    <th>Acció</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($incidencias as $incidencia) { ?>
                    <tr>
                        <td><?php echo $incidencia["idIncidencia"] ?></td>
                        <td><?php echo $incidencia["descripcio"] ?></td>
                        <td><?php echo $incidencia["data"] ?></td>
                        <td><?php echo $incidencia["idDepartament"] ?></td>
                        <td><?php echo $incidencia["idTecnic"] ?></td>
                        <td><?php echo $incidencia["idTipus"] ?></td>
                        <td><?php echo $incidencia["dataFinalitzacio"] ?></td>
                        <td><?php echo $incidencia["prioritat"] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="asignar.php?idIncidencia=<?php echo $incidencia["idIncidencia"]; ?>">
                               Asignar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>