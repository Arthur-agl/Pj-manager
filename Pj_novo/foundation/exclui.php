<?php
include './connect.php';

$var = $_POST["id"];
mysqli_query($con,"DELETE FROM projeto WHERE projeto.cliente_assoc = $var");
mysqli_query($con,"DELETE FROM cliente WHERE cliente.idcliente = $var");

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 1.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
    <?php
	    include './connect.php';
	?>
	</head>
<body>

<header>

<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li><a style="border-right: 1px solid #aaa9a9;" >Sistema de Gestão</a></li>
      <li><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
      <li class="active"><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li ><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

<br>
</header>
<br>

<div class="panel callout radius primary" align ="center">
	<div class="row">

        <h2> Cliente excluído com sucesso! </h2>
        <a class="button success" href="./clientes.php"><i class = "fi-arrow-left "></i> Voltar à página de clientes</a>

	</div>
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>