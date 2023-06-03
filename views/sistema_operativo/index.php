<h1>Sistemas Operativos</h1>
<a href="sistema_operativo.php?action=new" class="btn btn-success">Nuevo</a>
<div class="container-fluid table-responsive">
    <table class="table cell-border order-column" id="so">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Sistema Operativo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $so): ?>
                <tr>
                    <th scope="row">
                        <?php echo $so['id_so']; ?>
                    </th>
                    <td>
                        <?php echo $so['so']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="sistema_operativo.php?action=edit&id=<?php echo $so['id_so'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="sistema_operativo.php?action=delete&id=<?php echo $so['id_so'] ?>">Eliminar</a>
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
    var tabla = document.querySelector("#so");
    var dataTable = new DataTable(tabla);
</script>