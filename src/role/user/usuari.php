<?php include '../../structure/header.php'; ?>

<main class="container mt-4">
    
    <?php include '../../structure/userStructure/navBarUser.php'; ?>

    <div class="inici_Usuari text-center">
        <h1 class="mb-4">PANELL ACCIONS</h1>

        <div class="row g-4 justify-content-center">

            <div class="col-12 col-md-4">
                <div class="card accion-card h-100 text-center p-4">
                    <h4 class="mb-3">Crear Incidència</h4>
                    <a href="insertar.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card accion-card h-100 text-center p-4">
                    <h4 class="mb-3">Llistar Incidències</h4>
                    <a href="llistat.php" class="btn btn-success">Entrar</a>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card accion-card h-100 text-center p-4">
                    <h4 class="mb-3">Filtrar per ID</h4>
                    <a href="findByIdIncidencia.php" class="btn btn-dark">Entrar</a>
                </div>
            </div>

        </div>
    </div>

    
</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>