<?php include '../../structure/header.php';
include '../../structure/userStructure/navBarUser.php';

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

<main class="container mt-5" id="main-content">

    <a href="#taula-incidencies" class="visually-hidden-focusable">
        Saltar al contingut principal
    </a>

    
    <h1 class="mb-4 text-center">
        Llistat d’incidències
    </h1>

    <?php if (count($incidencias) > 0): ?>

        <div class="table-responsive">

            <table 
                id="taula-incidencies"
                class="table table-striped table-hover text-center align-middle"
            >

                <caption class="visually-hidden">
                    Taula amb el llistat d’incidències registrades
                </caption>

                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripció</th>
                        <th scope="col">Data</th>
                        <th scope="col">Departament</th>
                        <th scope="col">Tècnic</th>
                        <th scope="col">Tipus</th>
                        <th scope="col">Finalització</th>
                        <th scope="col">Prioritat</th>
                        <th scope="col">Actuacions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($incidencias as $incidencia): ?>

                        <tr>

                            <td>
                                <?php echo htmlspecialchars($incidencia["idIncidencia"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["descripcio"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["data"]); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["departament"] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["tecnic"] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["tipus"] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["dataFinalitzacio"] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($incidencia["prioritat"] ?? ''); ?>
                            </td>

                            <td>

                                <a
                                    href="performanceByIncidence.php?idIncidencia=<?php echo urlencode($incidencia['idIncidencia']); ?>"
                                    class="btn btn-sm btn-primary"
                                    aria-label="Entrar a la incidència <?php echo htmlspecialchars($incidencia['idIncidencia']); ?>"
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

        <div class="alert alert-info" role="status">
            No hi ha incidències registrades.
        </div>

    <?php endif; ?>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>