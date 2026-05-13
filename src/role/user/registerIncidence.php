<?php include '../../structure/header.php';
include '../../structure/userStructure/navBarUser.php'; 

$mysqli = include_once "../../connexio.php";

$llistatTipus = $mysqli->query("SELECT idTipus, nom FROM TIPUS");
$tipus = $llistatTipus->fetch_all(MYSQLI_ASSOC);

$llistatDept = $mysqli->query("SELECT idDepartament, nom FROM DEPARTAMENT");
$departaments = $llistatDept->fetch_all(MYSQLI_ASSOC);
?>

<main class="container mt-5" id="main-content">
    <a href="#taula-incidencies" class="visually-hidden-focusable">
        Saltar al contingut principal
    </a>


    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <h1 class="mb-4 text-center">
                Registrar incidència
            </h1>

            <form action="register.php" method="POST">

                <div class="mb-3">
                    <label for="descripcio" class="form-label">
                        Descripció <span aria-hidden="true">*</span>
                    </label>

                    <textarea
                        class="form-control"
                        name="descripcio"
                        id="descripcio"
                        rows="4"
                        required
                        aria-required="true"
                        aria-describedby="descripcioForm"
                        placeholder="Escriu una descripció de la incidència"
                    ></textarea>

                    <div id="descripcioForm" class="form-text">
                        Introdueix una descripció clara de la incidència.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="idTipus" class="form-label">
                        Tipus <span aria-hidden="true">*</span>
                    </label>

                    <select
                        name="idTipus"
                        id="idTipus"
                        class="form-select"
                        required
                        aria-required="true"
                        aria-describedby="tipusForm"
                    >
                        <option value="">
                            -- Selecciona un tipus --
                        </option>

                        <?php foreach ($tipus as $t): ?>
                            <option value="<?php echo $t['idTipus']; ?>">
                                <?php echo htmlspecialchars($t['nom']); ?>
                            </option>
                        <?php endforeach; ?>

                    </select>

                    <div id="tipusForm" class="form-text">
                        Selecciona el tipus d’incidència.
                    </div>
                </div>

                <div class="mb-4">
                    <label for="idDepartament" class="form-label">
                        Departament <span aria-hidden="true">*</span>
                    </label>

                    <select
                        name="idDepartament"
                        id="idDepartament"
                        class="form-select"
                        required
                        aria-required="true"
                        aria-describedby="departamentForm"
                    >
                        <option value="">
                            -- Selecciona un departament --
                        </option>

                        <?php foreach ($departaments as $dept): ?>
                            <option value="<?php echo $dept['idDepartament']; ?>">
                                <?php echo htmlspecialchars($dept['nom']); ?>
                            </option>
                        <?php endforeach; ?>

                    </select>

                    <div id="departamentForm" class="form-text">
                        Selecciona el departament relacionat.
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        Guardar incidència
                    </button>
                </div>

            </form>

        </div>
    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>