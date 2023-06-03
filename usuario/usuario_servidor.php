<?php
require_once(__DIR__ . "/controllers/usuario_servidor.php");
include_once('views/header.php');
include_once('views/menu.php');
$us->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $us->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $us->new($data);
            if ($cantidad) {
                $us->flash('success', "Registro dado de alta con éxito");
                $data = $us->get();
                include('views/usuario_servidor/index.php');
            } else {
                $us->flash('danger', "Algo salió mal.");
                include('views/usuario_servidor/form.php');
            }
        } else {
            include('views/usuario_servidor/form.php');
        }
        break;
    case 'edit':
        $us->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_usr'];
            $cantidad = $us->edit($id, $data);
            if ($cantidad) {
                $us->flash('success', "Registro actualizado con éxito");
                $data = $us->get();
                include('views/usuario_servidor/index.php');
            } else {
                $us->flash('warning', "Algo falló o no hubo cambios");
                $data = $us->get();
                include('views/usuario_servidor/index.php');
            }
        } else {
            $data = $us->get($id);
            include('views/usuario_servidor/form.php');
        }
        break;
    case 'delete':
        $us->validatePrivilegio('Eliminar');
        $cantidad = $us->delete($id);
        if ($cantidad) {
            $us->flash('success', "Registro eliminado con éxito");
            $data = $us->get();
            include('views/usuario_servidor/index.php');
        } else {
            $us->flash('danger', "Algo fallo");
            $data = $us->get();
            include('views/usuario_servidor/index.php');
        }
        break;
    case 'get':
    default:
        $us->validatePrivilegio('Leer');
        $data = $us->get($id);
        include("views/usuario_servidor/index.php");
}
include_once('views/footer.php');
?>