<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Áreas</h1>
        <a href="area.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=area" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=area" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Área</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $area): ?>
                <tr>
                    <th scope="row">
                        <?php echo $area['id_area']; ?>
                    </th>
                    <td>
                        <?php echo $area['area']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="area.php?action=edit&id=<?php echo $area['id_area'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="area.php?action=delete&id=<?php echo $area['id_area'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>