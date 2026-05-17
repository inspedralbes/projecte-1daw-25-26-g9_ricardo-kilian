<?php 
include '../../structure/header.php'; 
include '../../structure/adminStructure/navBarAdmin.php'; 

$mysqli = include_once "../../connexio.php";

$departament = $_GET['departament'] ?? '';
$tecnic = $_GET['tecnic'] ?? '';
$tipus = $_GET['tipus'] ?? '';
$prioritat = $_GET['prioritat'] ?? '';

$sql = "
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
";

if($departament != ''){
    $sql .= " AND d.nom = '$departament'";
}

if($tecnic != ''){
    $sql .= " AND t.nom = '$tecnic'";
}

if($tipus != ''){
    $sql .= " AND tp.nom = '$tipus'";
}

if($prioritat != ''){
    $sql .= " AND p.descripcio = '$prioritat'";
}

$sql .= " ORDER BY FIELD(p.descripcio, 'Alta', 'Mitja', 'Baixa')";

$resultado = $mysqli->query($sql);

$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

$departaments = $mysqli->query("SELECT nom FROM DEPARTAMENT");
$tecnics = $mysqli->query("SELECT nom FROM TECNIC");
$tipusList = $mysqli->query("SELECT nom FROM TIPUS");
$prioritats = $mysqli->query("SELECT descripcio FROM PRIORITAT");
?>

<main class="container mt-5">

    <h1 class="mb-4 text-center">Llistat d'Incidències</h1>

    <form method="GET" class="row mb-4">

        <div class="col-md-3">
            <select name="departament" class="form-select">
                <option value="">Tots els departaments</option>

                <?php while($d = $departaments->fetch_assoc()) { ?>

                    <option value="<?= $d['nom'] ?>"
                        <?= ($departament == $d['nom']) ? 'selected' : '' ?>>

                        <?= $d['nom'] ?>

                    </option>

                <?php } ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="tecnic" class="form-select">
                <option value="">Tots els tècnics</option>

                <?php while($t = $tecnics->fetch_assoc()) { ?>

                    <option value="<?= $t['nom'] ?>"
                        <?= ($tecnic == $t['nom']) ? 'selected' : '' ?>>

                        <?= $t['nom'] ?>

                    </option>

                <?php } ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="tipus" class="form-select">
                <option value="">Tots els tipus</option>

                <?php while($tp = $tipusList->fetch_assoc()) { ?>

                    <option value="<?= $tp['nom'] ?>"
                        <?= ($tipus == $tp['nom']) ? 'selected' : '' ?>>

                        <?= $tp['nom'] ?>

                    </option>

                <?php } ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="prioritat" class="form-select">
                <option value="">Totes les prioritats</option>

                <?php while($p = $prioritats->fetch_assoc()) { ?>

                    <option value="<?= $p['descripcio'] ?>"
                        <?= ($prioritat == $p['descripcio']) ? 'selected' : '' ?>>

                        <?= $p['descripcio'] ?>

                    </option>

                <?php } ?>
            </select>
        </div>

        <div class="col-md-12 mt-3 text-center">
            <button type="submit" class="btn btn-primary">
                Filtrar
            </button>

            <a href="?" class="btn btn-secondary">
                Netejar filtres
            </a>
        </div>

    </form>

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

                        <td><?= htmlspecialchars($incidencia["tecnic"]) ?></td>

                        <td><?= htmlspecialchars($incidencia["tipus"]) ?></td>

                        <td><?= !empty($incidencia["dataFinalitzacio"])  ? $incidencia["dataFinalitzacio"] : "No finalitzat" ?></td>

                        <td>
                            <?= $incidencia["prioritat"] ?>
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
