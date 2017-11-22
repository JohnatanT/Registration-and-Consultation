<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Cadastro</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <!-- Mensagem de Boas Vindas -->
      <div class="row">
        <div class="jumbotron">
          <h1>Bem vindo!</h1>
          <p>Caso deseje se cadastrar clique no botão logo abaixo para realizar seu cadastro. Se deseja apenas fazer uma consulta mais abaixo há um campo em que você pode fazer consultas.</p>
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Cadastrar <i class="fa fa-plus-square" aria-hidden="true"></i>
          </button>
        </div>
    </div>



    <!--Modal de Cadastro -->
    <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">
                Cadastar Informações <i class="fa fa-database" aria-hidden="true"></i>
              </h4>
            </div>
            <div class="modal-body">
              <div class="formulario">
                <form name="contato" method="POST" action="conexao.php" onSubmit="return valida();">
                  <input type="hidden" name="validacao">
                  <div class="col-md-12">
                    <input type="text" name="nome" class="form-control azul" placeholder="Nome" required="required">
                  </div>
                  <div class="col-md-12">
                    <input type="email" name="email" required="required" class="form-control azul" placeholder="E-mail">
                  </div>
                  <div class="col-md-12">
                    <input type="tel" name="telefone" class="form-control azul" placeholder="Telefone">
                  </div>
                  <button type="submit">Enviar</button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Campo de Busca -->
      <div class="row" id="campo_busca">
        <img src="img/icons8-search-50.png" class="img-responsive">
        <h2>Pesquisar Contato:</h2>
        <div id="Pesquisar">
          <h3>Infome o nome: </h3>
          <input type="text" name="txtnome" id="txtnome" placeholder="Pesquisar..." class="campo_pesquisa"> 
          <input type="button" id="botao" name="btnPesquisar" value="Pesquisar" class="botao_pesquisa" data-toggle="tooltip" data-placement="bottom" title="Pesquise o nome da Pessoa">
        </div>
      </div>
      <!-- Resultado da Pesquisa -->
      <div class="row">
        <div class="resultado">
          <h2>Resultado da Pesquisa:</h2>
          <div id="resultado">
            <table border="1" class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                </tr>
              </thead>
              <tbody id="tabela">
              </tbody>
            </table>
          </div>
          
        </div>
      </div>






    </div><!-- Container Fluid -->

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://use.fontawesome.com/f30dd6cc3d.js"></script>
  </body>
</html>