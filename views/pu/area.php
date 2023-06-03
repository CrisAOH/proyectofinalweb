<h1 class="text-center">Áreas del punto de ubicación:
    <?php echo $data[0]['pu']; ?>
</h1>
<div class="container-fluid">
    <div class='row'>
        <div class="col-3">
            <p><a href="pu.php?action=newArea&id=<?php echo $data[0]['id_pu']; ?>" class="btn btn-success"
                    role="button">Añadir área al punto de ubicación </a>
            </p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <table class="table table-responsive cell-border order-column" id="areapu">
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
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Se encontraron
                <?php echo sizeof($data_area); ?> registros.
            </th>
        </tr>
    </table>
</div>

<script>
    var tabla = document.querySelector("#areapu");
    var dataTable = new DataTable(tabla);
</script>