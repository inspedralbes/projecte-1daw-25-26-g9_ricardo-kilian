<?php include '../../structure/header.php'; ?>

<main class="container mt-4">
        <?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

    <div class="row justify-content-center mb-3 ">
        <div class="col-10 col-md-6">
            <div class="banner-login">
                Informs
            </div>
        </div>
    </div>

    <div class="row justify-content-center g-4">

        <div class="col-10 col-sm-4 col-md-3">
            <a href="informTecnic.php" class="rol-card">
                <img src="" class="rol-img" alt="Tècnic">
                <div class="overlay"></div>
                <span class="rol-label">TÈCNIC</span>
            </a>
        </div>

        <div class="col-10 col-sm-4 col-md-3">
            <a href="informDepartament.php" class="rol-card">
                <img src="" class="rol-img" alt="Usuari">
                <div class="overlay"></div>
                <span class="rol-label">DEPARTEMNT</span>
            </a>
        </div>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>