<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Dependencias</h1>
        <a href="dependencia.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=dependencia" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=dependencia" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Dependencia</th>
                <th scope="col">Área</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $dependencia): ?>
                <tr>
                    <th scope="row">
                        <?php echo $dependencia['id_dependencia']; ?>
                    </th>
                    <td>
                        <?php echo $dependencia['dependencia']; ?>
                    </td>
                    <td>
                        <?php echo $dependencia['area']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="dependencia.php?action=edit&id=<?php echo $dependencia['id_dependencia'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="dependencia.php?action=delete&id=<?php echo $dependencia['id_dependencia'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>