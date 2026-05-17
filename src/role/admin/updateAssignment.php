<?php
$mysqli = include_once "../../connexio.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idIncidencia = $_POST['idIncidencia'] ?? null;

    if (!$idIncidencia) {
        die("ID no válida (POST)");
    }

    $stmt = $mysqli->prepare("
        UPDATE INCIDENCIA
        SET idTecnic = ?,
            idPrioritat = ?
        WHERE idIncidencia = ?
    ");

    if (!$stmt) {
        die("Error prepare UPDATE: " . $mysqli->error);
    }

    $stmt->bind_param(
        "iii",
        $_POST['idTecnic'],
        $_POST['idPrioritat'],
        $idIncidencia
    );  

    if (!$stmt->execute()) {
        die("Error execute UPDATE: " . $stmt->error);
    }

    header("Location: adminList.php");
    exit;
}

$idIncidencia = $_GET['idIncidencia'] ?? null;

if (!$idIncidencia) {
    die("ID no válida (GET)");
}

$stmt = $mysqli->prepare("SELECT * FROM INCIDENCIA WHERE idIncidencia = ?");
if (!$stmt) {
    die("Error prepare SELECT: " . $mysqli->error);
}

$stmt->bind_param("i", $idIncidencia);
$stmt->execute();

$incidencia = $stmt->get_result()->fetch_assoc();

if (!$incidencia) {
    die("Incidència no trobada");
}


$tecnics = $mysqli->query("SELECT idTecnic, nom FROM TECNIC")->fetch_all(MYSQLI_ASSOC);
$prioritats = $mysqli->query("SELECT idPrioritat, descripcio FROM PRIORITAT")->fetch_all(MYSQLI_ASSOC);
$tipus = $mysqli->query("SELECT idTipus, nom FROM TIPUS")->fetch_all(MYSQLI_ASSOC);
$departaments = $mysqli->query("SELECT idDepartament, nom FROM DEPARTAMENT")->fetch_all(MYSQLI_ASSOC);

include '../../structure/header.php';
include '../../structure/adminStructure/navBarAdmin.php';
?>

<main class="container mt-5" id="main-content">

    <div class="row justify-content-center">

        <div class="col-12 col-md-8 col-lg-5">

            <div class="card shadow-sm border-0 rounded-4 p-4">

                <h1 class="text-center mb-4">
                    Modificar incidència
                </h1>

                <form method="POST">

                    <input type="hidden"
                           name="idIncidencia"
                           value="<?= htmlspecialchars($incidencia['idIncidencia']) ?>">
                    <input type="hidden" name="idTipus" value="<?= $incidencia['idTipus'] ?>">
                    <input type="hidden" name="idDepartament" value="<?= $incidencia['idDepartament'] ?>">

                    <!-- TÈCNIC -->
                    <div class="mb-3">
                        <label for="idTecnic" class="form-label">Tècnic</label>
                        <select name="idTecnic" id="idTecnic" class="form-select form-select-sm" required>

                            <?php foreach ($tecnics as $t): ?>
                                <option value="<?= $t['idTecnic'] ?>"
                                    <?= $incidencia['idTecnic'] == $t['idTecnic'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($t['nom']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- PRIORITAT -->
                    <div class="mb-3">
                        <label for="idPrioritat" class="form-label">Prioritat</label>
                        <select name="idPrioritat" id="idPrioritat" class="form-select form-select-sm" required>

                            <?php foreach ($prioritats as $p): ?>
                                <option value="<?= $p['idPrioritat'] ?>"
                                    <?= $incidencia['idPrioritat'] == $p['idPrioritat'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($p['descripcio']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- TIPUS -->
                    <div class="mb-3">
                        <label for="idTipus" class="form-label">Tipus</label>
                        <select name="idTipus" id="idTipus" class="form-select form-select-sm" required>

                            <?php foreach ($tipus as $tp): ?>
                                <option value="<?= $tp['idTipus'] ?>"
                                    <?= $incidencia['idTipus'] == $tp['idTipus'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($tp['nom']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- DEPARTAMENT -->
                    <div class="mb-4">
                        <label for="idDepartament" class="form-label">Departament</label>
                        <select name="idDepartament" id="idDepartament" class="form-select form-select-sm" required>

                            <?php foreach ($departaments as $d): ?>
                                <option value="<?= $d['idDepartament'] ?>"
                                    <?= $incidencia['idDepartament'] == $d['idDepartament'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($d['nom']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Guardar canvis
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include '../../structure/logOut.php';
include '../../structure/footer.php';
?>