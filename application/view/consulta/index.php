<div class="row">
  <div class="col-3">
  </div>

  <div class="col-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Consulta de Cep (ViaCEP)</h3>
      </div>
        <div class="card-body">
          <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="Digite o CEP">
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" placeholder="Digite o CEP e clique em Pesquisar" disabled>
              </div>
            </div>
            <div class="col-8">
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" placeholder="Digite o CEP e clique em Pesquisar" disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" placeholder="Digite o CEP e clique em Pesquisar" disabled>
          </div>
          <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" id="complemento" placeholder="Digite o CEP e clique em Pesquisar" disabled>
          </div>
          <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" placeholder="Digite o CEP e clique em Pesquisar" disabled>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary float-right" id="consultar">Pesquisar</button>
            </div>
          </div>
    </div>
  </div>
</div>