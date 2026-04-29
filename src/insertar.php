<div class="row">
    <div class="col-12">
        <h1>Registrar Incidencia</h1>
        <form action="registrar.php" method="POST">
            
            <!-- Descripció -->
            <div class="form-group">
                <label for="descripcio">Descripcio</label>
                <textarea placeholder="Descripció" class="form-control" name="descripcio" id="descripcio" cols="30" rows="10" required></textarea>
            </div>
            

            <!-- Tipus -->
            <div class="form-group">
                <label>ID Tipo</label>
                <input type="number" name="idTipus" class="form-control" required>
            </div>

            <!-- Departament -->
            <div class="form-group">
                <label>ID Departamento</label>
                <input type="number" name="idDepartament" class="form-control" required>
            </div>



            <div class="form-group mt-3">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>