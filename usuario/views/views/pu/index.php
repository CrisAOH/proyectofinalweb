<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Puntos de ubicación</h1>
        <a href="pu.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Punto de Ubicación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $pu): ?>
                <tr>
                    <th scope="row">
                        <?php echo $pu['id_pu']; ?>
                    </th>
                    <td>
                        <?php echo $pu['pu']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-dark" href="pu.php?action=area&id=<?php echo $pu['id_pu'] ?>">Áreas</a>
                            <a class="btn btn-primary" href="pu.php?action=edit&id=<?php echo $pu['id_pu'] ?>">Modificar</a>
                            <a class="btn btn-danger" href="pu.php?action=delete&id=<?php echo $pu['id_pu'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>