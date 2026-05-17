<?php include '../../structure/header.php'; ?>
<?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

<main class="container mt-4 admin-bg">


    <div class="text-center">
        <h1 class="mb-4">PANELL ADMIN</h1>

        <div class="row g-4 justify-content-center">
             <div class="col-12 col-md-4">
                <div class="card translate-card border-0 rounded-4 shadow h-100 text-center p-4">
                    <h4 class="mb-3">Assignar Incidències</h4>
                    <a href="assigmentList.php" class="btn btn-danger">Entrar</a>
                </div>
            </div>
            
        
        
            <div class="col-12 col-md-4">
                <div class="card translate-card border-0 rounded-4 shadow h-100 text-center p-4">
                    <h4 class="mb-3">Llistar Incidències</h4>
                    <a href="adminList.php" class="btn btn-success">Entrar</a>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card translate-card border-0 rounded-4 shadow h-100 text-center p-4">
                    <h4 class="mb-3">Estadístiques Incidències</h4>
                    <a href="statistics.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>
