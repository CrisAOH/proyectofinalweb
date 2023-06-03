<h1>Funciones de los equipos</h1>
<a href="funcion.php?action=new" class="btn btn-success">Nuevo</a>
<div class="container-fluid">
    <table class="table table-responsive cell-border order-column" id="funcion">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Función</th>
                <th scope="col">Tipo de equipo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $funcion): ?>
                <tr>
                    <th scope="row">
                        <?php echo $funcion['id_funcion']; ?>
                    </th>
                    <td>
                        <?php echo $funcion['funcion']; ?>
                    </td>
                    <td>
                        <?php echo $funcion['tipo']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="funcion.php?action=edit&id=<?php echo $funcion['id_funcion'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="funcion.php?action=delete&id=<?php echo $funcion['id_funcion'] ?>">Eliminar</a>
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
    var tabla = document.querySelector("#funcion");
    var dataTable = new DataTable(tabla);
</script>