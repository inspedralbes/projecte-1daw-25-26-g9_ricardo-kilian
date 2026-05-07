<?php include '../../structure/header.php'; ?>

<main class="container mt-4 admin-bg">

    <?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

    <div class="text-center">
        <h1 class="mb-4">PANELL ACCIONS</h1>

        <div class="row g-4 justify-content-center">
            
            <div class="col-12 col-md-4">
                <div class="card accion-card h-100 text-center p-4">
                    <h4 class="mb-3">Llistar Incidències</h4>
                    <a href="adminList.php" class="btn btn-success">Entrar</a>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card accion-card h-100 text-center p-4">
                    <h4 class="mb-3"></h4>
                    <a href="" class="btn btn-primary">Entrar</a>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card accion-card h-100 text-center p-4">
                    <h4 class="mb-3">Logs</h4>
                    <a href="" class="btn btn-dark">Entrar</a>
                </div>
            </div>

        </div>
    </div>

</main>
<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>