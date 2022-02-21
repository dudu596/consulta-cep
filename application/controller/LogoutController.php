<?php

class LogoutController
{

    function index()
    {
        unset($_SESSION["usuario"]);
        header('Location: ' . URL);
        exit;
    }
}
