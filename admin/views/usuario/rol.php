<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1 class="text-center">Roles del usuario:
            <?php echo $data[0]['usuario']; ?>
        </h1>
        <p><a href="usuario.php?action=newRol&id=<?php echo $data[0]['id_usuario']; ?>" class="btn btn-success"
                role="button">Añadir rol al usuario </a>
        </p>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">ID</th>
                <th scope="col-md-2" class="col-md-8">Rol</th>
                <th scope="col-md-2" class="col-md-8">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_rol as $key => $rol): ?>
                <tr>
                    <td scope="row">
                        <?php echo $rol['id_rol']; ?>
                    </td>
                    <td scope="row">
                        <?php echo $rol['rol']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-danger"
                                href="usuario.php?action=deleteRol&id=<?php echo $data['0']['id_usuario'] ?>&id_rol=<?php echo $rol['id_rol']; ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>