endpoint: URL/consulta-cep/relatorio

parametros: 
tipo=json  -  obrigatório para retorno de valores
cep_minimo=88200000  -  cep com 8 numeros ou campo desconsiderado  
cep_maximo=88215000  -  cep com 8 numeros ou campo desconsiderado  
&uf=SC  -  unidade federal, vazio retorna todos

login por HTTP BASIC AUTH ou login interno do site
Usuário: admin@admin.com
Senha: 123

Banco de dados na pasta raíz: consulta-cep.sql
