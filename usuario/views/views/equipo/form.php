<div class="container-fluid">
    <h1>
        <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Equipo
    </h1>
    <div class="container-fluid">
        <form method="POST" action="equipo.php?action=<?php echo $action; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Número de serie</label>
                <input type="text" name="data[no_serie]" class="form-control" placeholder="No. Serie"
                    value="<?php echo isset($data[0]['no_serie']) ? $data[0]['no_serie'] : ''; ?>" required
                    minlength="1" maxlength="100" />
            </div>
            <div class="mb-3">
                <label class="form-label">Número de inventario</label>
                <input type="number" name="data[no_inv]" class="form-control" placeholder="No. Inventario"
                    value="<?php echo isset($data[0]['no_inv']) ? $data[0]['no_inv'] : ''; ?>" min="1" />
            </div>
            <div class="mb-3">
                <label class="form-label">Otras características</label>
                <input type="text" name="data[otras_caract]" class="form-control"
                    placeholder="Características adicionales"
                    value="<?php echo isset($data[0]['otras_caract']) ? $data[0]['otras_caract'] : ''; ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label">Seleccione una imagen: </label>
                <input type="file" name="imagen" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Referencias</label>
                <input type="text" name="data[referencia]" class="form-control" placeholder="Referencias"
                    value="<?php echo isset($data[0]['referencia']) ? $data[0]['referencia'] : ''; ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo del equipo</label>
                <select name="data[id_modelo]" class="form-control" required>
                    <?php
                    foreach ($datamodelo as $key => $modelo):
                        $selected = " ";
                        if ($modelo['id_modelo'] == $data[0]['id_modelo']):
                            $selected = " selected";
                        endif;
                        ?>
                        <option value="<?php echo $modelo['id_modelo']; ?>" <?php echo $selected; ?>> <?php echo $modelo['modelo']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Función del equipo</label>
                <select name="data[id_funcion]" class="form-control" required>
                    <?php
                    foreach ($datafuncion as $key => $funcion):
                        $selected = " ";
                        if ($funcion['id_funcion'] == $data[0]['id_funcion']):
                            $selected = " selected";
                        endif;
                        ?>
                        <option value="<?php echo $funcion['id_funcion']; ?>" <?php echo $selected; ?>> <?php echo $funcion['funcion']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Dependendencia donde se encuentra el equipo</label>
                <select name="data[id_dependencia]" class="form-control" required>
                    <?php
                    foreach ($datadependencia as $key => $dependencia):
                        $selected = " ";
                        if ($dependencia['id_dependencia'] == $data[0]['id_dependencia']):
                            $selected = " selected";
                        endif;
                        ?>
                        <option value="<?php echo $dependencia['id_dependencia']; ?>" <?php echo $selected; ?>> <?php echo $dependencia['dependencia']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <?php if ($action == 'edit'): ?>
                    <input type="hidden" name="data[id_equipo]"
                        value="<?php echo isset($data[0]['id_equipo']) ? $data[0]['id_equipo'] : ''; ?>">
                <?php endif; ?>
                <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>