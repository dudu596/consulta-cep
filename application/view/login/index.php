<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">

      <div class="registration-form">
        <h4 class="text-center">Painel de administração</h4>
        <form action="<?= URL ?>/login" method="post">

          <div class="form-group">
            <label>E-mail:</label>
            <input type="text" class="form-control" placeholder="E-mail" name="email" value="<?= isset($email) ? $email : "" ?>">
            <p class="err-msg">
              <?php if ($erro_email !== true) {
                echo $erro_email;
              } ?>
            </p>
          </div>

          <div class="form-group">
            <label>Senha:</label>
            <input type="password" class="form-control" placeholder="Senha" name="senha">
            <p class="err-msg">
              <?php if ($erro_senha !== true) {
                echo $erro_senha;
              } ?>
            </p>
          </div>

          <button type="submit" class="btn btn-secondary">Login</button>
        </form>
      </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>