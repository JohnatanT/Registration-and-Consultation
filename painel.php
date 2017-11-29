 <?php require_once 'header.php' ?>
 
      <div class="row">
        <div class="jumbotron">
          <h1>Bem vindo <i class="fa fa-user-circle-o" aria-hidden="true"></i></h1>
          <p><i class="fa fa-address-card-o" aria-hidden="true"></i> Caso deseje se cadastrar clique no botão logo abaixo para realizar seu cadastro.<br>
          <i class="fa fa-hourglass-end" aria-hidden="true"></i> Se deseja apenas fazer uma consulta mais abaixo há um campo em que você pode faze-lo.</p>
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Cadastrar <i class="fa fa-cloud-upload" aria-hidden="true"></i> 
          </button>
        </div>
    </div>

    <!--Modal de Cadastro -->
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
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successo!</strong> Cadastro realizado com exito <i class="fa fa-sign-in" aria-hidden="true"></i>.
      </div>
      <!-- Alerta de Sucesso ao Excluir o Cadastro -->
      <div class="alert alert-danger alert-dismissable fade in" id="alert_ex">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successo!</strong> Cadastro excluido com exito <i class="fa fa-trash" aria-hidden="true"></i>.
      </div>
      <!-- Alerta de Sucesso no Update -->
      <div class="alert alert-success alert-dismissable fade in" id="alert_up">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successo!</strong> Update realizado com exito <i class="fa fa-sign-in" aria-hidden="true"></i>.
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

  <?php require_once 'footer.php' ?>