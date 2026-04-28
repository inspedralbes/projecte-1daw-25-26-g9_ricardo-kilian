<?php
$mysqli = include_once "connexio.php";
$resultado = $mysqli->query("SELECT id, nombre, descripcion FROM videojuegos");
$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<table class="table">
            <thead>
                <tr>
                    <th>idIndidencia</th>
                    <th>descripcio</th>
                    <th>data</th>
                    <th>idDepartament</th>
                    <th>idTecnic</th>
                    <th>idTipus</th>
                    <th>dataFinalitzacio</th>
                    <th>prioritat</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($incidencias as $incidencia) { ?>
                    <tr>
                        <td><?php echo $incidencia["id"] ?></td>
                        <td><?php echo $incidencia["descripcio"] ?></td>
                        <td><?php echo $incidencia["data"] ?></td>
                        <td><?php echo $incidencia["departament"] ?></td>
                        <td><?php echo $incidencia["tecnic"] ?></td>
                        <td><?php echo $incidencia["tipo"] ?></td>
                        <td><?php echo $incidencia["finalitzacio"] ?></td>
                        <td><?php echo $incidencia["prioritat"] ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>

