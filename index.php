<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Cadastro&Consulta</title>
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

      <!-- Gif de carregamento -->
      <div id="preload"></div>

      <div class="row">
        <div class="jumbotron">
          <h1>Bem vindo! <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></h1>
          <p><i class="fa fa-address-card-o" aria-hidden="true"></i> Caso deseje se cadastrar clique no botão logo abaixo para realizar seu cadastro.<br>
          <i class="fa fa-hourglass-end" aria-hidden="true"></i> Se deseja apenas fazer uma consulta mais abaixo há um campo em que você pode faze-lo.</p>
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
                <form name="contato" method="POST">
                  <input type="hidden" name="validacao">
                  <div class="col-md-12">
                    <input type="text" name="nome" class="form-control azul" placeholder="Nome" required="required" id="nome">
                  </div>
                  <div class="col-md-12">
                    <input type="email" name="email" required="required" class="form-control azul" placeholder="E-mail" id="email">
                  </div>
                  <div class="col-md-12">
                    <input type="tel" name="telefone" class="form-control azul" placeholder="Telefone" id="telefone">
                  </div>
                  <button type="button" id="submit">Enviar</button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="alert alert-success alert-dismissable" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successo!</strong> Cadastro realizado com sucesso.
      </div>

      <!-- Campo de Busca -->
      <div class="row" id="campo_busca">
        <img src="img/icons8-search-50.png" class="img-responsive">
        <h2>Pesquisar Contato:</h2>
        <div id="Pesquisar">
          <h3>Infome o nome, email ou telefone </h3>
          <input type="text" name="txtnome" id="txtnome" placeholder="Pesquisar..." class="campo_pesquisa"> 
          <input type="button" id="botao" name="btnPesquisar" value="Pesquisar" class="botao_pesquisa" data-toggle="tooltip" data-placement="bottom" title="Caso queira ver todos, apenas clique aqui com o campo em branco">
        </div>
      </div>
      <!-- Resultado da Pesquisa -->
      <div class="row">
        <div class="resultado">
          <h2>Resultado da Pesquisa: <i class="fa fa-lightbulb-o" aria-hidden="true"></i></h2>
          <div id="resultado">
            <table border="1" class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Excluir Dados</th>
                  <th>Update dos Dados</th>
                </tr>
              </thead>
              <tbody id="tabela">
              </tbody>
            </table>
          </div>
        </div><!-- resultado -->
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