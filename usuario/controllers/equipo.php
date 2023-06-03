<?php
require_once(__DIR__ . '/sistema.php');
class Equipo extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from equipo e 
            join funcion f on e.id_funcion = f.id_funcion
            join modelo m on e.id_modelo = m.id_modelo
            join dependencia d on e.id_dependencia = d.id_dependencia";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from equipo e 
            join funcion f on e.id_funcion = f.id_funcion
            join modelo m on e.id_modelo = m.id_modelo
            join dependencia d on e.id_dependencia = d.id_dependencia 
            where id_equipo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new($data)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $nombrearchivo = str_replace(" ", "_", $data['no_serie']);
            $nombrearchivo = substr($nombrearchivo, 0, 20);
            $sql = "insert into equipo (no_serie, no_inv, otras_caract, imagen, referencia, id_modelo, id_funcion, id_dependencia) 
        values (:no_serie, :no_inv, :otras_caract, :imagen, :referencia, :id_modelo, :id_funcion, :id_dependencia)";
            $sesubio = $this->uploadfile("imagen", "../upload/equipos/", $nombrearchivo);
            $default = "../upload/equipos/default.png";
            $st = $this->db->prepare($sql);
            $st->bindParam(":no_serie", $data['no_serie'], PDO::PARAM_STR);
            $st->bindParam(":no_inv", $data['no_inv'], PDO::PARAM_INT);
            $st->bindParam(":otras_caract", $data['otras_caract'], PDO::PARAM_STR);
            $st->bindParam(":referencia", $data['referencia'], PDO::PARAM_STR);
            $st->bindParam(":id_modelo", $data['id_modelo'], PDO::PARAM_INT);
            $st->bindParam(":id_funcion", $data['id_funcion'], PDO::PARAM_STR);
            $st->bindParam(":id_dependencia", $data['id_dependencia'], PDO::PARAM_STR);
            if ($sesubio) {
                $st->bindParam(":imagen", $sesubio, PDO::PARAM_STR);
            } else {
                $st->bindParam(":imagen", $default, PDO::PARAM_STR);
            }
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $nombrearchivo = str_replace(" ", "_", $data['no_serie']);
            $nombrearchivo = substr($nombrearchivo, 0, 20);
            $sql = "update equipo set no_serie = :no_serie, no_inv = :no_inv,
        otras_caract = :otras_caract, imagen = :imagen, referencia = :referencia, 
        id_modelo = :id_modelo, id_funcion = :id_funcion, id_dependencia = :id_dependencia 
        where id_equipo = :id";
            $sesubio = $this->uploadfile("imagen", "upload/equipos/", $nombrearchivo);
            $default = "upload/equipos/default.png";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_STR);
            $st->bindParam(":no_serie", $data['no_serie'], PDO::PARAM_STR);
            $st->bindParam(":no_inv", $data['no_inv'], PDO::PARAM_INT);
            $st->bindParam(":otras_caract", $data['otras_caract'], PDO::PARAM_STR);
            $st->bindParam(":referencia", $data['referencia'], PDO::PARAM_STR);
            $st->bindParam(":id_modelo", $data['id_modelo'], PDO::PARAM_INT);
            $st->bindParam(":id_funcion", $data['id_funcion'], PDO::PARAM_STR);
            $st->bindParam(":id_dependencia", $data['id_dependencia'], PDO::PARAM_STR);
            if ($sesubio) {
                $st->bindParam(":imagen", $sesubio, PDO::PARAM_STR);
            } else {
                $st->bindParam(":imagen", $default, PDO::PARAM_STR);
            }
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function delete($id)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $sql = "delete from equipo where id_equipo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }
}
$equipo = new Equipo();
?>