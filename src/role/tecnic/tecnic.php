<?php include '../../structure/header.php'; ?>

<main class="container mt-4">

    <?php include '../../structure/tecnicStructure/navBarTecnic.php'; ?>

    <div class="text-center">

        <h1 class="mb-4">PANELL TÈCNIC</h1>

        <div class="row g-4 justify-content-center">

            <div class="col-12 col-md-4">

                <div class="card accion-card h-100 text-center p-4">

                    <h4 class="mb-3">
                        Llistar Incidències
                    </h4>

                    <a 
                        href="tecnicList.php"
                        class="btn btn-success"
                    >
                        Entrar
                    </a>

                </div>

            </div>

        </div>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>