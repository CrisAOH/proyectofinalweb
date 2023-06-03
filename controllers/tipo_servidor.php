<?php
require_once(__DIR__.'/sistema.php');
class tipoServ extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from tipo_servidor";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from tipo_servidor where id_tipo = :id";
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
        $sql = "insert into tipo_servidor (tipo) values (:tipo)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->connectDB();
        $sql = "update tipo_servidor set tipo = :tipo where id_tipo = :id";
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
        $sql = "delete from tipo_servidor where id_tipo = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}
$ts = new tipoServ();
?>