<h1>Tipo de servidor</h1>
<a href="tipo_servidor.php?action=new" class="btn btn-success">Nuevo</a>
<div class="container-fluid">
    <table class="table table-responsive cell-border order-column" id="tipo">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tipo de servidor</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $ts): ?>
                <tr>
                    <th scope="row">
                        <?php echo $ts['id_tipo']; ?>
                    </th>
                    <td>
                        <?php echo $ts['tipo']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="tipo_servidor.php?action=edit&id=<?php echo $ts['id_tipo'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="tipo_servidor.php?action=delete&id=<?php echo $ts['id_tipo'] ?>">Eliminar</a>
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
    var tabla = document.querySelector("#tipo");
    var dataTable = new DataTable(tabla);
</script>