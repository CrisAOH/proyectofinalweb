<div class="container-fluid">
    <h1>
        Añadir usuario al servidor
    </h1>
    <form method="POST" action="servidor.php?action=<?php echo $action; ?>&id=<?php echo ($data[0]['id_servidor']) ?>">
        <div class="mb-3">

            <label class="form-label">Elige el usuario: </label>
            <select name="data[id_usr]" class="form-control" required>
                <?php
                foreach ($datausr as $key => $usr):
                    $selected = " ";
                    if ($usr['id_usr'] == $usr[0]['id_usr']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $usr['id_usr']; ?>" <?php echo $selected; ?>> <?php echo $usr['usuario']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <input type="hidden" name="data[id_servidor]" value="<?php echo ($data[0]['id_servidor']) ?>">
            <?php if ($action == 'editUsuario'): ?>
                <input type="hidden" name="data[id_usr]"
                    value="<?php echo isset($data_usr[0]['id_usr']) ? $data_usr[0]['id_usr'] : ''; ?>">
            <?php endif; ?>
            <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
        </div>
    </form>
</div>