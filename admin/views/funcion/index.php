<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Funciones de los equipos</h1>
        <a href="funcion.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=dependencia" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=dependencia" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
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
    </table>
</div>