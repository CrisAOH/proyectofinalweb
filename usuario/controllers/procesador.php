<?php
require_once(__DIR__ . '/sistema.php');
class Procesador extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from procesador p join marca_procesador mc 
            on p.id_marca = mc.id_marca";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from procesador p join marca_procesador mc 
            on p.id_marca = mc.id_marca where id_procesador = :id";
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
            $sql = "insert into procesador (procesador, velocidad, id_marca)
                    values (:procesador, :velocidad, :id_marca)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":procesador", $data['procesador'], PDO::PARAM_STR);
            $st->bindParam(":velocidad", $data['velocidad'], PDO::PARAM_STR);
            $st->bindParam(":id_marca", $data['id_marca'], PDO::PARAM_INT);
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
            $sql = "update procesador set procesador = :procesador, velocidad = :velocidad,
                    id_marca = :id_marca where id_procesador = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":procesador", $data['procesador'], PDO::PARAM_STR);
            $st->bindParam(":velocidad", $data['velocidad'], PDO::PARAM_STR);
            $st->bindParam(":id_marca", $data['id_marca'], PDO::PARAM_STR);
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
            $sql = "delete from procesador where id_procesador = :id";
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
$procesador = new Procesador();
?>