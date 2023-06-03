<div class="card-body">
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <h1>Servidores</h1>
        <a href="servidor.php?action=new" class="btn btn-success">Nuevo</a>
        <a href="reportepdf.php?action=pu" class="btn btn-danger" target="_blank">Generar PDF</a>
        <a href="reportexlsx.php?action=pu" class="btn btn-warning" target="_blank">Generar Excel</a>
    </div>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Puerto</th>
                <th scope="col">IP</th>
                <th scope="col">URL</th>
                <th scope="col">Alias</th>
                <th scope="col">No. Procesadores</th>
                <th scope="col">Capacidad DD</th>
                <th scope="col">Capacidad RAM</th>
                <th scope="col">Observaciones DD</th>
                <th scope="col">Observaciones RAM</th>
                <th scope="col">Más detalles</th>
                <th scope="col">Procesador</th>
                <th scope="col">Tipo de servidor</th>
                <th scope="col">Tipo de DD</th>
                <th scope="col">SO</th>
                <th scope="col">Equipo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $srv): ?>
                <tr>
                    <th scope="row">
                        <?php echo $srv['id_servidor']; ?>
                    </th>
                    <td>
                        <?php echo $srv['puerto']; ?>
                    </td>
                    <td>
                        <?php echo $srv['ip']; ?>
                    </td>
                    <td>
                        <?php echo $srv['url']; ?>
                    </td>
                    <td>
                        <?php echo $srv['alias']; ?>
                    </td>
                    <td>
                        <?php echo $srv['cant_procesadores']; ?>
                    </td>
                    <td>
                        <?php echo $srv['cap_dd']; ?>
                    </td>
                    <td>
                        <?php echo $srv['cap_ram']; ?>
                    </td>
                    <td>
                        <?php echo $srv['obs_dd']; ?>
                    </td>
                    <td>
                        <?php echo $srv['obs_ram']; ?>
                    </td>
                    <td>
                        <?php echo $srv['mas_detalles']; ?>
                    </td>
                    <td>
                        <?php echo $srv['procesador']; ?>
                    </td>
                    <td>
                        <?php echo $srv['tipo']; ?>
                    </td>
                    <td>
                        <?php echo $srv['tipo']; ?>
                    </td>
                    <td>
                        <?php echo $srv['so']; ?>
                    </td>
                    <td>
                        <?php echo $srv['no_inv']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Menu Renglon">
                            <a class="btn btn-dark"
                                href="servidor.php?action=usuario&id=<?php echo $srv['id_servidor'] ?>">Usuarios</a>
                            <a class="btn btn-primary"
                                href="servidor.php?action=edit&id=<?php echo $srv['id_servidor'] ?>">Modificar</a>
                            <a class="btn btn-danger"
                                href="servidor.php?action=delete&id=<?php echo $srv['id_servidor'] ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>