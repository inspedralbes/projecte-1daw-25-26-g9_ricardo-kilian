<?php include 'header.php'; ?>

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
            <a href="admin.html" class="rol-card">
                <img src="../src/photos/admin.jpg" class="rol-img" alt="Admin">
                <div class="overlay"></div>
                <span class="rol-label">ADMIN</span>
            </a>
        </div>

        <!-- TÈCNIC -->
        <div class="col-10 col-sm-4 col-md-3">
            <a href="tecnic.html" class="rol-card">
                <img src="../src/photos/tecnic.jpg" class="rol-img" alt="Tècnic">
                <div class="overlay"></div>
                <span class="rol-label">TÈCNIC</span>
            </a>
        </div>

        <!-- USUARI -->
        <div class="col-10 col-sm-4 col-md-3">
            <a href="usuari.html" class="rol-card">
                <img src="../src/photos/user.jpg" class="rol-img" alt="Usuari">
                <div class="overlay"></div>
                <span class="rol-label">USER</span>
            </a>
        </div>

    </div>

</main>

<?php include 'footer.php'; ?>