<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Equipos</h1>
        <a href="equipo.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=dependencia" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=dependencia" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">No. Serie</th>
                <th scope="col">No.Inventario</th>
                <th scope="col">Otras características</th>
                <th scope="col">Imagen</th>
                <th scope="col">Referencias</th>
                <th scope="col">Modelo</th>
                <th scope="col">Funcion</th>
                <th scope="col">Dependencia</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $equipo): ?>
                <tr>
                    <th scope="row">
                        <?php echo $equipo['id_equipo']; ?>
                    </th>
                    <td>
                        <?php echo $equipo['no_serie']; ?>
                    </td>
                    <td>
                        <?php echo $equipo['no_inv']; ?>
                    </td>
                    <td>
                        <?php echo $equipo['otras_caract']; ?>
                    </td>
                    <td>
                        <img style="width: 125px;" src="<?php echo ($equipo['imagen']); ?>">
                    </td>
                    <td>
                        <?php echo $equipo['referencia']; ?>
                    </td>
                    <td>
                        <?php echo $equipo['modelo']; ?>
                    </td>
                    <td>
                        <?php echo $equipo['funcion']; ?>
                    </td>
                    <td>
                        <?php echo $equipo['dependencia']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="equipo.php?action=edit&id=<?php echo $equipo['id_equipo'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="equipo.php?action=delete&id=<?php echo $equipo['id_equipo'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>