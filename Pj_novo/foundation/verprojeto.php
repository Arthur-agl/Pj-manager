<!doctype html>
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
      <li><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li class="active"><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

</header>
<div class = "row" align = "center">
	<h3>Dados do projeto</h3>
</div>

<div class="panel expanded callout primary">
	
			<?php
				$val = $_GET["id"];
				$result = mysqli_query($con," SELECT projeto.idprojeto, projeto.cliente_assoc, projeto.description, CONCAT_WS(\" \",cliente.first_name,cliente.last_name) AS `nome`, projeto.data_assinatura, projeto.valor, projeto.data_entrega FROM projeto INNER JOIN cliente ON projeto.cliente_assoc = cliente.idcliente WHERE projeto.idprojeto = $val ");
				while($row = mysqli_fetch_array($result))
				{
						
						echo "<div class ='row' align = left>";
						echo "<h3>" . $row['description'] . "</h3>";
						echo "<p>Cliente: <a href ='./vercliente.php?id=".$row['cliente_assoc']."'>" . $row['nome'] . "</a></p>";
						echo "<p>Data de assinatura: " . $row['data_assinatura'] . "</p>";
						echo "<p>Valor: R$". $row['valor'] . "</p>";
						echo "<p>Data de entrega: " . $row['data_entrega'] . "</p>";
						echo "<div class='row' align = 'left'>
						<form method='post' action='editaprojeto.php'>
							<input type='hidden' name='id' value=" .
								$row['idprojeto'] . ">
							</div>		
						<div class ='row expanded '>			
							<div class = 'medium-1 columns'><button type='submit' class='button success'>Editar projeto</button></div>
							<div class = 'medium-1 columns'><form method='post' action='excluiprojeto.php'>
								<input type='hidden' name='id' value='" . $row['idprojeto'] ."'/>
								<button type='submit' class='button alert expanded'>  Excluir projeto </button>
							</form></div>
						</form>
						<div class = 'medium-10 columns'></div>";
						echo "</div></div>";		
					
				}
								
			?>
</div>

			
<a href ='./projetos.php' class = 'button expanded' width = 100%>Voltar</a>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
