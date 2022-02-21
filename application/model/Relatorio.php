<?php
require_once APP . "model/Model.php";
class Relatorio extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela("consulta");
    }

    public function getAllEstado()
    {
        $sql = "SELECT * FROM uf";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getRelatorioByFiltro($array_parametros)
    {
        $sql_parametros = "";
        if (isset($array_parametros["cep_minimo"])) {
            $sql_parametros .= "AND cep >= :cep_minimo ";
        }
        if (isset($array_parametros["cep_maximo"])) {
            $sql_parametros .= "AND cep <= :cep_maximo ";
        }
        if (isset($array_parametros["uf"])) {
            $sql_parametros .= "AND uf = :uf ";
        }
        
        $sql = "SELECT * FROM {$this->tabela} WHERE TRUE {$sql_parametros}";
        $query = $this->db->prepare($sql);
        $query->execute($array_parametros);

        return $query->fetchAll();
    }
}
