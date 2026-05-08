<?php include '../../structure/header.php'; 

$mysqli = include_once "../../connexio.php";

$idTecnic = $_GET['idTecnic'] ?? null;

if (!$idTecnic) {

    echo "
    <main class='container mt-5'>
        <div class='alert alert-danger'>
            No s'ha seleccionat cap tècnic.
        </div>
    </main>
    ";

    include '../../structure/footer.php';
    exit;
}

$stmt = $mysqli->prepare("
    SELECT 
        i.idIncidencia,
        i.descripcio,
        i.data,
        d.nom AS departament,
        t.nom AS tecnic,
        tp.nom AS tipus,
        i.dataFinalitzacio,
        pr.descripcio as descripcioPR
    FROM INCIDENCIA i
    LEFT JOIN DEPARTAMENT d ON i.idDepartament = d.idDepartament
    LEFT JOIN TECNIC t ON i.idTecnic = t.idTecnic
    LEFT JOIN TIPUS tp ON i.idTipus = tp.idTipus
    LEFT JOIN PRIORITAT pr ON i.idPrioritat = pr.idPrioritat
    WHERE i.idTecnic = ?
");

$stmt->bind_param("i", $idTecnic);

$stmt->execute();

$resultado = $stmt->get_result();

$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container mt-5">

    <?php include '../../structure/tecnicStructure/navBarTecnic.php'; ?>

    <h1 class="mb-4 text-center">
        Incidències del tècnic
    </h1>

    <?php if (count($incidencias) > 0): ?>

        <div class="table-responsive">

            <table class="table table-striped table-hover">

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
                        <th>Actuació</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($incidencias as $incidencia): ?>

                        <tr>

                            <td><?php echo $incidencia["idIncidencia"]; ?></td>

                            <td><?php echo htmlspecialchars($incidencia["descripcio"]); ?></td>

                            <td><?php echo $incidencia["data"]; ?></td>

                            <td><?php echo $incidencia["departament"]; ?></td>

                            <td><?php echo $incidencia["tecnic"]; ?></td>

                            <td><?php echo $incidencia["tipus"]; ?></td>

                            <td><?php echo $incidencia["dataFinalitzacio"]; ?></td>

                            <td><?php echo $incidencia["descripcioPR"]; ?></td>
                            <td>
                                <a 
                                    href="performance.php?idIncidencia=<?php echo $incidencia['idIncidencia']; ?>" 
                                    class="btn btn-sm btn-primary"
                                >
                                    Entrar
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <div class="alert alert-warning text-center">

            Aquest tècnic no té incidències assignades.

        </div>

    <?php endif; ?>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>