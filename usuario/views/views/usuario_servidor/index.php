<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Usuarios de los servidores</h1>
        <a href="usuario_servidor.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $us): ?>
                <tr>
                    <th scope="row">
                        <?php echo $us['id_usr']; ?>
                    </th>
                    <td>
                        <?php echo $us['usuario']; ?>
                    </td>
                    <td>
                        <?php echo $us['contrasena']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="usuario_servidor.php?action=edit&id=<?php echo $us['id_usr'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="usuario_servidor.php?action=delete&id=<?php echo $us['id_usr'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>