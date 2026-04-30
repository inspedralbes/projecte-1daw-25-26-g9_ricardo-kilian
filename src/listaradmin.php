<?php
$mysqli = include_once "connexio.php";
$resultado = $mysqli->query("SELECT idIncidencia, descripcio, data, idDepartament
, idTecnic,idTipus,dataFinalitzacio,  prioritat    FROM INCIDENCIA");
$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<table class="table">
            <thead>
           
            </thead>
            <tbody>
                <?php
                foreach ($incidencias as $incidencia) { ?>
                    <tr>
                        <td><?php echo $incidencia["idIncidencia"] ?></td>
                        <td><?php echo $incidencia["descripcio"] ?></td>
                        <td><?php echo $incidencia["data"] ?></td>
                        <td><?php echo $incidencia["idDepartament"] ?></td>
                        <td><?php echo $incidencia["idTecnic"] ?></td>
                        <td><?php echo $incidencia["idTipus"] ?></td>
                        <td><?php echo $incidencia["dataFinalitzacio"] ?></td>
                        <td><?php echo $incidencia["prioritat"] ?></td>
                         <td>
                            <a href="asignar.php?idIncidencia=<?php echo $incidencia["idIncidencia"]; ?>">Asignar </a>
    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

