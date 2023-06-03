<?php
require_once(__DIR__ . '/sistema.php');

class Servidor extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from servidor s 
                    join procesador p on s.id_procesador = p.id_procesador
                    join tipo_dd td on s.id_tipodd = td.id_tipo
                    join equipo e on s.id_equipo = e.id_equipo
                    join tipo_servidor ts on s.id_tiposrv = ts.id_tipo
                    join sistema_operativo so on s.id_so = so.id_so";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from servidor s 
                join procesador p on s.id_procesador = p.id_procesador
                join tipo_dd td on s.id_tipodd = td.id_tipo
                join equipo e on s.id_equipo = e.id_equipo
                join tipo_servidor ts on s.id_tiposrv = ts.id_tipo
                join sistema_operativo so on s.id_so = so.id_so
                where id_servidor = :id";
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
            $sql = "insert into servidor (puerto, ip, url, alias, cant_procesadores, cap_dd, cap_ram, obs_dd, obs_ram, mas_detalles, id_procesador, id_tiposrv, id_tipodd, id_so, id_equipo) 
                values (:puerto, :ip, :url, :alias, :cant_procesadores, :cap_dd, :cap_ram, :obs_dd, :obs_ram, :mas_detalles, :id_procesador, :id_tiposrv, :id_tipodd, :id_so, :id_equipo)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":puerto", $data['puerto'], PDO::PARAM_STR);
            $st->bindParam(":ip", $data['ip'], PDO::PARAM_STR);
            $st->bindParam(":url", $data['url'], PDO::PARAM_STR);
            $st->bindParam(":alias", $data['alias'], PDO::PARAM_STR);
            $st->bindParam(":cant_procesadores", $data['cant_procesadores'], PDO::PARAM_STR);
            $st->bindParam(":cap_dd", $data['cap_dd'], PDO::PARAM_STR);
            $st->bindParam(":cap_ram", $data['cap_ram'], PDO::PARAM_STR);
            $st->bindParam(":obs_dd", $data['obs_dd'], PDO::PARAM_STR);
            $st->bindParam(":obs_ram", $data['obs_ram'], PDO::PARAM_STR);
            $st->bindParam(":mas_detalles", $data['mas_detalles'], PDO::PARAM_STR);
            $st->bindParam(":id_procesador", $data['id_procesador'], PDO::PARAM_INT);
            $st->bindParam(":id_tiposrv", $data['id_tiposrv'], PDO::PARAM_INT);
            $st->bindParam(":id_tipodd", $data['id_tipodd'], PDO::PARAM_INT);
            $st->bindParam(":id_so", $data['id_so'], PDO::PARAM_INT);
            $st->bindParam(":id_equipo", $data['id_equipo'], PDO::PARAM_INT);
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
            $sql = "update servidor set puerto = :puerto, ip = :ip, url = :url,
                alias = :alias, cant_procesadores = :cant_procesadores,
                cap_dd = :cap_dd, cap_ram = :cap_ram, obs_dd = :obs_dd,
                obs_ram = :obs_ram, mas_detalles = :mas_detalles,
                id_procesador = :id_procesador, id_tiposrv = :id_tiposrv,
                id_tipodd = :id_tipodd, id_so = :id_so, id_equipo = :id_equipo
                where id_servidor = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":puerto", $data['puerto'], PDO::PARAM_STR);
            $st->bindParam(":ip", $data['ip'], PDO::PARAM_STR);
            $st->bindParam(":url", $data['url'], PDO::PARAM_STR);
            $st->bindParam(":alias", $data['alias'], PDO::PARAM_STR);
            $st->bindParam(":cant_procesadores", $data['cant_procesadores'], PDO::PARAM_STR);
            $st->bindParam(":cap_dd", $data['cap_dd'], PDO::PARAM_STR);
            $st->bindParam(":cap_ram", $data['cap_ram'], PDO::PARAM_STR);
            $st->bindParam(":obs_dd", $data['obs_dd'], PDO::PARAM_STR);
            $st->bindParam(":obs_ram", $data['obs_ram'], PDO::PARAM_STR);
            $st->bindParam(":mas_detalles", $data['mas_detalles'], PDO::PARAM_STR);
            $st->bindParam(":id_procesador", $data['id_procesador'], PDO::PARAM_INT);
            $st->bindParam(":id_tiposrv", $data['id_tiposrv'], PDO::PARAM_INT);
            $st->bindParam(":id_tipodd", $data['id_tipodd'], PDO::PARAM_INT);
            $st->bindParam(":id_so", $data['id_so'], PDO::PARAM_INT);
            $st->bindParam(":id_equipo", $data['id_equipo'], PDO::PARAM_INT);
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
            $sql = "delete from usr_srv where id_servidor = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $sql2 = "delete from servidor where id_servidor = :id";
            $st2 = $this->db->prepare($sql2);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $st2->execute();
            $rc = $st2->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function getUsuario($id)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select us.* from usuario_servidor us join usr_srv usrv on us.id_usr = usrv.id_usuario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select us.* from usuario_servidor us join usr_srv usrv on us.id_usr = usrv.id_usuario where usrv.id_servidor = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function deleteUsuario($id, $id2)
    {
        $this->connectDB();
        $sql = "delete from usr_srv where id_usuario = :id and id_servidor=:id2";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id2", $id2, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function newUsuario($id, $data)
    {
        $this->connectDB();
        $rc = 0;
        try {
            $sql = "insert into usr_srv (id_usuario,id_servidor) values (:id_usuario, :id_servidor)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_usuario", $data['id_usr'], PDO::PARAM_INT);
            $st->bindParam(":id_servidor", $data['id_servidor'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
        } catch (PDOException $e) {
            $this->flash('warning', "El usuario ya existe en este servidor.");
        }
        return $rc;
    }
}
$srv = new Servidor();
?>