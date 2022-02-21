<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>

</head>

<style>
    a {
        color: #f8f9fa !important;
        font-weight: bold;
    }

    .content-wrapper {
        background-color: #f4f6f9;
        height: 100%;
    }
</style>

<body>
    <div class="container-fluid bg-primary menu sticky-top">
        <div class="row">
            <div class="col-sm-8">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/consulta">Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/relatorio">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/usuario">Usuários</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <div class="nav-link" style="color: #f8f9fa; font-weight: bold"><?= $_SESSION["usuario"]["nome"] ?></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/usuario/editar/<?= $_SESSION["usuario"]["id"] ?>" title="Editar"><i class='fas fa-cog'></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>/logout" title="Logout"><i class='fas fa-sign-out-alt'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-wrapper pt-5" style="min-height: 798px;">
        <section class="content">
            <div class="container-fluid">