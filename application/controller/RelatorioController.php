<?php

require_once APP . "model/Relatorio.php";
class RelatorioController
{
    function index()
    {
        $obj_relatorio = new Relatorio;
        if (isset($_GET["tipo"]) && $_GET["tipo"] == "json") {
            unset($_GET["tipo"]);
            extract($_GET);
            $parametros = [];
            if (isset($cep_minimo) && !empty($cep_minimo)) {
                $parametros['cep_minimo'] = $cep_minimo;
            }
            if (isset($cep_maximo) && !empty($cep_maximo)) {
                $parametros['cep_maximo'] = $cep_maximo;
            }
            if (isset($uf) && !empty($uf)) {
                $parametros['uf'] = $uf;
            }
            echo json_encode($obj_relatorio->getRelatorioByFiltro($parametros));
            die;
        }
        $estados = $obj_relatorio->getAllEstado();
        require_once ROOT . "application/view/relatorio/index.php";
    }
}
