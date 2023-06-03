<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Tipo de servidor</h1>
        <a href="tipo_servidor.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tipo de servidor</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $ts): ?>
                <tr>
                    <th scope="row">
                        <?php echo $ts['id_tipo']; ?>
                    </th>
                    <td>
                        <?php echo $ts['tipo']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-primary"
                                href="tipo_servidor.php?action=edit&id=<?php echo $ts['id_tipo'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="tipo_servidor.php?action=delete&id=<?php echo $ts['id_tipo'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>