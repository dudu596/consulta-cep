<?php

class AjaxController
{

    public function cep()
    {
        require_once APP . "model/Consulta.php";
        require_once APP . "ajax/Cep.php";
    }
}
