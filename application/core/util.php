<?php

function echod($parametros, $die = true)
{
    echo "<pre>";
    var_dump($parametros);
    echo "</pre>";

    if ($die) {
        exit;
    }
}

function exibeController($titulo, $nome_controller, $nome_metodo, $parametros)
{
    $nome_tela = $nome_controller;
    $exibe_header_footer = true;
    $header = APP . "view/" . strtolower($nome_controller) . "/header.php";
    $footer = APP . "view/" . strtolower($nome_controller) . "/footer.php";
    $titulo = "[" . $nome_controller . "] - " . $titulo;
    $nome_controller .= "Controller";

    $controller_caminho = APP . "controller/" . $nome_controller . ".php";
    if (file_exists($controller_caminho)) {
        require_once $controller_caminho;
        $controller = new $nome_controller;
    } else {
        $titulo = "[Erro 404] - " . $titulo;
        require_once APP . "controller/ErrorController.php";
        $controller = new ErrorController;
        $nome_metodo = "index";
        $parametros = [];
    }

    if ($nome_controller == "AjaxController") {
        $exibe_header_footer = false;
    }
    if ($nome_controller == "RelatorioController" && isset($_GET["tipo"]) && $_GET["tipo"] == "json") {
        $exibe_header_footer = false;
    }

    if ($exibe_header_footer) {
        if (!file_exists($header)) {
            $header = APP . "view/__template/header.php";
        }
        require_once $header;
    }
    call_user_func_array([$controller, $nome_metodo], $parametros);
    if ($exibe_header_footer) {
        if (!file_exists($footer)) {
            $footer = APP . "view/__template/footer.php";
        }
        require_once $footer;
    }
}

function validaEmail($email)
{
    $email_valido = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    if (empty($email)) {
        $erro_email = "E-mail Obrigatório";
    } else if (!preg_match($email_valido, $email)) {
        $erro_email = "Formato de E-mail Inválido";
    } else {
        $erro_email = false;
    }
    return $erro_email;
}

function validaSenha($email, $senha, $confirmar_senha = null)
{
    if (!isset($confirmar_senha)) {
        $confirmar_senha = $senha;
    }

    if (empty($senha)) {
        $erro_senha = "Senha Obrigatória";
    } else if ($senha == $confirmar_senha) {
        if (isset($email)) {
            $obj_usuario = new Usuario();
            $usuario = $obj_usuario->getByEmail($email);
            if (isset($usuario->senha)) {
                if (password_verify($senha, $usuario->senha)) {
                    $erro_senha = false;
                } else {
                    $erro_senha = "Senha Incorreta";
                }
            } else {
                $erro_senha = "Senha Incorreta";
            }
        } else {
            $erro_senha = false;
        }
    } else {
        $erro_senha = "Senhas Divergentes";
    }

    return $erro_senha;
}

function login($array)
{
    unset($_POST);
    extract($array);

    $erro_email = validaEmail($email);
    if (!$erro_email) {
        $erro_senha = validaSenha($email, $senha);
    }
    $obj_usuario = new Usuario();
    $usuario = $obj_usuario->getByEmail($email);

    if (!$erro_email && !$erro_senha) {
        $_SESSION["usuario"]["logged_in"] = true;
        $_SESSION["usuario"]["nome"] = $usuario->nome;
        $_SESSION["usuario"]["email"] = $usuario->email;
        $_SESSION["usuario"]["id"] = $usuario->id;
        $_SESSION["usuario"]["nivel"] = $usuario->nivel;
        return;
    }
    $_POST['erro_email'] = $erro_email;
    $_POST['erro_senha'] = $erro_senha;
    return $_POST;
}
