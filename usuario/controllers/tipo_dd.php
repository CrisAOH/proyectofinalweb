<?php
require_once(__DIR__ . '/sistema.php');
class tipoDD extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from tipo_dd";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from tipo_dd where id_tipo = :id";
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
            $sql = "insert into tipo_dd (tipo) values (:tipo)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
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
            $sql = "update tipo_dd set tipo = :tipo where id_tipo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
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
            $sql = "delete from tipo_dd where id_tipo = :id";
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
$tdd = new tipoDD();
?>