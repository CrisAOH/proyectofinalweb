<div class="container-fluid">
  <h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Procesador
  </h1>
  <form method="POST" action="procesador.php?action=<?php echo $action; ?>">
    <div class="mb-3">
      <label class="form-label">Nombre del procesador</label>
      <input type="text" name="data[procesador]" class="form-control" placeholder="Procesador"
        value="<?php echo isset($data[0]['procesador']) ? $data[0]['procesador'] : ''; ?>" required minlength="1"
        maxlength="100" />
    </div>
    <div class="mb-3">
      <label class="form-label">Velocidad del procesador</label>
      <input type="text" name="data[velocidad]" class="form-control" placeholder="Velocidad"
        value="<?php echo isset($data[0]['velocidad']) ? $data[0]['velocidad'] : ''; ?>" required minlength="1"
        maxlength="100" />
    </div>
    <div class="mb-3">
      <label class="form-label">Marca del procesador</label>
      <select name="data[id_marca]" class="form-control" required>
        <?php
        foreach ($datamarcas as $key => $marca):
          $selected = " ";
          if ($marca['id_marca'] == $data[0]['id_marca']):
            $selected = " selected";
          endif;
          ?>
          <option value="<?php echo $marca['id_marca']; ?>" <?php echo $selected; ?>> <?php echo $marca['marca']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <?php if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_procesador]"
          value="<?php echo isset($data[0]['id_procesador']) ? $data[0]['id_procesador'] : ''; ?>">
      <?php endif; ?>
      <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
  </form>
</div>