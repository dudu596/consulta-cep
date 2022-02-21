<?php
require_once APP . "model/Model.php";

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela("usuario");
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tabela} where ativo = 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function verificarEmail($email, $id = null)
    {
        $array_parametros['email'] = $email;
        $sql = "SELECT * FROM {$this->tabela} WHERE email = :email AND ativo = 1";
        if (isset($id)) {
            $array_parametros['id'] = $id;
            $sql .= " AND id <> :id";
        }

        $query = $this->db->prepare($sql);
        $query->execute($array_parametros);
        return $query->fetch();
    }

    public function getByEmail($email)
    {
        $array_parametros['email'] = $email;
        $sql = "SELECT * FROM {$this->tabela} WHERE email = :email AND ativo = 1";

        $query = $this->db->prepare($sql);
        $query->execute($array_parametros);

        return $query->fetch();
    }
    
}
