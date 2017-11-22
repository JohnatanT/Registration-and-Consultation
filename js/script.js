//Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//Function para verificação antes de enviar action do form
function valida(){
	if(document.contato.nome.value.length < 1){
		return false;
	}
	else if(document.contato.email.value.length < 1){
		return false;
	}else if(document.contato.telefone.value.length < 1){
		return false;
	}else{
		return true;
	}
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
      data: 'acao='+nome, //Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {
         // resposta do php
         // colocando o conteudo 
        for(var i=0;data.length>i;i++){
        //Adicionando registros retornados na tabela
        $('#tabela').append('<tr><td>'+data[i].id+'</td><td>'+data[i].nome+'</td><td>'+data[i].email+'</td><td>'+data[i].telefone+'</td></tr>');
      }
       
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}