<?php

require_once APP . "model/Usuario.php";
class UsuarioController
{
    function index()
    {
        $mensagem = "";
        if (isset($_GET["mensagem"]) && $_GET["mensagem"] == "success") {
            $mensagem = "Alteração salva no banco.";
        }
        $obj_usuario = new Usuario;
        $usuarios = $obj_usuario->getAll();
        require_once ROOT . "application/view/usuario/index.php";
    }

    function editar($id)
    {
        if ($_SESSION["usuario"]["logged_in"] && ($_SESSION["usuario"]["id"] == $id || $_SESSION["usuario"]["nivel"] <= 10)) {
            $obj_usuario = new Usuario;
            $usuario = $obj_usuario->getById($id);
            $erro_email = false;
            $erro_senha = false;

            if ($_POST) {
                extract($_POST);

                if (password_verify($senha_antiga, $usuario->senha)) {
                    $parametros["id"] = $id;
                    $parametros["nome"] = $nome;
                    $parametros["email"] = $email;
                    $erro_email = validaEmail($email);
                    if (!$erro_email) {
                        $erro_senha = validaSenha($email, $senha, $confirmar_senha);
                        if (!$obj_usuario->verificarEmail($email, $id)) {
                            if (!$erro_email) {
                                $parametros["senha"] = password_hash($senha, PASSWORD_DEFAULT);
                                $obj_usuario->update($parametros);
                            }
                        } else {
                            $erro_email = "E-mail em uso. Tente novamente.";
                        }
                    }
                } else {
                    $erro_senha = "Senha antiga incorreta";
                }
            }
            require_once ROOT . "application/view/usuario/cadastro.php";
        } else {
            header('Location: ' . URL . "/usuario");
            exit;
        }
    }

    function cadastro()
    {
        $erro_senha = false;
        $erro_email = false;
        if ($_SESSION["usuario"]["logged_in"] && $_SESSION["usuario"]["nivel"] <= 10) {
            if ($_POST) {
                extract($_POST);
                $obj_usuario = new Usuario;

                $parametros["nome"] = $nome;
                $parametros["email"] = $email;

                $erro_email = validaEmail($email);
                if (!$erro_email) {
                    $erro_senha = validaSenha(null, $senha, $confirmar_senha);
                    if (!$obj_usuario->verificarEmail($email)) {
                        if (!$erro_senha) {
                            $parametros["senha"] = password_hash($senha, PASSWORD_DEFAULT);
                            $obj_usuario->insert($parametros);
                            header("Location: " . URL . "/usuario?mensagem=success");
                            exit;
                        }
                    } else {
                        $erro_email = "E-mail em uso. Tente novamente.";
                    }
                }
            }

            require_once ROOT . "application/view/usuario/cadastro.php";
        } else {
            header('Location: ' . URL . "/usuario");
            exit;
        }
    }

    function deletar($id)
    {
        if ($_SESSION["usuario"]["logged_in"] && $_SESSION["usuario"]["id"] != $id && $_SESSION["usuario"]["nivel"] <= 10) {
            $obj_usuario = new Usuario;
            $usuario = $obj_usuario->delete($id);
        }
        header('Location: ' . URL . "/usuario");
        exit;
    }
}
