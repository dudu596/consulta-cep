<?php

require_once APP . "model/Usuario.php";
class LoginController
{
    function index()
    {
        $erro_email = "";
        $erro_senha = "";

        if ($_POST) {
            extract(login($_POST));
        }
        if (isset($_SESSION["usuario"]["logged_in"])) {
            header('Location: ' . URL);
            exit;
        }

        require_once ROOT . "application/view/login/index.php";
    }
}
