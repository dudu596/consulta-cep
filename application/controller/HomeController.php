<?php

class HomeController
{
    function index()
    {
        header('Location: ' . URL . "/consulta");
        exit;
    }
}
