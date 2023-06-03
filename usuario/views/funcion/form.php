<div class="container-fluid">
  <h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nueva ' ?>Función
  </h1>
  <form method="POST" action="funcion.php?action=<?php echo $action; ?>">
    <div class="mb-3">
      <label class="form-label">Nombre de la Función</label>
      <input type="text" name="data[funcion]" class="form-control" placeholder="Funcion"
        value="<?php echo isset($data[0]['funcion']) ? $data[0]['funcion'] : ''; ?>" required minlength="1"
        maxlength="100" />
    </div>
    <div class="mb-3">
      <label class="form-label">Tipo de equipo al que pertenece la función</label>
      <select name="data[id_tipo]" class="form-control" required>
        <?php
        foreach ($datatipos as $key => $tipoEquipo):
          $selected = " ";
          if ($tipoEquipo['id_tipo'] == $data[0]['id_tipo']):
            $selected = " selected";
          endif;
          ?>
          <option value="<?php echo $tipoEquipo['id_tipo']; ?>" <?php echo $selected; ?>> <?php echo $tipoEquipo['tipo']; ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <?php if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_funcion]"
          value="<?php echo isset($data[0]['id_funcion']) ? $data[0]['id_funcion'] : ''; ?>">
      <?php endif; ?>
      <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
  </form>
</div>