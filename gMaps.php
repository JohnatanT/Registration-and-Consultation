<?php
/**
 * gMaps Class
 *
 * Pega as informações de latitude, longitude e zoom de um endereço usando a API do Google Maps
 *
 * 
 */
class gMaps {

  private $mapsKey;

  function __construct($key = null) {
    if (!is_null($key)) {
      $this->mapsKey = $key;//Recebendo a Key
    }
  }
  function carregaUrl($url) {
    if (function_exists('curl_init')) {
      $cURL = curl_init($url);
      curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
      $resultado = curl_exec($cURL);
      curl_close($cURL);
    } else {
      $resultado = file_get_contents($url);
    }
    if (!$resultado) {
      trigger_error('Não foi possível carregar o endereço: <strong>' . $url . '</strong>');
    } else {
      return $resultado;
    }
  }
  function geoLocal($endereco) {
    //Passando a key na url da API do geocode para transformar em coordenadas.
    $url = "https://maps.googleapis.com/maps/api/geocode/json?key={$this->mapsKey}&address=" . urlencode($endereco);
    $data = json_decode($this->carregaUrl($url));
    
    if ($data->status === 'OK') {
      return $data->results[0]->geometry->location;
    } else {
      return false;
    }
  }
}