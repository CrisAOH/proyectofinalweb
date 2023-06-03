<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Sistemas Operativos</h1>
        <a href="sistema_operativo.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
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
    </table>
</div>