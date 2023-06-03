<h1>Tipos de disco duro</h1>
<a href="tipo_dd.php?action=new" class="btn btn-success">Nuevo</a>
<div class="container-fluid">
    <table class="table table-responsive cell-border order-column" id="dd">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tipo de disco duro</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $tdd): ?>
                <tr>
                    <th scope="row">
                        <?php echo $tdd['id_tipo']; ?>
                    </th>
                    <td>
                        <?php echo $tdd['tipo']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="tipo_dd.php?action=edit&id=<?php echo $tdd['id_tipo'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="tipo_dd.php?action=delete&id=<?php echo $tdd['id_tipo'] ?>">Eliminar</a>
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
    var tabla = document.querySelector("#dd");
    var dataTable = new DataTable(tabla);
</script>