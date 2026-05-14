<?php include '../../structure/header.php'; ?>
<?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

<main class="container mt-4">

    <div class="row justify-content-center g-4">
        
        <div class="col-10 col-sm-4 col-md-3">
            <a href="informTecnic.php" class="rol-card">
                <img src="../../photos/graphic_tecnic.jpg" class="rol-img" alt="Tècnic">
                <div class="overlay"></div>
                <span class="rol-label">TÈCNIC</span>
            </a>
        </div>

        <div class="col-10 col-sm-4 col-md-3">
            <a href="informDepartament.php" class="rol-card">
                <img src="../../photos/graphic_class.jpg" class="rol-img" alt="Departament">
                <div class="overlay"></div>
                <span class="rol-label">DEPARTAMENT</span>
            </a>
        </div>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>