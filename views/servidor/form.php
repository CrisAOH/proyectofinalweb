<h1>
    <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Servidor
</h1>
<form method="POST" action="servidor.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label class="form-label">Puerto del servidor</label>
        <input type="text" name="data[puerto]" class="form-control" placeholder="Puerto"
            value="<?php echo isset($data[0]['puerto']) ? $data[0]['puerto'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">IP del servidor</label>
        <input type="text" name="data[ip]" class="form-control" placeholder="IP"
            value="<?php echo isset($data[0]['ip']) ? $data[0]['ip'] : ''; ?>" required minlength="1" maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">URL del servidor</label>
        <input type="text" name="data[url]" class="form-control" placeholder="URL"
            value="<?php echo isset($data[0]['url']) ? $data[0]['url'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Alias del servidor</label>
        <input type="text" name="data[alias]" class="form-control" placeholder="Alias"
            value="<?php echo isset($data[0]['alias']) ? $data[0]['alias'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Cantidad de procesadores del servidor</label>
        <input type="text" name="data[cant_procesadores]" class="form-control" placeholder="Cantidad de procesadores"
            value="<?php echo isset($data[0]['cant_procesadores']) ? $data[0]['cant_procesadores'] : ''; ?>" required
            minlength="1" maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Capacidad del disco duro del servidor</label>
        <input type="text" name="data[cap_dd]" class="form-control" placeholder="Capacidad del disco duro"
            value="<?php echo isset($data[0]['cap_dd']) ? $data[0]['cap_dd'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Capacidad de la RAM del servidor</label>
        <input type="text" name="data[cap_ram]" class="form-control" placeholder="Capacidad de la RAM"
            value="<?php echo isset($data[0]['cap_ram']) ? $data[0]['cap_ram'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Observaciones del disco duro</label>
        <input type="text" name="data[obs_dd]" class="form-control" placeholder="Observaciones"
            value="<?php echo isset($data[0]['obs_dd']) ? $data[0]['obs_dd'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Observaciones de la RAM</label>
        <input type="text" name="data[obs_ram]" class="form-control" placeholder="Observaciones"
            value="<?php echo isset($data[0]['obs_ram']) ? $data[0]['obs_ram'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Otros detalles del servidor</label>
        <input type="text" name="data[mas_detalles]" class="form-control" placeholder="Otros detalles del servidor"
            value="<?php echo isset($data[0]['mas_detalles']) ? $data[0]['mas_detalles'] : ''; ?>" required minlength="1"
            maxlength="100" />
    </div>
    <div class="mb-3">
        <label class="form-label">Procesador del servidor</label>
        <select name="data[id_procesador]" class="form-control" required>
            <?php
            foreach ($dataprocesador as $key => $procesador):
                $selected = " ";
                if ($procesador['id_procesador'] == $data[0]['id_procesador']):
                    $selected = " selected";
                endif;
                ?>
                <option value="<?php echo $procesador['id_procesador']; ?>" <?php echo $selected; ?>> <?php echo $procesador['procesador']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo de servidor</label>
        <select name="data[id_tiposrv]" class="form-control" required>
            <?php
            foreach ($datatiposrv as $key => $tiposrv):
                $selected = " ";
                if ($tiposrv['id_tipo'] == $data[0]['id_tipo']):
                    $selected = " selected";
                endif;
                ?>
                <option value="<?php echo $tiposrv['id_tipo']; ?>" <?php echo $selected; ?>> <?php echo $tiposrv['tipo']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo de disco duro</label>
        <select name="data[id_tipodd]" class="form-control" required>
            <?php
            foreach ($datatipodd as $key => $tipodd):
                $selected = " ";
                if ($tipodd['id_tipo'] == $data[0]['id_tipo']):
                    $selected = " selected";
                endif;
                ?>
                <option value="<?php echo $tipodd['id_tipo']; ?>" <?php echo $selected; ?>> <?php echo $tipodd['tipo']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Sistema Operativo del servidor</label>
        <select name="data[id_so]" class="form-control" required>
            <?php
            foreach ($dataso as $key => $so):
                $selected = " ";
                if ($so['id_so'] == $data[0]['id_so']):
                    $selected = " selected";
                endif;
                ?>
                <option value="<?php echo $so['id_so']; ?>" <?php echo $selected; ?>> <?php echo $so['so']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">¿A qué equipo corresponde el servidor?</label>
        <select name="data[id_equipo]" class="form-control" required>
            <?php
            foreach ($dataequipo as $key => $equipo):
                $selected = " ";
                if ($equipo['id_equipo'] == $data[0]['id_equipo']):
                    $selected = " selected";
                endif;
                ?>
                <option value="<?php echo $equipo['id_equipo']; ?>" <?php echo $selected; ?>> <?php echo $equipo['no_inv']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <?php if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_servidor]"
                value="<?php echo isset($data[0]['id_servidor']) ? $data[0]['id_servidor'] : ''; ?>">
        <?php endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
</form>