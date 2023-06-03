<h1>Usuarios de los servidores</h1>
<a href="usuario_servidor.php?action=new" class="btn btn-success">Nuevo</a>
<div class="container-fluid table-responsive">
    <table class="table cell-border order-column" id="usr">
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
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Se encontraron
                <?php echo sizeof($data); ?> registros.
            </th>
        </tr>
    </table>
</div>

<script>
    var tabla = document.querySelector("#usr");
    var dataTable = new DataTable(tabla);
</script>