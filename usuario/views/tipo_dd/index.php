<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Tipos de disco duro</h1>
        <a href="tipo_dd.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
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
    </table>
</div>