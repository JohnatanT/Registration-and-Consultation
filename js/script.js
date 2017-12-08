//Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 //Gif de carregamento 
$(document).ready(function(){
  setTimeout('$("#preload").fadeOut(100)', 2000);
});

var valorUp = null; //Variavel Global usada na linha 76

var lista = [];//Array Global usado na linha 62

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
        $('#alert').fadeIn();
        $('#alert').css("z-index", "9999999");
        setTimeout('$("#alert").fadeOut(100)', 2000)//Alert Some depois de um tempo
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
          //Array com objeto dos valores
          lista[data[i].id] = {id: data[i].id , nome : data[i].nome, email : data[i].email, telefone : data[i].telefone};
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
          //Recebendo valores da tabela tabela
          var _nome = lista[valorUp].nome;
          var _email = lista[valorUp].email;
          var _telefone = lista[valorUp].telefone;
          //Passando os valores para os inputs da Modal de Editar
          document.getElementById('nomeUp').value = _nome;
          document.getElementById('emailUp').value = _email;
          document.getElementById('telefoneUp').value = _telefone;
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
        $('#alert_ex').fadeIn();
        $('#alert_ex').css("z-index", "9999999");
        setTimeout('$("#alert_ex").fadeOut(100)', 2000)//Alert Some depois de um tempo
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
            $('#alert_up').fadeIn();
            $('#alert_up').css("z-index", "9999999");
            setTimeout('$("#alert_up").fadeOut(100)', 2000)//Alert Some depois de um tempo
      },
      error: function (data) {//Caso aconteça erro
         alert(data.responseText);
      }
   });
}

//Login
$("#submit_login").click(function(){
  //Recebendo valores
  var email = document.getElementById('email_login').value;
  var senha = document.getElementById('senha_login').value;
  logar(email,senha)
});

function logar(email,senha){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'login.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'email': email,'senha': senha},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {// resposta do php com sucesso
          if(data[0] == false){
            $('.modal').modal('hide');//Esconde a Modal
            $('#alert_log').fadeIn();
            $('#alert_log').css("z-index", "9999999");
            setTimeout('$("#alert_log").fadeOut(100)', 2000)//Alert Some depois de um tempo
          }else{
            window.location.href = "painel.php";
          }  
      },
      error: function (data) {//Caso aconteça erro
        $('#alert_log').fadeIn();
        $('#alert_log').css("z-index", "9999999");
        ssetTimeout('$("#alert_log").fadeOut(100)', 2000)//Alert Some depois de um tempo
      }
   });
}

//Cadastro as infomações de Login
$("#cadastro_login").click(function(){
  //Recebendo valores
  var nome = document.getElementById('nome_cad').value;
  var email = document.getElementById('email_cad').value;
  var senha = document.getElementById('senha_cad').value;
  var senha2 = document.getElementById('senha_cad2').value;
  var select = document.getElementById('select').value;
  if(senha == senha2){
    cadastrar(nome,email,senha,select)
  }else{
   $('#alert_pass').fadeIn();
  $('#alert_pass').css("z-index", "9999999");
    setTimeout('$("#alert_pass").fadeOut(100)', 2000)
  }
  
});
//Função que envia os dados 
function cadastrar(_nome,_email,_senha,_select){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'cadastro.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'nome': _nome,'email': _email,'senha': _senha, 'select': _select},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {
      //Mensagem se já houver e-mail Cadastrado
        if(data[0] == false){
          $('#alert_exis').fadeIn();
          $('#alert_exis').css("z-index", "9999999");
          setTimeout('$("#alert_exis").fadeOut(100)', 2000)//Alert Some depois de um tempo
          console.log('Email já cadastrado');
        }
      //Mensagem se não houver e-mail Cadastrado
        if(data == 1){
          $('.modal').modal('hide');//Some Modal
          //Chama o Alert e depois esconde ele
          $('#alert_cad').fadeIn();
          $('#alert_cad').css("z-index", "9999999");
          setTimeout('$("#alert_cad").fadeOut(100)', 2000)
        }

      },
      error: function (xhr, ajaxOptions, thrownError) {//Caso aconteça erro
         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
   });
}

//Estatistica
$("#submitEst").click(function(){ // no click do botao recebe os valores

  var numero_aumento = document.getElementById('numero_aumento').value;
                    
  var numero_neutro = document.getElementById('numero_neutro').value;
  
  var numero_baixo = document.getElementById('numero_baixo').value;
 
  var numero_critico = document.getElementById('numero_critico').value;
  //Envia os valores para a função
  estatistica(numero_aumento,numero_neutro,numero_baixo,numero_critico)

});

function estatistica(numero_aumento,numero_neutro,numero_baixo,numero_critico){
    $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'estatistica.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'numero_aumento': numero_aumento,'numero_neutro': numero_neutro,'numero_baixo': numero_baixo,'numero_critico': numero_critico},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {
      alert("Calculos Realizados com Sucesso");
      window.location.href = "admin.php";
      },
      error: function (xhr, ajaxOptions, thrownError) {//Caso aconteça erro
         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
   });


}
//Cadastro de Cargo
$("#submitCargo").click(function(){
  //Recebendo valores
  var cargo = document.getElementById('cargoNome').value;
  cargo_cad(cargo)
});

//Função que cadastra o cargo
function cargo_cad(cargo){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'cargo.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'cargo': cargo},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {
      alert('Cargo Cadastrado com Sucesso');
      },
      error: function (xhr, ajaxOptions, thrownError) {//Caso aconteça erro
         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
   });
}

//Função que mostra os cargos no Select durante o cadastro
function list(){
  $('#select').empty();
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'select.php',//Arquivo que irá buscar
      dataType: 'json',
      success: function (data) {
      for(var i=0;data.length>i;i++){
          //Adicionando registros retornados no Select
          $('#select').append('<option value="'+data[i].cargo+'"> '+data[i].cargo+' </option>');
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {//Caso aconteça erro
         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
   });
}

/* API Google Maps */
 
  var lat = null;
  var lng = null;

$("#submitMap").click(function(){ // no click do botao recebe o endereço

  var enderecos = document.getElementById('endereco').value;
  //Envia o endereço para a função
  endereco(enderecos)
});

function endereco(enderecos){
    $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'coord.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'endereco': enderecos},//Passando a variavel nome para o parametro acao que será recebido no PHP
      success: function (data) {
        alert('Endereço Cadastrado com Sucesso');
        window.location.href = "painel.php";
      },
      error: function (xhr, ajaxOptions, thrownError) {//Caso aconteça erro
         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
   });
}

//Array usado para guardar as coornedadas
var array = [];

//Ao carregar a página chama a função de Busca das Coordenadas
$(document).ready(function(){
  buscaPontos()
});
//Funçãoque busca as coordenadas
function buscaPontos(){
  //$('#').empty();
  $.ajax({
    type: "POST",
    url: "pontos.php",
    dataType: "json",
    success: function (data){
        for(var i=0;data.length>i;i++){
          //Adicionando registros retornados
          array[i] = {
              "id": data[i].id,
              "latitude": data[i].lat,
              "longitude": data[i].lng,
              "endereco": data[i].endereco
            }; 
        }
        initMap(array)//Passando array com as coordenadas para a função
    },
    error: function (xhr, ajaxOptions, thrownError){
      alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    } 
  });
}

var markers = [];
//Função que carrega o Mapa
function initMap(array){
  var uluru = {lat: -3.7319, lng: -38.5267};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: uluru
  });
  //Adicionando os marcadores no Mapa
  for(var i=0;array.length>i;i++){
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(array[i].latitude,array[i].longitude),
    title: array[i].endereco,
    map: map,
    icon: 'img/if_Location_728975.png'
  });
   markers.push(marker);
   }
    //Agrupamento de Pontos no Mapa
    var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});    
}
$('#botaoMapa').click(function(){
    var pesquisa = document.getElementById('txtnomeMapa').value;
    info_mapa(pesquisa)
});


//var lista_mapa = [];
function info_mapa(pesquisa){
  $('#tabela_mapa').empty();
  $.ajax({
    type: "POST",
    url: "infoMapa.php",
    dataType: "json",
    data:{'pesquisa': pesquisa},
    success: function (data){
        for(var i = 0;data.length > i; i++){
          $('#tabela_mapa').append('<tr data-id="'+data[i].id+'"><td>'+data[i].id+'</td><td>'+data[i].lat+'</td><td>'+data[i].lng+'</td><td>'+data[i].endereco+'</td><td><button type="button" data-toggle="modal" data-target="#confirma_mapa" class="btn btn-danger excluirMapa" value="'+data[i].id+'">Excluir <i class="fa fa-times" aria-hidden="true"></i></button></td></tr>');
          //lista_mapa[data[i].id] = {id: data[i].id , lat : data[i].lat, lng : data[i].lng, endereco : data[i].endereco};
        }
        $(".excluirMapa").click(function(){ 
          var valor = $(this).val();
          $("#conf_map").click(function(){//Confirmar no Modal
            $('#tabela_mapa tr[data-id=' + valor + ']').remove();//Excluindo linha da tabela HTML
            excluir_mapa(valor)//Passando o Id da linha para a função Excluir
          });
        }); 
       
    },
    error: function (xhr, ajaxOptions, thrownError){
      alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    } 
  });
}

//Excluir Dados do Mapa
function excluir_mapa(id){
   $.ajax({
      type: "POST",//Tipo de envio/busca
      url: 'excluirMapa.php',//Arquivo que irá buscar
      dataType: 'json',
      data:{'id': id},//Passando a variavel id para o parametro acao que será recebido no PHP
      success: function (data) {
        // resposta do php
        $('.modal').modal('hide');//Esconde a Modal
        //Aparece o Alert
        $('#alert_ex').fadeIn();
        $('#alert_ex').css("z-index", "9999999");
        setTimeout('$("#alert_ex").fadeOut(100)', 2000)//Alert Some depois de um tempo
      },
      error: function (xhr, ajaxOptions, thrownError) {//Caso aconteça erro
         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
   });
}
