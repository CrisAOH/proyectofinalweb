<?php
require_once(__DIR__ . "/controllers/marca_procesador.php");
include_once('views/header.php');
include_once('views/menu.php');
$marcaProcesador->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $marcaProcesador->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $marcaProcesador->new($data);
            if ($cantidad) {
                $marcaProcesador->flash('success', "Registro dado de alta con éxito");
                $data = $marcaProcesador->get();
                include('views/marca_procesador/index.php');
            } else {
                $marcaProcesador->flash('danger', "Algo salió mal.");
                include('views/marca_procesador/form.php');
            }
        } else {
            include('views/marca_procesador/form.php');
        }
        break;
    case 'edit':
        $marcaProcesador->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_marca'];
            $cantidad = $marcaProcesador->edit($id, $data);
            if ($cantidad) {
                $marcaProcesador->flash('success', "Registro actualizado con éxito");
                $data = $marcaProcesador->get();
                include('views/marca_procesador/index.php');
            } else {
                $marcaProcesador->flash('warning', "Algo falló o no hubo cambios");
                $data = $marcaProcesador->get();
                include('views/marca_procesador/index.php');
            }
        } else {
            $data = $marcaProcesador->get($id);
            include('views/marca_procesador/form.php');
        }
        break;
    case 'delete':
        $marcaProcesador->validatePrivilegio('Eliminar');
        $cantidad = $marcaProcesador->delete($id);
        if ($cantidad) {
            $marcaProcesador->flash('success', "Registro eliminado con éxito");
            $data = $marcaProcesador->get();
            include('views/marca_procesador/index.php');
        } else {
            $marcaprocesador->flash('danger', "Algo fallo");
            $data = $marcaProcesador->get();
            include('views/marca_procesador/index.php');
        }
        break;
    case 'get':
    default:
        $marcaProcesador->validatePrivilegio('Leer');
        $data = $marcaProcesador->get($id);
        include("views/marca_procesador/index.php");
}
include_once('views/footer.php');
?>