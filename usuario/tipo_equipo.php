<?php
require_once(__DIR__ . "/controllers/tipo_equipo.php");
include_once('views/header.php');
include_once('views/menu.php');
$tipoEquipo->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $tipoEquipo->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tipoEquipo->new($data);
            if ($cantidad) {
                $tipoEquipo->flash('success', "Registro dado de alta con éxito");
                $data = $tipoEquipo->get();
                include('views/tipo_equipo/index.php');
            } else {
                $tipoEquipo->flash('danger', "Algo salió mal.");
                include('views/tipo_equipo/form.php');
            }
        } else {
            include('views/tipo_equipo/form.php');
        }
        break;
    case 'edit':
        $tipoEquipo->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tipo'];
            $cantidad = $tipoEquipo->edit($id, $data);
            if ($cantidad) {
                $tipoEquipo->flash('success', "Registro actualizado con éxito");
                $data = $tipoEquipo->get();
                include('views/tipo_equipo/index.php');
            } else {
                $tipoEquipo->flash('warning', "Algo falló o no hubo cambios");
                $data = $tipoEquipo->get();
                include('views/tipo_equipo/index.php');
            }
        } else {
            $data = $tipoEquipo->get($id);
            include('views/tipo_equipo/form.php');
        }
        break;
    case 'delete':
        $tipoEquipo->validatePrivilegio('Eliminar');
        $cantidad = $tipoEquipo->delete($id);
        if ($cantidad) {
            $tipoEquipo->flash('success', "Registro eliminado con éxito");
            $data = $tipoEquipo->get();
            include('views/tipo_equipo/index.php');
        } else {
            $tipoEquipo->flash('danger', "Algo fallo");
            $data = $tipoEquipo->get();
            include('views/tipo_equipo/index.php');
        }
        break;
    case 'get':
    default:
        $tipoEquipo->validatePrivilegio('Leer');
        $data = $tipoEquipo->get($id);
        include("views/tipo_equipo/index.php");
}
include_once('views/footer.php');
?>