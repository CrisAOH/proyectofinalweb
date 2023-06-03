<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nueva ' ?>Marca
</h1>
<form method="POST" action="marca_equipo.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre de la Marca</label>
    <input type="text" name="data[marca]" class="form-control" placeholder="Marca"
      value="<?php echo isset($data[0]['marca']) ? $data[0]['marca'] : ''; ?>" required minlength="1" maxlength="100" />
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_marca]"
        value="<?php echo isset($data[0]['id_marca']) ? $data[0]['id_marca'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>