<?php
require_once(__DIR__.'/sistema.php');
class tipoEquipo extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from tipo_equipo";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from tipo_equipo where id_tipo = :id";
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
        try{
        $sql = "insert into tipo_equipo (tipo) values (:tipo)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        }catch(PDOException $Exception)
        {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->connectDB();
        $sql = "update tipo_equipo set tipo = :tipo where id_tipo = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->connectDB();
        $sql = "delete from tipo_equipo where id_tipo = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}
$tipoEquipo = new tipoEquipo();
?>