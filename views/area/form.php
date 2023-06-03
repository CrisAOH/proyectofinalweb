<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nueva ' ?>Área
</h1>
<form method="POST" action="area.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre del Área</label>
    <input type="text" name="data[area]" class="form-control" placeholder="Área"
      value="<?php echo isset($data[0]['area']) ? $data[0]['area'] : ''; ?>" required minlength="1" maxlength="100" />
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_area]"
        value="<?php echo isset($data[0]['id_area']) ? $data[0]['id_area'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>