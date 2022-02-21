<?php
require_once APP . "model/Model.php";
class Consulta extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela("consulta");
    }
}
