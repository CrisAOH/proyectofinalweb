<?php
require_once(__DIR__ . "../controllers/area.php");
include_once('views/header.php');
include_once('views/menu.php');
$area->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $area->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $area->new($data);
            if ($cantidad) {
                $area->flash('success', "Registro dado de alta con éxito");
                $data = $area->get();
                include('views/area/index.php');
            } else {
                $area->flash('danger', "Algo salió mal.");
                include('views/area/form.php');
            }
        } else {
            include('views/area/form.php');
        }
        break;
    case 'edit':
        $area->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_area'];
            $cantidad = $area->edit($id, $data);
            if ($cantidad) {
                $area->flash('success', "Registro actualizado con éxito");
                $data = $area->get();
                include('views/area/index.php');
            } else {
                $area->flash('warning', "Algo falló o no hubo cambios");
                $data = $area->get();
                include('views/area/index.php');
            }
        } else {
            $data = $area->get($id);
            include('views/area/form.php');
        }
        break;
    case 'delete':
        $area->validatePrivilegio('Eliminar');
        $cantidad = $area->delete($id);
        if ($cantidad) {
            $area->flash('success', "Registro eliminado con éxito");
            $data = $area->get();
            include('views/area/index.php');
        } else {
            $area->flash('danger', "Algo fallo");
            $data = $area->get();
            include('views/area/index.php');
        }
        break;
    case 'get':
    default:
        $area->validatePrivilegio('Leer');
        $data = $area->get($id);
        include("views/area/index.php");
}
include_once('views/footer.php');
?>