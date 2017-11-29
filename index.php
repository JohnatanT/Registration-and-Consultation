<?php require_once 'header.php' ?>
    
<!-- Login -->
<div class="row">
  <div class="bloco-login">

    <img src="img/icons8-fingerprint-scan-96.png" class="img-responsive">
    <h1>Faça seu Login</h1>
    <div class="formulario">
      <form name="login" action="" method="POST">
        <div class="col-md-12">
          <input type="email" name="email_login" required class="form-control" placeholder="E-mail" id="email_login">
        </div>
         <div class="col-md-12">
          <input type="pass" name="pass_login" required class="form-control" placeholder="Senha" id="senha_login">
        </div>
        <button type="button" id="submit_login" class="btn btn-green">Entrar</button>
        <button type="button" id="cad" class="btn btn-green" data-toggle="modal" data-target="#modalCad">Cadastrar</button>  
        <div class="check">
          <input type="checkbox" name="verificar" value="sim"> Manter-me conectado.
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Cadastro-->
      <div class="modal fade" id="modalCad" tabindex="-1" role="dialog" aria-labelledby="modalCadastro">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="modalCadastro">
                Cadastar Informações <i class="fa fa-database" aria-hidden="true"></i>
              </h4>
            </div>
            <div class="modal-body">
              <div class="formulario">
                <form name="cad" action="" method="POST">
                  <div class="col-md-12">
                    <input type="text" name="nome" class="form-control azul" placeholder="Nome" required id="nome_cad">
                  </div>
                  <div class="col-md-12">
                    <input type="email" name="email" required class="form-control azul" placeholder="E-mail" id="email_cad">
                  </div>
                  <div class="col-md-12">
                    <input type="password" name="password" class="form-control azul" placeholder="Senha" id="senha_cad" required>
                  </div>
                  <button type="button" id="cadastro_login">Cadastrar <i class="fa fa-check" aria-hidden="true"></i></button>
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
      <div class="alert alert-success alert-dismissable" id="alert_cad">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successo!</strong> Cadastro realizado com exito <i class="fa fa-sign-in" aria-hidden="true"></i>.
      </div>


<?php require_once 'footer.php' ?>

 