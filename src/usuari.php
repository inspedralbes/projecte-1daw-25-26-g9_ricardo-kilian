<?php include './structure/header.php'; ?>

<main class="container mt-4">
    
    <div class="user-bar container-fluid">
        <div class="d-flex justify-content-end">
            <div class="user-box">
                <span>Usuari</span> 
                <img src="../photos/user.jpg" alt="Usuario">
            </div>
        </div>
    </div>

    <div class="inici_Usuari text-center">
        <h1>Gestio d'Incidencies</h1>
        
        <div class="Accio mt-4">
            <h2>Crear Incidencia</h2>
            <a href="insertar.php" class="btn btn-primary">Entrar</a>
        </div>

        <div class="Accio mt-4">
            <h2>Veure Incidencia</h2>
            <a href="llistat.php" class="btn btn-primary">Entrar</a>
        </div>

    </div>

</main>

<?php include './structure/footer.php'; ?>