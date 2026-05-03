<?php include './structure/header.php'; ?>

<main class="container mt-4">

    <!-- Banner -->
    <div class="row justify-content-center mb-5">
        <div class="col-10 col-md-6">
            <div class="banner-login">
                GESTOR D'INCIDÈNCIES
            </div>
        </div>
    </div>

    <!-- ROLES -->
    <div class="row justify-content-center g-4">

        <!-- ADMIN -->
        <div class="col-10 col-sm-4 col-md-3">
            <a href="../admin.php" class="rol-card">
                <img src="../photos/admin.jpg" class="rol-img" alt="Admin">
                <div class="overlay"></div>
                <span class="rol-label">ADMIN</span>
            </a>
        </div>

        <!-- TÈCNIC -->
        <div class="col-10 col-sm-4 col-md-3">
            <a href="../tecnic.php" class="rol-card">
                <img src="../photos/tecnic.jpg" class="rol-img" alt="Tècnic">
                <div class="overlay"></div>
                <span class="rol-label">TÈCNIC</span>
            </a>
        </div>

        <!-- USUARI -->
        <div class="col-10 col-sm-4 col-md-3">
            <a href="../usuari.php" class="rol-card">
                <img src="../photos/user.jpg" class="rol-img" alt="Usuari">
                <div class="overlay"></div>
                <span class="rol-label">USER</span>
            </a>
        </div>

    </div>

</main>

<?php include './structure/footer.php'; ?>