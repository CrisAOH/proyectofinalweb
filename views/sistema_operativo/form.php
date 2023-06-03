<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Sistema Operativo
</h1>
<form method="POST" action="sistema_operativo.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre del Sistema Operativo</label>
    <input type="text" name="data[so]" class="form-control" placeholder="Sistema Operativo"
      value="<?php echo isset($data[0]['so']) ? $data[0]['so'] : ''; ?>" required minlength="1" maxlength="100" />
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_so]"
        value="<?php echo isset($data[0]['id_so']) ? $data[0]['id_so'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>