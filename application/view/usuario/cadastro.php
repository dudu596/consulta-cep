<div class="row">
  <div class="col-3">
  </div>

  <div class="col-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><?= isset($usuario) ? "Editar Registro" : "Cadastrar" ?></h3>
        <?php if ($erro_email) { ?>
          <h6 class="card-title" style="color: red;"><?= $erro_email ?></h3>
        <?php } ?>
        <?php if ($erro_senha) { ?>
          <h6 class="card-title" style="color: red;"><?= $erro_senha ?></h3>
        <?php } ?>
      </div>
      <form action="" method="post">
        <div class="card-body">
          <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?= isset($usuario) ? $usuario->nome : "" ?>">
            </p>
          </div>
          <div class="form-group">
            <label>E-mail:</label>
            <input type="text" class="form-control" placeholder="E-mail" name="email" value="<?= isset($usuario) ? $usuario->email : "" ?>">
            <p class="err-msg">
              <?php if (isset($erro_email) && $erro_email !== true) {
                echo $erro_email;
              } ?>
            </p>
          </div>
          <?php if (isset($usuario)) { ?>
            <div class="form-group">
              <label>Senha Antiga:</label>
              <input type="password" class="form-control" placeholder="Senha Antiga" name="senha_antiga">
            </div>
          <?php } ?>
          <div class="form-group">
            <label><?= isset($usuario) ? "Nova " : "" ?>Senha:</label>
            <input type="password" class="form-control" placeholder="Deixe em banco para não alterar" name="senha">
          </div>
          <div class="form-group">
            <label>Confirmar Senha:</label>
            <input type="password" class="form-control" placeholder="Deixe em banco para não alterar" name="confirmar_senha">
            <p class="err-msg">
              <?php if (isset($erro_senha) && $erro_senha !== true) {
                echo $erro_senha;
              } ?>
            </p>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-primary float-right"><?= isset($usuario) ? "Salvar Alteração" : "Cadastrar" ?></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>