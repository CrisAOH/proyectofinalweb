<?php
require_once(__DIR__ . "/controllers/tipo_servidor.php");
include_once('views/header.php');
include_once('views/menu.php');
$ts->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $ts->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $ts->new($data);
            if ($cantidad) {
                $ts->flash('success', "Registro dado de alta con éxito");
                $data = $ts->get();
                include('views/tipo_servidor/index.php');
            } else {
                $ts->flash('danger', "Algo salió mal.");
                include('views/tipo_servidor/form.php');
            }
        } else {
            include('views/tipo_servidor/form.php');
        }
        break;
    case 'edit':
        $ts->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tipo'];
            $cantidad = $ts->edit($id, $data);
            if ($cantidad) {
                $ts->flash('success', "Registro actualizado con éxito");
                $data = $ts->get();
                include('views/tipo_servidor/index.php');
            } else {
                $ts->flash('warning', "Algo falló o no hubo cambios");
                $data = $ts->get();
                include('views/tipo_servidor/index.php');
            }
        } else {
            $data = $ts->get($id);
            include('views/tipo_servidor/form.php');
        }
        break;
    case 'delete':
        $ts->validatePrivilegio('Eliminar');
        $cantidad = $ts->delete($id);
        if ($cantidad) {
            $ts->flash('success', "Registro eliminado con éxito");
            $data = $ts->get();
            include('views/tipo_servidor/index.php');
        } else {
            $ts->flash('danger', "Algo fallo");
            $data = $ts->get();
            include('views/tipo_servidor/index.php');
        }
        break;
    case 'get':
    default:
        $ts->validatePrivilegio('Leer');
        $data = $ts->get($id);
        include("views/tipo_servidor/index.php");
}
include_once('views/footer.php');
?>