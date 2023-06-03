<h1>Marcas de procesadores</h1>
<a href="marca_procesador.php?action=new" class="btn btn-success">Nuevo</a>
<div class="table-responsive container-fluid">
    <table class="table cell-border order-column" id="marca">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca de procesador</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $marcaProcesador): ?>
                <tr>
                    <th scope="row">
                        <?php echo $marcaProcesador['id_marca']; ?>
                    </th>
                    <td>
                        <?php echo $marcaProcesador['marca']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="marca_procesador.php?action=edit&id=<?php echo $marcaProcesador['id_marca'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="marca_procesador.php?action=delete&id=<?php echo $marcaProcesador['id_marca'] ?>">Eliminar</a>
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
    var tabla = document.querySelector("#marca");
    var dataTable = new DataTable(tabla);
</script>