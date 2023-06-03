<h1>Marcas de los equipos</h1>
<a href="marca_equipo.php?action=new" class="btn btn-success">Nuevo</a>
<a href="reportepdf.php?action=marcaeq" class="btn btn-danger" target="_blank">Generar PDF</a>
<a href="reportexlsx.php?action=marcaeq" class="btn btn-warning" target="_blank">Generar Excel</a>

<div class="container-fluid">
    <table class="table table-responsive cell-border order-column" id="marca">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $marcaEquipo): ?>
                <tr>
                    <th scope="row">
                        <?php echo $marcaEquipo['id_marca']; ?>
                    </th>
                    <td>
                        <?php echo $marcaEquipo['marca']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="marca_equipo.php?action=edit&id=<?php echo $marcaEquipo['id_marca'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="marca_equipo.php?action=delete&id=<?php echo $marcaEquipo['id_marca'] ?>">Eliminar</a>
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