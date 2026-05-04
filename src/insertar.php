<?php include './structure/header.php'; ?>

<main class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            
            <h1 class="mb-4 text-center">Registrar Incidencia</h1>

            <form action="registrar.php" method="POST">
                
                <!-- Descripció -->
                <div class="mb-3">
                    <label for="descripcio" class="form-label">Descripció</label>
                    <textarea placeholder="Descripció" class="form-control" name="descripcio" id="descripcio" rows="5" required>
                    </textarea>
                </div>

                <!-- Tipus -->
                <div class="mb-3">
                    <label class="form-label">ID Tipus</label>
                    <input type="number" name="idTipus" class="form-control" required>
                </div>

                <!-- Departament -->
                <div class="mb-3">
                    <label class="form-label">ID Departament</label>
                    <input type="number" name="idDepartament" class="form-control" required>
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button class="btn btn-success">Guardar</button>
                </div>

            </form>

        </div>
    </div>

</main>

<?php include './structure/footer.php'; ?>