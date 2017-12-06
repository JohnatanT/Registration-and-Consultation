 <?php 
  session_start();
  require_once 'header.php';

  //Caso esteja logado
  if(isset($_SESSION["nome_usuario"])){

 ?>
    <div class="row" id="painel">
      <div class="jumbotron">
        <h1>Bem vindo <?php echo $_SESSION["nome_usuario"]; ?> <i class="fa fa-user-circle-o" aria-hidden="true"></i></h1>
        <p><i class="fa fa-address-card-o" aria-hidden="true"></i> Caso deseje fazer o cadastro de algum usuário clique no botão logo abaixo para faze-lo.<br>
        <i class="fa fa-hourglass-end" aria-hidden="true"></i> Se deseja apenas fazer uma consulta mais abaixo há um campo em que você pode faze-lo.</p>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Cadastrar <i class="fa fa-cloud-upload" aria-hidden="true"></i> 
        </button>
      </div>
    </div>

    <!-- Modal Cadastro-->
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
                <form name="contato" action="" method="POST">
                  <div class="col-md-12">
                    <input type="text" name="nome" class="form-control azul" placeholder="Nome" required id="nome">
                  </div>
                  <div class="col-md-12">
                    <input type="email" name="email" required class="form-control azul" placeholder="E-mail" id="email">
                  </div>
                  <div class="col-md-12">
                    <input type="tel" name="telefone" class="form-control azul" placeholder="Telefone" id="telefone" required>
                  </div>
                  <button type="button" id="submit">Enviar <i class="fa fa-check" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>

       <!-- Modal Update-->
      <div class="modal fade" id="myModalUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">
                Atualizar Informações <i class="fa fa-database" aria-hidden="true"></i>
              </h4>
            </div>
            <div class="modal-body">
              <div class="formulario">
                <form name="contato" action="" method="POST">
                  <div class="col-md-12">
                    <input type="text" name="nome" class="form-control azul" placeholder="Nome" required="required" id="nomeUp">
                  </div>
                  <div class="col-md-12">
                    <input type="email" name="email" required="required" class="form-control azul" placeholder="E-mail" id="emailUp">
                  </div>
                  <div class="col-md-12">
                    <input type="tel" name="telefone" class="form-control azul" placeholder="Telefone" id="telefoneUp" required="required">
                  </div>
                  <button type="button" id="submitUp">Enviar <i class="fa fa-check" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Alerta de Sucesso no Cadastro -->
      <div class="alert alert-success alert-dismissable fade in" id="alert">
        <strong>Successo!</strong> Cadastro realizado com exito <i class="fa fa-sign-in" aria-hidden="true"></i>.
      </div>
      <!-- Alerta de Sucesso ao Excluir o Cadastro -->
      <div class="alert alert-danger alert-dismissable fade in" id="alert_ex">
        <strong>Successo!</strong> Cadastro excluido com exito <i class="fa fa-trash" aria-hidden="true"></i>.
      </div>
      <!-- Alerta de Sucesso no Update -->
      <div class="alert alert-success alert-dismissable fade in" id="alert_up">
        <strong>Successo!</strong> Update realizado com exito <i class="fa fa-sign-in" aria-hidden="true"></i>.
      </div>

      <!-- Campo de Busca -->
      <div class="row" id="campo_busca">
        <img src="img/icons8-search-50.png" class="img-responsive">
        <h2>Pesquisar Contato:</h2>
        <div id="Pesquisar">
          <h3>Busque pelo nome, email ou telefone </h3>
          <input type="text" name="txtnome" id="txtnome" placeholder="Pesquisar..." class="campo_pesquisa"> 
          <input type="button" id="botao" name="btnPesquisar" value="Pesquisar" class="botao_pesquisa" data-toggle="tooltip" data-placement="bottom" title="Caso queira ver todos, apenas clique aqui com o campo em branco">
        </div>
      </div>
      <!-- Resultado da Pesquisa -->
      <div class="row">
        <div class="container">
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
      </div>

  <!-- Modal de Excluir-->
  <div class="modal fade" id="confirm" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirmar <i class="fa fa-trash" aria-hidden="true"> <i class="fa fa-question-circle-o" aria-hidden="true"></i></i></h4>
        </div>
        <div class="modal-body">
          <p>Deseja Realmente deletar essa linha?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar <i class="fa fa-times" aria-hidden="true"></i></button>
          <button type="button" class="btn btn-primary" id="conf">Excluir <i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout -->
  <div class="logout">
    <a href="logout.php">Sair <i class="fa fa-power-off" aria-hidden="true"></i></a>
    <a href="admin.php">Estatisticas <i class="fa fa-bar-chart" aria-hidden="true"></i></a>
    <a href="#" id="_maps" data-toggle="modal" data-target="#myModalMap">Mapa <i class="fa fa-globe" aria-hidden="true"></i></a>
    <?php  
      $cargo = $_SESSION["cargo"];
      if($cargo == "Administrador"){
    ?>
    <a href="#" id="cargo" data-toggle="modal" data-target="#myModalCargo">Cargos <i class="fa fa-id-card-o" aria-hidden="true"></i></a>
    <?php 
      }
    ?>
  </div>

  <!-- Modal de Cargo-->
      <div class="modal fade" id="myModalCargo" tabindex="-1" role="dialog" aria-labelledby="myCargo">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myCargo">
                Cadastro de Cargos
              </h4>
            </div>
            <div class="modal-body">
              <div class="formulario">
                <form name="contato" action="" method="POST">
                  <div class="col-md-12">
                    <input type="text" name="cargoNome" class="form-control azul" placeholder="Nome" required="required" id="cargoNome">
                  </div>
                 <button type="button" id="submitCargo">Cadastrar <i class="fa fa-check" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal de Endereço-->
      <div class="modal fade" id="myModalMap" tabindex="-1" role="dialog" aria-labelledby="myMap">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myMap">
                Cadastro de Coordenadas
              </h4>
            </div>
            <div class="modal-body">
              <div class="formulario">
                <form name="contato" action="" method="POST">
                  <div class="col-md-12">
                    <input type="text" name="Digite seu Endereco" class="form-control azul" placeholder="Endereco" required="required" id="endereco">
                  </div>
                 <button type="button" id="submitMap">Cadastrar Localização  <i class="fa fa-check" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>

<!-- Mapa -->
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>

      <div class="row">
        <div class="info-mapa">
          <h2>Mapa</h2>
          <img src="img/maps.png" class="img-responsive">
        </div>
        
        <div id="map"></div>
      </div>

      <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk9l6FzKbzLAI4pnB8o6_gxEIlUh-mDFs&callback=initMap">
    </script>
<!-- /map -->

  <?php 
    }else{
      header("Location:index.php"); //Se não estiver logado redireciona para a página de Login
    }

    require_once 'footer.php' 
  ?>