<?php

if (isset($_POST)) {

    extract($_POST);

    $parametros["cep"] = $cep;
    $parametros["logradouro"] = $logradouro;
    $parametros["complemento"] = $complemento;
    $parametros["bairro"] = $bairro;
    $parametros["localidade"] = $cidade;
    $parametros["uf"] = $uf;

    $obj_consulta = new Consulta;
    $obj_consulta->insert($parametros);
} 
