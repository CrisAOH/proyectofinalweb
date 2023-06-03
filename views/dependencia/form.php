<h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nueva ' ?>Dependencia
</h1>
<form method="POST" action="dependencia.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label class="form-label">Nombre de la Dependencia</label>
        <input type="text" name="data[dependencia]" class="form-control" placeholder="Dependencia"
            value="<?php echo isset($data[0]['dependencia']) ? $data[0]['dependencia'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
    <label class="form-label">Área a la que pertenece la dependencia</label>
    <select name="data[id_area]" class="form-control" required>
      <?php
      foreach ($dataareas as $key => $area):
        $selected = " ";
        if ($area['id_area'] == $data[0]['id_area']):
          $selected = " selected";
        endif;
        ?>
        <option value="<?php echo $area['id_area']; ?>" <?php echo $selected; ?>> <?php echo $area['area']; ?> </option>
      <?php endforeach; ?>
    </select>
  </div>
    <div class="mb-3">
        <?php if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_dependencia]"
                value="<?php echo isset($data[0]['id_dependencia']) ? $data[0]['id_dependencia'] : ''; ?>">
        <?php endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
</form>