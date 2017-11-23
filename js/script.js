//Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 //Gif de carregamento 
    $(document).ready(function(){
          setTimeout('$("#preload").fadeOut(100)', 1500);
       
      });
    
//Cadastro de dados
$("#submit").click(function(){
  var nome = document.getElementById('nome').value;
  var email = document.getElementById('email').value;
  var telefone = document.getElementById('telefone').value;
  enviar(nome,email,telefone)
});

function enviar(_nome,_email,_telefone){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'conexao.php',//Arquivo que irá buscar
      dataType: 'json',
      data: {'nome': _nome,'email': _email,'telefone': _telefone},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {// resposta do php com sucesso
         $('#alert').css("display","block");
         $('#alert').css("z-index","99999");
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
        $('#tabela').append('<tr data-id="'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].nome+'</td><td>'+data[i].email+'</td><td>'+data[i].telefone+'</td><td><button type="button" class="btn btn-danger excluir" value="'+data[i].id+'">Excluir</button></td><td><button type="button" class="btn btn-success editar" data-toggle="modal" data-target="" value="'+data[i].id+'">Editar</button></td></tr>');
      }
            //Excluir a tabela
      $(".excluir").click(function(){ 
          var valor = $(this).val();
          excluir(valor)
          $(this).parents('tr').remove();
      });
       
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}

//Excluir
function excluir(id){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'excluir.php',//Arquivo que irá buscar
      dataType: 'json',
      data:'acao_ex='+id,//Passando a variavel id para o parametro acao que será recebido no PHP
      success: function (data) {
        // resposta do php
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}





