<section id="hero" class="d-flex align-items-center">
    <div class="container-fluid" data-aos="fade-up">
        <div class="row justify-content-center">
            <div">
                <h1>Conozca la infraestructura de redes</h1>
                <h2>Estos son los equipos que tiene actualmente la Presidencia Municipal de Salamanca</h2>
            </div>
            <br>
            <table class="table table-responsive cell-border order-column" id="equipo">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">No. Serie</th>
                        <th scope="col">No.Inventario</th>
                        <th scope="col">Otras características</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Referencias</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Funcion</th>
                        <th scope="col">Dependencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $equipo): ?>
                        <tr>
                            <th scope="row">
                                <?php echo $equipo['id_equipo']; ?>
                            </th>
                            <td>
                                <?php echo $equipo['no_serie']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['no_inv']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['otras_caract']; ?>
                            </td>
                            <td>
                                <img style="width: 125px;" src="<?php echo ($equipo['imagen']); ?>">
                            </td>
                            <td>
                                <?php echo $equipo['referencia']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['modelo']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['funcion']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['dependencia']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Se encontraron
                        <?php echo sizeof($data); ?> registros.
                    </th>
                </tr>
            </table>
        </div>
    </div>
</section>
<script>
    var tabla = document.querySelector("#equipo");
    var dataTable = new DataTable(tabla);
</script>