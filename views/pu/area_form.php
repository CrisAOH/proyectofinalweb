<h1>
    Añadir área al punto de ubicación
</h1>
<form method="POST" action="pu.php?action=<?php echo $action; ?>&id=<?php echo ($data[0]['id_pu']) ?>">
    <div class="mb-3">

        <label class="form-label">Elige el área: </label>
        <select name="data[id_area]" class="form-control" required>
            <?php
            foreach ($dataarea as $key => $area):
                $selected = " ";
                if ($area['id_area'] == $area[0]['id_area']):
                    $selected = "selected";
                endif;
                ?>
                <option value="<?php echo $area['id_area']; ?>" <?php echo $selected; ?>> <?php echo $area['area']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <input type="hidden" name="data[id_pu]" value="<?php echo ($data[0]['id_pu']) ?>">
        <?php if ($action == 'editArea'): ?>
            <input type="hidden" name="data[id_area]"
                value="<?php echo isset($data_area[0]['id_area']) ? $data_area[0]['id_area'] : ''; ?>">
        <?php endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
</form>