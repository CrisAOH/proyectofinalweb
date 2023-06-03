<div class="container-fluid">
  <h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Usuario
  </h1>
  <form method="POST" action="usuario_servidor.php?action=<?php echo $action; ?>">
    <div class="mb-3">
      <label class="form-label">Nombre del usuario</label>
      <input type="text" name="data[usuario]" class="form-control" placeholder="Usuario"
        value="<?php echo isset($data[0]['usuario']) ? $data[0]['usuario'] : ''; ?>" required minlength="1"
        maxlength="100" />
    </div>
    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="text" name="data[contrasena]" class="form-control" placeholder="Contraseña"
        value="<?php echo isset($data[0]['contrasena']) ? $data[0]['contrasena'] : ''; ?>" required minlength="1"
        maxlength="100" />
    </div>
    <div class="mb-3">
      <?php if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_usr]"
          value="<?php echo isset($data[0]['id_usr']) ? $data[0]['id_usr'] : ''; ?>">
      <?php endif; ?>
      <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
  </form>
</div>