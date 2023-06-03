<div class="container-fluid">
  <h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Modelo
  </h1>
  <form method="POST" action="modelo.php?action=<?php echo $action; ?>">
    <div class="mb-3">
      <label class="form-label">Nombre del Modelo</label>
      <input type="text" name="data[modelo]" class="form-control" placeholder="Modelo"
        value="<?php echo isset($data[0]['modelo']) ? $data[0]['modelo'] : ''; ?>" required minlength="1"
        maxlength="100" />
    </div>
    <div class="mb-3">
      <label class="form-label">Marca a la que pertenece el modelo</label>
      <select name="data[id_marca]" class="form-control" required>
        <?php
        foreach ($datamarcas as $key => $marca):
          $selected = " ";
          if ($marca['id_marca'] == $marca[0]['id_marca']):
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
        <input type="hidden" name="data[id_modelo]"
          value="<?php echo isset($data[0]['id_modelo']) ? $data[0]['id_modelo'] : ''; ?>">
      <?php endif; ?>
      <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
  </form>
</div>