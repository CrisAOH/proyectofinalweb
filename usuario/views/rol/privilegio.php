<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1 class="text-center">Privilegios del rol:
            <?php echo $data[0]['rol']; ?>
        </h1>
        <p><a href="rol.php?action=newPrivilegio&id=<?php echo $data[0]['id_rol']; ?>" class="btn btn-success"
                role="button">Añadir privilegio al rol </a>
        </p>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">ID</th>
                <th scope="col-md-2" class="col-md-8">Privilegio</th>
                <th scope="col-md-2" class="col-md-8">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_privilegio as $key => $privilegio): ?>
                <tr>
                    <td scope="row">
                        <?php echo $privilegio['id_privilegio']; ?>
                    </td>
                    <td scope="row">
                        <?php echo $privilegio['privilegio']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-danger"
                                href="rol.php?action=deletePrivilegio&id=<?php echo $data['0']['id_rol'] ?>&id_privilegio=<?php echo $privilegio['id_privilegio']; ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>