<?php
/**
 * Enrutador departamento
 */
require_once(__DIR__ . "/controllers/pu.php");
require_once(__DIR__ . "/controllers/area.php");
include_once('views/header.php');
include_once('views/menu.php');
$pu->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_area = (isset($_GET['id_area'])) ? $_GET['id_area'] : null;
switch ($action) {
    case 'new':
        $pu->validatePrivilegio('Insertar');
        $dataarea = $area->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $pu->new($data);
            if ($cantidad) {
                $pu->flash('success', "Registro dado de alta con éxito");
                $data = $pu->get();
                include('views/pu/index.php');
            } else {
                $pu->flash('danger', "Algo salió mal.");
                include('views/pu/form.php');
            }
        } else {
            include('views/pu/form.php');
        }
        break;
    case 'edit':
        $pu->validatePrivilegio('Actualizar');
        $dataarea = $area->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_pu'];
            $cantidad = $pu->edit($id, $data);
            if ($cantidad) {
                $pu->flash('success', "Registro actualizado con éxito");
                $data = $pu->get();
                include('views/pu/index.php');
            } else {
                $pu->flash('warning', "Algo falló o no hubo cambios");
                $data = $pu->get();
                include('views/pu/index.php');
            }
        } else {
            $data = $pu->get($id);
            include('views/pu/form.php');
        }
        break;
    case 'delete':
        $pu->validatePrivilegio('Eliminar');
        $cantidad = $pu->delete($id);
        if ($cantidad) {
            $pu->flash('success', "Registro eliminado con éxito");
            $data = $pu->get();
            include('views/pu/index.php');
        } else {
            $pu->flash('danger', "Algo fallo");
            $data = $pu->get();
            include('views/pu/index.php');
        }
        break;
    case 'area':
        $pu->validatePrivilegio('Leer');
        $data = $pu->get($id);
        $data_area = $pu->getArea($id);
        include('views/pu/area.php');
        break;
    case 'deleteArea':
        $pu->validatePrivilegio('Eliminar');
        $cantidad = $pu->deleteArea($id, $id_area);
        if ($cantidad) {
            $pu->flash('success', "Registro eliminado con éxito");
            $data = $pu->get($id);
            $data_area = $pu->getArea($id);
            include('views/pu/area.php');
        } else {
            $pu->flash('danger', "Algo fallo");
            $data = $pu->get($id);
            $data_area = $pu->getArea($id);
            include('views/pu/area.php');
        }
        break;
    case 'newArea':
        $pu->validatePrivilegio('Insertar');
        $data = $pu->get($id);
        $dataarea = $area->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $cantidad = $pu->newArea($id, $data2);
            if ($cantidad) {
                $pu->flash('success', "Registro dado de alta con éxito");

            } else {
                $pu->flash('danger', "Algo falló.");
            }
            $data_area = $pu->getArea($id);
            include('views/pu/area.php');
        } else {
            include('views/pu/area_form.php');
        }
        break;
    case 'get':
    default:
    $pu->validatePrivilegio('Leer');
        $data = $pu->get($id);
        include("views/pu/index.php");
}
include_once('views/footer.php');
?>