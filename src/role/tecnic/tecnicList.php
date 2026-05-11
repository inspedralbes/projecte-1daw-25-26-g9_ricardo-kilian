<?php include '../../structure/header.php'; 

$mysqli = include_once "../../connexio.php";


$resultTecnics = $mysqli->query("
    SELECT idTecnic, nom
    FROM TECNIC
");

$resultDepartaments = $mysqli->query("
    SELECT idDepartament, nom
    FROM DEPARTAMENT
");

$resultPrioritats = $mysqli->query("
    SELECT idPrioritat, descripcio
    FROM PRIORITAT
");

$idTecnic = $_GET['idTecnic'] ?? null;
$idDepartament = $_GET['idDepartament'] ?? null;
$idPrioritat = $_GET['idPrioritat'] ?? null;


$sql = "
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
    WHERE i.dataFinalitzacio IS NULL;
";


if ($idTecnic) {

    $sql .= " WHERE i.idTecnic = ? ";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $idTecnic);
    $stmt->execute();
    $resultado = $stmt->get_result();

} else {

    $resultado = $mysqli->query($sql);

}

$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container mt-5">

    <?php include '../../structure/tecnicStructure/navBarTecnic.php'; ?>
    
    <?php if (count($incidencias) > 0): ?>

        <br>

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

                    <?php foreach ($incidencias as $incidencia): ?>

                        <tr>

                            <td><?php echo $incidencia["idIncidencia"]; ?></td>

                            <td><?php echo htmlspecialchars($incidencia["descripcio"]); ?></td>

                            <td><?php echo $incidencia["data"]; ?></td>

                            <td><?php echo $incidencia["departament"]; ?></td>

                            <td><?php echo $incidencia["tecnic"]; ?></td>

                            <td><?php echo $incidencia["tipus"]; ?></td>

                            <td>-</td>

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

            No hi ha incidències disponibles.

        </div>

    <?php endif; ?>

    <div class="row justify-content-center mb-4">
        <div class="col-md-5">
            <form method="GET">
                <div class="card p-3 shadow-sm">

                    <h5 class="mb-3 text-center">Filtrar per tècnic</h5>

                    <select name="idTecnic" class="form-select mb-3">

                        <option value="">
                            -- Tots els tècnics --
                        </option>

                        <?php while($tecnic = $resultTecnics->fetch_assoc()): ?>

                            <option 
                                value="<?php echo $tecnic['idTecnic']; ?>"
                                <?php if($idTecnic == $tecnic['idTecnic']) echo 'selected'; ?>
                            >

                                <?php echo htmlspecialchars($tecnic['nom']); ?>

                            </option>

                        <?php endwhile; ?>
                    </select>

                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>

                </div>
            </form>
        </div>
    </div>
</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>