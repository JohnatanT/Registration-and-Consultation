<?php 
  session_start();
  require_once 'header.php';
  //Caso esteja logado e seja Administrador
  if(isset($_SESSION["nome_usuario"]) && isset($_SESSION["senha_user"])){
  	$user = $_SESSION["nome_usuario"];
  	$senha = $_SESSION["senha_user"];
  	
  	$senha_comp = sha1("admin");
  	if($user == "admin" && $senha == $senha_comp){
 ?>
 	<!-- Conteúdo -->

 	<!-- Topo -->
 	<div class="row" id="admin_topo">
 		<div class="topo">
 			<h2>Bem Vindo a página de Administrador <span class="glyphicon glyphicon-globe" aria-hidden="true"></span></h2>
 			<p>Lembre-se: Com grandes poderes vem grandes responsabilidades.</p>
 		</div>
 	</div>

 	<!-- Cadastro de Estatisticas -->
 	<div class="row" id="estat">
 		<div class="info">
 			<img src="https://png.icons8.com/storage/color/100/000000">
 			<h2>Estatistica de Desempenho</h2>
 			<h6>Página para criação de estatisticcas</h6>
 			<p>O Nivel de Desempenho é medido de acordo com a quantidade de pessoas e à avaliação.</p>
 		</div>
 		<div class="col-md-6">
	 		<div id="form_est">
		 		 <form name="est" action="" method="POST">
		 		 	<div class="bloco">
		 		 		<h2>Aumento de Desempenho</h2>
		            	<div class="col-md-12">
		            		<input type="number" name="numero_aumento" id="numero_aumento" min="1" max="100" required="required">
		            	</div>
		 		 	</div>
		 		 	<div class="bloco">
		 		 		<h2>Mesmo Desempenho</h2>
		            	<div class="col-md-12">
		            		<input type="number" name="numero_neutro" id="numero_neutro" min="1" max="100" required="required">
		            	</div>
		 		 	</div>
		 		 	<div class="bloco">
		 		 		<h2>Desempenhos Baixo</h2>
		            	<div class="col-md-12">
		            		<input type="number" name="numero_baixo" id="numero_baixo" min="1" max="100" required="required">
		            	</div>
		 		 	</div>
		 		 	<div class="bloco">
		 		 		 <h2>Desempenhos Criticos</h2>
		            	<div class="col-md-12">
		            		<input type="number" name="numero_critico" id="numero_critico" min="1" max="100" required="required">
		            	</div>
		 		 	</div>
		        	<button type="button" id="submitEst">Enviar</button>
		        </form>
	        </div><!-- form_est -->
        </div>
 		<div class="col-md-6">
 			<!-- Infomações -->
			<div id="progre">
				<h2>Aumento de Desempenho</h2>
				<div class="progress">
				  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_SESSION["por_aumento"]; ?>%">
				    <span class="sr-only">40% Complete (success)</span>
				  </div>
				</div>
				<h2>Mesmo Desempenho</h2>
				<div class="progress">
				  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_SESSION["por_neutro"]; ?>%">
				    <span class="sr-only">20% Complete</span>
				  </div>
				</div>
				<h2>Desempenhos Baixo</h2>
				<div class="progress">
				  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_SESSION["por_baixo"]; ?>%">
				    <span class="sr-only">60% Complete (warning)</span>
				  </div>
				</div>
				<h2>Desempenhos Criticos</h2>
				<div class="progress">
					<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_SESSION["por_critico"]; ?>%">
				    <span class="sr-only">10% Complete (danger)</span>
					</div>
				</div>
			</div>
 		</div>
 	</div>



	<!-- Logout -->
  <div class="logout">
    <a href="logout.php">Sair <i class="fa fa-power-off" aria-hidden="true"></i></a>
    <a href="painel.php">Painel <i class="fa fa-address-card-o" aria-hidden="true"></i></a>
  </div>

	

 <?php
  	}else{
  		 header("Location:painel.php"); //Se não estiver logado como Admin redireciona para a página de Painel
  	}
	}else{
      header("Location:index.php"); //Se não estiver logado redireciona para a página de Painel
    }
    require_once 'footer.php'; 
?>