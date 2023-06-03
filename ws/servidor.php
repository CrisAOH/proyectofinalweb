<?php
header('Content-Type: application/json; charset=utf-8');
include_once(__DIR__.'/../admin/controllers/sistema.php');
include_once(__DIR__.'/../admin/controllers/servidor.php');
$action = $_SERVER['REQUEST_METHOD'];
$id=isset($_GET['id'])?$_GET['id']:null;
switch($action):
    case 'DELETE':
        $data['mensaje']='No existe el servidor.';
        if(!is_null($id))
        {
            $contador=$srv->delete($id);
            if($contador==1)
                $data['mensaje']='Se eliminó el servidor.';
        }
        break;
    case 'POST':
        $data=array();
        $data = $_POST['data'];
        if(is_null($id))
        {
            $cantidad = $srv->new($data);
            if($cantidad!=0)
                $data['mensaje']='Se insertó un nuevo servidor.';
                //$data[]
            else
                $data['mensaje']='Ocurrió un error.';
        }
        else
        {
            $cantidad=$srv->edit($id, $data);
            if($cantidad!=0)
                $data['mensaje']='Se modificó el servidor.';
                //$data[]
            else
                $data['mensaje']='Ocurrió un error.';
        }
        break;
    case 'GET':
    default:
        if(is_null($id))
            $data=$srv->get();    
        else
            $data=$srv->get($id);
endswitch;
$data=json_encode($data);
echo($data);
?>