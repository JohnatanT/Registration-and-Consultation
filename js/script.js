//Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 //Gif de carregamento 
$(document).ready(function(){
  setTimeout('$("#preload").fadeOut(100)', 1500);
});

var valorUp = null;
//Cadastro de dados
$("#submit").click(function(){
  //Recebendo valores
  var nome = document.getElementById('nome').value;
  var email = document.getElementById('email').value;
  var telefone = document.getElementById('telefone').value;
  enviar(nome,email,telefone)
});
//Função que envia os dados 
function enviar(_nome,_email,_telefone){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'enviar.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'nome': _nome,'email': _email,'telefone': _telefone},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {// resposta do php com sucesso
        $('.modal').modal('hide');//Esconde a Modal
        //Aparece o Alert
        $('#alert').css("display", "block");
        $('#alert').css("z-index", "9999999");
        setTimeout('$("#alert").fadeOut(100)', 4000)//Alert Some depois de um tempo
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}
//Consulta de dados
$("#botao").click(function(){ // no click do botao que abre a modal faça
	var textoDigitado = document.getElementById('txtnome').value;
            busca(textoDigitado)
     });
//Busca de dados
function busca(nome){
  $('#tabela').empty(); //Limpando a tabela sempre que pesquisar
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'busca.php',//Arquivo que irá buscar
      dataType: 'json',
      data:'acao='+nome,//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {
         // resposta do php
         // colocando o conteudo 
        for(var i=0;data.length>i;i++){
          //Adicionando registros retornados na tabela
          $('#tabela').append('<tr data-id="'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].nome+'</td><td>'+data[i].email+'</td><td>'+data[i].telefone+'</td><td><button type="button" data-toggle="modal" data-target="#confirm" class="btn btn-danger excluir" value="'+data[i].id+'">Excluir <i class="fa fa-times" aria-hidden="true"></i></button></td><td><button type="button" class="btn btn-success editar" data-toggle="modal" data-target="#myModalUp" value="'+data[i].id+'">Editar <i class="fa fa-pencil" aria-hidden="true"></i></button></td></tr>');
        }
        //Excluir a tabela
        $(".excluir").click(function(){ 
          var valor = $(this).val();
          $("#conf").click(function(){//Confirmar no Modal
            $('#tabela tr[data-id=' + valor + ']').remove();//Excluindo linha da tabela HTML
            excluir(valor);//Passando o Id da linha para a função Excluir
          });
        }); 

        //Editar tabela
        $(".editar").click(function(){ 
          valorUp = $(this).val();//Recupera o ID
        }); 
        $("#submitUp").click(function(){
            //Recebendo valores
            var nomeUp = document.getElementById('nomeUp').value;
            var emailUp = document.getElementById('emailUp').value;
            var telefoneUp = document.getElementById('telefoneUp').value;
            update(valorUp,nomeUp,emailUp,telefoneUp)//Mandando valores para a função Update
          });
      },
      error: function (data) {//Caso aconteça algum erro
         alert(data.responseText);
      }
   });
}

//Excluir Dados
function excluir(id){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'excluir.php',//Arquivo que irá buscar
      dataType: 'json',
      data:'acao_ex='+id,//Passando a variavel id para o parametro acao que será recebido no PHP
      success: function (data) {
        // resposta do php
        $('.modal').modal('hide');//Esconde a Modal
        //Aparece o Alert
        $('#alert_ex').css("display", "block");
        $('#alert_ex').css("z-index", "9999999");
        setTimeout('$("#alert_ex").fadeOut(100)', 4000)//Alert Some depois de um tempo
        
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}

//Update dos dados
function update(_id,_nome,_email,_telefone){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'update.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'id': _id,'nome': _nome,'email': _email,'telefone': _telefone},//Passando a variavel id para o parametro acao que será recebido no PHP
      success: function (data){
        // resposta do php
            $('.modal').modal('hide');//Esconde a Modal
            //Aparece o Alert
            $('#alert_up').css("display", "block");
            $('#alert_up').css("z-index", "9999999");
            setTimeout('$("#alert_up").fadeOut(100)', 4000)//Alert Some depois de um tempo
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}




