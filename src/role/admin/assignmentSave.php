<?php include '../../structure/header.php'; 
include '../../structure/adminStructure/navBarAdmin.php';

$mysqli = include_once "../../connexio.php";

$idIncidencia = $_GET['idIncidencia'] ?? null;

if (!$idIncidencia) {
    die("ID no válida");
}

$stmt = $mysqli->prepare("
    SELECT *
    FROM INCIDENCIA
    WHERE idIncidencia = ?
");

$stmt->bind_param("i", $idIncidencia);
$stmt->execute();

$result = $stmt->get_result();
$incidencia = $result->fetch_assoc();

if (!$incidencia) {
    die("Incidència no trobada");
}

$tecnics = $mysqli->query("
    SELECT idTecnic, nom
    FROM TECNIC
")->fetch_all(MYSQLI_ASSOC);

$prioritats = $mysqli->query("
    SELECT idPrioritat, descripcio
    FROM PRIORITAT
")->fetch_all(MYSQLI_ASSOC);

?>

<main class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-12 col-md-8 col-lg-5">

            <div class="card shadow-sm p-4">

                <h1 class="mb-4 text-center">
                    Assignar incidència
                </h1>

                <form action="updateAssignment.php" method="POST">

                    <input
                        type="hidden"
                        name="idIncidencia"
                        value="<?= $incidencia['idIncidencia'] ?>"
                    >

                    <div class="mb-3">
                        <label for="idTecnic" class="form-label">
                            Tècnic
                        </label>

                        <select
                            name="idTecnic"
                            id="idTecnic"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Selecciona un tècnic
                            </option>

                            <?php foreach ($tecnics as $t): ?>

                                <option
                                    value="<?= $t['idTecnic'] ?>"
                                    <?= $incidencia['idTecnic'] == $t['idTecnic'] ? 'selected' : '' ?>
                                >
                                    <?= htmlspecialchars($t['nom']) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idPrioritat" class="form-label">
                            Prioritat
                        </label>

                        <select
                            name="idPrioritat"
                            id="idPrioritat"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Selecciona prioritat
                            </option>

                            <?php foreach ($prioritats as $p): ?>

                                <option
                                    value="<?= $p['idPrioritat'] ?>"
                                    <?= $incidencia['idPrioritat'] == $p['idPrioritat'] ? 'selected' : '' ?>
                                >
                                    <?= htmlspecialchars($p['descripcio']) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-success">
                            Guardar canvis
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</main>
<?php include '../../structure/logOut.php';
include '../../structure/footer.php'; ?>
