<?php
require_once(__DIR__ . "/controllers/funcion.php");
require_once(__DIR__ . "/controllers/tipo_equipo.php");
include_once('views/header.php');
include_once('views/menu.php');
$funcion->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $funcion->validatePrivilegio('Insertar');
        $datatipos = $tipoEquipo->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $funcion->new($data);
            if ($cantidad) {
                $funcion->flash('success', "Registro dado de alta con éxito");
                $data = $funcion->get();
                include('views/funcion/index.php');
            } else {
                $dependencia->flash('danger', "Algo salió mal.");
                include('views/funcion/form.php');
            }
        } else {
            include('views/funcion/form.php');
        }
        break;
    case 'edit':
        $funcion->validatePrivilegio('Actualizar');
        $datatipos = $tipoEquipo->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_funcion'];
            $cantidad = $funcion->edit($id, $data);
            if ($cantidad) {
                $funcion->flash('success', "Registro actualizado con éxito");
                $data = $funcion->get();
                include('views/funcion/index.php');
            } else {
                $funcion->flash('warning', "Algo falló o no hubo cambios");
                $data = $funcion->get();
                include('views/funcion/index.php');
            }
        } else {
            $data = $funcion->get($id);
            include('views/funcion/form.php');
        }
        break;
    case 'delete':
        $funcion->validatePrivilegio('Eliminar');
        $cantidad = $funcion->delete($id);
        if ($cantidad) {
            $funcion->flash('success', "Registro eliminado con éxito");
            $data = $funcion->get();
            include('views/funcion/index.php');
        } else {
            $funcion->flash('danger', "Algo fallo");
            $data = $funcion->get();
            include('views/funcion/index.php');
        }
        break;
    case 'get':
    default:
        $funcion->validatePrivilegio('Leer');
        $data = $funcion->get($id);
        include("views/funcion/index.php");
}
include_once('views/footer.php');
?>