<?php
session_start();
require_once 'dompdf/autoload.inc.php';
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';


	
$texto = $_POST['texto'];


$html = '
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Atenção, apenas um teste</title>
		<style>
		* { font-family: sans-serif; }
		h1{
			color: #blue;
			text-align: center;
			font-style: italic;
		}
		h3{
			font-style: italic;
		}
	</head>
	<body>
 
		<header>
			<div id="img-pdf">
				<h1>Relatório</h1>
			</div>
			<h3> Usuario Logado: '.$_SESSION["nome_usuario"].' </h3>
			<h3> Email do Usuario Logado: '.$_SESSION["email_usuario"].' </h3>
			<h3> Cargo do Usuario Logado: '.$_SESSION["cargo"].' </h3>
			<h4>Feito em: '.date('d-m-Y').'<h4>

			<h2> Mensagem: </h2>
			<p>'.$texto.'</p>
		</header>
	</body>
</html>

		';



/*  DomPdf */

Dompdf\Autoloader::register();

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream(
	"Arquivo.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
 ));




	
