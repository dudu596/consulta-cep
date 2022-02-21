<div class="row">
  <div class="col-3">
  </div>

  <div class="col-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Relatórios (endpoint)</h3>
      </div>
      <form action="" method="get">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="cep_minimo">CEP Mínimo</label>
                <input type="text" class="form-control" id="cep_minimo" name="cep_minimo" placeholder="Digite o CEP">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="cep_maximo">CEP Máximo</label>
                <input type="text" class="form-control" id="cep_maximo" name="cep_maximo" placeholder="Digite o CEP">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="uf">UF</label>
            <select id="uf" name="uf" class="form-control">
              <option value="">Não filtrar</option>
              <?php foreach ($estados as $estado) { ?>
                <option value=<?= $estado->uf ?>><?= $estado->estado ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <button type="submit" name="tipo" value="json" class="btn btn-primary float-right" id="consultar">Pesquisar</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>