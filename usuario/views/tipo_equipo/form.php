<div class="container-fluid">
  <h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Tipo de Equipo
  </h1>
  <form method="POST" action="tipo_equipo.php?action=<?php echo $action; ?>">
    <div class="mb-3">
      <label class="form-label">Nombre del tipo de equipo</label>
      <input type="text" name="data[tipo]" class="form-control" placeholder="Tipo de equipo"
        value="<?php echo isset($data[0]['tipo']) ? $data[0]['tipo'] : ''; ?>" required minlength="1" maxlength="100" />
    </div>
    <div class="mb-3">
      <?php if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_tipo]"
          value="<?php echo isset($data[0]['id_tipo']) ? $data[0]['id_tipo'] : ''; ?>">
      <?php endif; ?>
      <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
  </form>
</div>