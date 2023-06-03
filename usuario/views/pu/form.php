<div class="container-fluid">
  <h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Punto de Ubicación
  </h1>
  <form method="POST" action="pu.php?action=<?php echo $action; ?>">
    <div class="mb-3">
      <label class="form-label">Nombre del Punto de Ubicación</label>
      <input type="text" name="data[pu]" class="form-control" placeholder="Punto de Ubicación"
        value="<?php echo isset($data[0]['pu']) ? $data[0]['pu'] : ''; ?>" required minlength="1" maxlength="100" />
    </div>
    <div class="mb-3">
      <?php if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_pu]" value="<?php echo isset($data[0]['id_pu']) ? $data[0]['id_pu'] : ''; ?>">
      <?php endif; ?>
      <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
  </form>
</div>