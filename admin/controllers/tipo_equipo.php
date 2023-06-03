<?php
require_once(__DIR__ . '/sistema.php');
class tipoEquipo extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB2();
        if (is_null($id)) {
            $sql = "select * from tipo_equipo";
            $st = $this->db2->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from tipo_equipo where id_tipo = :id";
            $st = $this->db2->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new($data)
    {
        try {
            $this->connectDB();
            $this->db->beginTransaction();
            $sql = "insert into tipo_equipo (tipo) values (:tipo)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();

            $this->connectDB2();
            $sql2 = "insert into tipo_equipo (tipo) values (:tipo)";
            $st2 = $this->db2->prepare($sql2);
            $st2->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
            $st2->execute();
            $rc2 = $st2->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function edit($id, $data)
    {
        try {
            $this->connectDB();
            $this->db->beginTransaction();
            $sql = "update tipo_equipo set tipo = :tipo where id_tipo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();

            $this->connectDB2();
            $sql2 = "update tipo_equipo set tipo = :tipo where id_tipo = :id";
            $st2 = $this->db2->prepare($sql2);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);
            $st2->bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
            $st2->execute();
            $rc2 = $st2->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function delete($id)
    {
        try {
            $this->connectDB();
            $this->db->beginTransaction();
            $sql = "delete from tipo_equipo where id_tipo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();

            $this->connectDB2();
            $sql2 = "delete from tipo_equipo where id_tipo = :id";
            $st2 = $this->db2->prepare($sql2);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);
            $st2->execute();
            $rc2 = $st2->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }
}
$tipoEquipo = new tipoEquipo();
?>