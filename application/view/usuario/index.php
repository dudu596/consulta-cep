<div class="row">
  <div class="col-3">
  </div>

  <div class="col-6">
    <div class="card card-primary">
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="card-title">Usuários Cadastrados</h3>
            <?php if ($mensagem) { ?>
              <h6 class="card-title" style="color: green;"><?= $mensagem ?></h3>
              <?php } ?>
          </div>
          <div class="col-4">
            <?php if ($_SESSION["usuario"]["logged_in"] && $_SESSION["usuario"]["nivel"] <= 10) { ?>
              <a href="<?= URL ?>/usuario/cadastro" class="btn btn-success float-right" id="cadastro">Novo Cadastro</a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th style="width:24%">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $usuario) { ?>
              <tr>
                <td class="align-middle"><?= $usuario->nome ?></td>
                <td class="align-middle"><?= $usuario->email ?></td>
                <td class="align-middle">
                  <?php if ($usuario->id == $_SESSION["usuario"]["id"]) { ?>
                    <a style="width:98%; padding-left: 1%; padding-right: 1%" href="<?= URL ?>/usuario/editar/<?= $usuario->id ?>" class="btn-sm btn-secondary float-left text-center" id="editar">Editar</a>
                  <?php } elseif ($_SESSION["usuario"]["nivel"] <= 10) { ?>
                    <a style="width:48%; padding-left: 1%; padding-right: 1%" href="<?= URL ?>/usuario/editar/<?= $usuario->id ?>" class="btn-sm btn-secondary float-left text-center" id="editar">Editar</a>
                    <a style="width:48%; padding-left: 1%; padding-right: 1%" href="<?= URL ?>/usuario/deletar/<?= $usuario->id ?>" class="btn-sm btn-danger float-right text-center" id="deletar">Deletar</a>
                  <?php } else { ?>
                    Sem ações disponíveis
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>