<?php include './structure/header.php'; ?>

<main class="container mt-4">

    <div class="row justify-content-center mt-5 mb-3 ">
        <div class="col-10 col-md-6">
            <div class="bg-primary-subtle border border-primary-subtle border-2 rounded px-3 py-3 text-center fw-semibold fs-5" style="color: #1a1a2e;">
                GESTOR D'INCIDÈNCIES
            </div>
        </div>
    </div>

   <div class="row justify-content-center g-4 mt-2">
        <div class="col-10 col-sm-4 col-md-3">
            <a href="./role/admin/admin.php" class="rol-card">
                <img src="../photos/admin.jpg" class="rol-img" alt="Admin">
                <div class="overlay"></div>
                <span class="rol-label">ADMIN</span>
            </a>
        </div>

        <div class="col-10 col-sm-4 col-md-3">
            <a href="./role/tecnic/tecnic.php" class="rol-card">
                <img src="../photos/tecnic.jpg" class="rol-img" alt="Tècnic">
                <div class="overlay"></div>
                <span class="rol-label">TÈCNIC</span>
            </a>
        </div>

        <div class="col-10 col-sm-4 col-md-3">
            <a href="./role/user/usuari.php" class="rol-card">
                <img src="../photos/user.jpg" class="rol-img" alt="Usuari">
                <div class="overlay"></div>
                <span class="rol-label">PROFESSORAT</span>
            </a>
        </div>

    </div>

</main>

<?php include './structure/footer.php'; ?>