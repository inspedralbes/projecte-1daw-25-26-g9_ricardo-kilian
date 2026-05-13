<?php include '../../structure/header.php'; 
include '../../structure/adminStructure/navBarAdmin.php'; 

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
    WHERE i.dataFinalitzacio IS NULL
    ORDER BY FIELD(p.descripcio, 'Alta', 'Mitja', 'Baixa')
");

$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<main class="container mt-5">


    <h1 class="mb-4 text-center">Llistat d'Incidències</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-center">

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
                <?php
                $color = "";

                if($incidencia["prioritat"] == "Alta"){
                    $color = "table-danger";
                }
                else if($incidencia["prioritat"] == "Mitja"){
                    $color = "table-warning";
                }
                else if($incidencia["prioritat"] == "Baixa"){
                    $color = "table-success";
                }
                ?>
                

                    <tr class="<?= $color ?>">
                        <td><?= $incidencia["idIncidencia"] ?></td>
                        <td><?= htmlspecialchars($incidencia["descripcio"]) ?></td>
                        <td><?= $incidencia["data"] ?></td>
                        <td><?= htmlspecialchars($incidencia["departament"]) ?></td>
                        <td><?= $incidencia["tecnic"] ?></td>
                        <td><?= htmlspecialchars($incidencia["tipus"]) ?></td>
                        <td><?= $incidencia["dataFinalitzacio"] ?></td>
                        <td>
                            <span class="<?= $color ?>">
                                <?= $incidencia["prioritat"] ?>
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="updateAssignment.php?idIncidencia=<?= $incidencia["idIncidencia"]; ?>">
                               Modificar
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