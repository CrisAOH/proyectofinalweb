<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Modelos</h1>
        <a href="modelo.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=modeloeq" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=modeloeq" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $modelo): ?>
                <tr>
                    <th scope="row">
                        <?php echo $modelo['id_modelo']; ?>
                    </th>
                    <td>
                        <?php echo $modelo['marca']; ?>
                    </td>
                    <td>
                        <?php echo $modelo['modelo']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="modelo.php?action=edit&id=<?php echo $modelo['id_modelo'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="modelo.php?action=delete&id=<?php echo $modelo['id_modelo'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>