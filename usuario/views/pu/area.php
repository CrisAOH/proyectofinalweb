<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1 class="text-center">Áreas del punto de ubicación:
            <?php echo $data[0]['pu']; ?>
        </h1>
        <p><a href="pu.php?action=newArea&id=<?php echo $data[0]['id_pu']; ?>" class="btn btn-success"
                role="button">Añadir área al punto de ubicación </a>
        </p>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">ID</th>
                <th scope="col-md-2" class="col-md-8">Área</th>
                <th scope="col-md-2" class="col-md-8">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_area as $key => $area): ?>
                <tr>
                    <td scope="row">
                        <?php echo $area['id_area']; ?>
                    </td>
                    <td scope="row">
                        <?php echo $area['area']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-danger"
                                href="pu.php?action=deleteArea&id=<?php echo $data['0']['id_pu'] ?>&id_area=<?php echo $area['id_area']; ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>