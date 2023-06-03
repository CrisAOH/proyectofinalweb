<h1>Procesadores</h1>
<a href="procesador.php?action=new" class="btn btn-success">Nuevo</a>
<div class="table-responsive container-fluid">
    <table class="table cell-border order-column" id="procesador">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Procesador</th>
                <th scope="col">Marca</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $procesador): ?>
                <tr>
                    <th scope="row">
                        <?php echo $procesador['id_procesador']; ?>
                    </th>
                    <td>
                        <?php echo $procesador['procesador']; ?>
                    </td>
                    <td>
                        <?php echo $procesador['marca']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="procesador.php?action=edit&id=<?php echo $procesador['id_procesador'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="procesador.php?action=delete&id=<?php echo $procesador['id_procesador'] ?>">Eliminar</a>
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
    var tabla = document.querySelector("#procesador");
    var dataTable = new DataTable(tabla);
</script>