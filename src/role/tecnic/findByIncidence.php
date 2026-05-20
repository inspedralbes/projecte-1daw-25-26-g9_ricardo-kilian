<?php include '../../structure/header.php';
include '../../structure/tecnicStructure/navBarTecnic.php';

$mysqli = include_once "../../connexio.php";

$incidencia = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

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
    LEFT JOIN DEPARTAMENT d 
        ON i.idDepartament = d.idDepartament
    LEFT JOIN TECNIC t 
        ON i.idTecnic = t.idTecnic
    LEFT JOIN TIPUS tp 
        ON i.idTipus = tp.idTipus
    LEFT JOIN PRIORITAT pr 
        ON i.idPrioritat = pr.idPrioritat
    WHERE i.dataFinalitzacio IS NULL
        AND i.idIncidencia = ?
    ");

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $incidencia = $resultado->fetch_assoc();
}
?>

<main class="container mt-5">


    <h1 class="mb-4 text-center">Filtrar Incidència per ID</h1>

    <form method="GET" class="row justify-content-center mb-4">
        <div class="col-md-4">
            <input type="number" name="id" class="form-control" placeholder="Introdueix ID..." required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>


    <?php if ($incidencia) { ?>
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
                        <th>Actuació</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $incidencia["idIncidencia"]; ?></td>
                        <td><?php echo htmlspecialchars($incidencia["descripcio"] ?? ''); ?></td>
                        <td><?php echo $incidencia["data"]; ?></td>
                        <td><?php echo $incidencia["departament"]; ?></td>
                        <td><?php echo $incidencia["tecnic"]; ?></td>
                        <td><?php echo $incidencia["tipus"]; ?></td>
                        <td>-</td>
                        <td><?php echo $incidencia["descripcioPR"]; ?></td>
                        <td>
                            <a href="performance.php?idIncidencia=<?php echo $incidencia['idIncidencia']; ?>"
                                class="btn btn-sm btn-primary">
                                Entrar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } elseif (isset($_GET["id"])) { ?>
        <div class="alert alert-danger text-center">
            No s'ha trobat cap incidència amb aquest ID.
        </div>
    <?php } ?>
</main>
<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>