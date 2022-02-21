<?php

require_once APP . "core/config.php";
require_once APP . "core/util.php";
require_once APP . "core/Connection.php";

class Application
{

    public function __construct()
    {
        if (isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])) {
            $array['email'] = $_SERVER["PHP_AUTH_USER"];
            $array['senha'] = $_SERVER["PHP_AUTH_PW"];
            require_once APP . "model/Usuario.php";
            login($array);
        }
        $titulo = "Consulta de CEP";
        // Verifica se o usuário ja está logado
        if (isset($_SESSION["usuario"]["logged_in"]) && $_SESSION["usuario"]["logged_in"] === true) {
            $nome_controller = "Home";
            $nome_metodo = "index";
            $parametros = [];

            if (isset($_GET["url"]) && !empty($_GET["url"])) {
                $url = explode("/", trim($_GET["url"], "/"));
                $nome_controller = ($url[0] ? ucfirst($url[0]) : $nome_controller);

                if ($nome_controller == "Login") {
                    header('Location: ' . URL);
                    exit;
                }

                if (isset($url[1])) {
                    $nome_metodo = strtolower($url[1]);
                    unset($url[0]);
                    unset($url[1]);
                    $parametros = array_values($url);
                }
            }
            exibeController($titulo, $nome_controller, $nome_metodo, $parametros);
        } else {
            // Caso não esteja logado entra na tela de login
            $nome_controller = "Login";
            $nome_metodo = "index";
            $parametros = [];
            exibeController($titulo, $nome_controller, $nome_metodo, $parametros);
        }
    }
}
