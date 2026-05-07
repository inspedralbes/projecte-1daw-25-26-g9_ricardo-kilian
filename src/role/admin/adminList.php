<?php include '../../structure/header.php'; 

$mysqli = include_once "../../connexio.php";

$resultado = $mysqli->query("
    SELECT 
        i.idIncidencia,
        i.descripcio,
        i.data,
        d.nom AS departament,
        t.nom AS tecnic,
        tp.nom AS tipus,
        i.dataFinalitzacio,
        p.descripcio AS prioritat

    FROM INCIDENCIA i
    LEFT JOIN DEPARTAMENT d 
        ON i.idDepartament = d.idDepartament
    LEFT JOIN TECNIC t 
        ON i.idTecnic = t.idTecnic
    LEFT JOIN TIPUS tp 
        ON i.idTipus = tp.idTipus
    LEFT JOIN PRIORITAT p 
        ON i.idPrioritat = p.idPrioritat
");

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
                        <td><?php echo $incidencia["departament"] ?></td>
                        <td><?php echo $incidencia["tecnic"] ?></td>
                        <td><?php echo $incidencia["tipus"] ?></td>
                        <td><?php echo $incidencia["dataFinalitzacio"] ?></td>
                        <td><?php echo $incidencia["prioritat"] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="assignment.php?idIncidencia=<?php echo $incidencia["idIncidencia"]; ?>">
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