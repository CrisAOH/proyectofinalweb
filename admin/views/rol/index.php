<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Roles</h1>
        <a href="rol.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col" class="col-md-4">ID</th>
                <th scope="col" class="col-md-4">Rol</th>
                <th scope="col" class="col-md-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $rol): ?>
                <tr>
                    <th scope="row">
                        <?php echo $rol['id_rol']; ?>
                    </th>
                    <td>
                        <?php echo $rol['rol']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-dark"
                                href="rol.php?action=privilegio&id=<?php echo $rol['id_rol'] ?>">Privilegios</a>
                            <a class="btn btn-primary"
                                href="rol.php?action=edit&id=<?php echo $rol['id_rol'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="rol.php?action=delete&id=<?php echo $rol['id_rol'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>