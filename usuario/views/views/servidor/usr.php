<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1 class="text-center">Usuarios del Servidor:
            <?php echo $data[0]['alias']; ?>
        </h1>
        <p><a href="servidor.php?action=newUsuario&id=<?php echo $data[0]['id_servidor']; ?>" class="btn btn-success"
                role="button">Añadir usuario al servidor </a>
        </p>
    </div>
    <table class="table table-borderless datatable">
    <thead>
                <tr>
                    <th scope="col" class="col-md-2">ID</th>
                    <th scope="col-md-2" class="col-md-8">Usuario</th>
                    <th scope="col-md-2" class="col-md-8">Contraseña</th>
                    <th scope="col-md-2" class="col-md-8">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_usr as $key => $usr): ?>
                    <tr>
                        <td scope="row">
                            <?php echo $usr['id_usr']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $usr['usuario']; ?>
                        </td>
                        <td scope="row">
                            <?php echo $usr['contrasena']; ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Menu Renglon">
                                <a class="btn btn-danger"
                                    href="servidor.php?action=deleteUsuario&id=<?php echo $data['0']['id_servidor'] ?>&id_usr=<?php echo $usr['id_usr']; ?>">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</div>