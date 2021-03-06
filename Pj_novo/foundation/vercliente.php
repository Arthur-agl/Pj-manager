<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 1.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>

	<?php include './connect.php'; ?>
	</head>
<body>



<header>

<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li><a style="border-right: 1px solid #aaa9a9;" >Sistema de Gestão</a></li>
	  <li><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
      <li class="active"><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

</header>
<div class = "row" align = "center">
	<h3>Dados do cliente</h3>
</div>

<div class="panel expanded callout primary">
	
			<?php
				$val = $_GET["id"];
				$result = mysqli_query($con,"SELECT cliente.idcliente, CONCAT_ws(' ',cliente.first_name, cliente.last_name) as nome, cliente.cpf, cliente.telefone, cliente.email, empresa.Nome FROM cliente LEFT JOIN empresa ON cliente.empresa_assoc = empresa.idempresa WHERE cliente.idcliente = " . $val );
				while($row = mysqli_fetch_array($result))
				{
						
						echo "<div class ='row' align = left>";
						echo "<h3>" . $row['nome'] . "</h3>";
						echo "<p>Cpf: " . $row['cpf'] . "</p>";
						echo "<p>Telefone: " . $row['telefone'] . "</p>";
						echo "<p>E-mail: ". $row['email'] . "</p>";
						echo "<p>Empresa: " . $row['Nome'] . "</p>";
						echo "<div class='row' align = 'left'>
						<form method='post' action='edita.php'>
							<input type='hidden' name='id' value=" .
								$row['idcliente'] . ">
							</div>		
						<div class ='row expanded '>			
							<div class = 'medium-1 columns'><button type='submit' class='button success'>Editar cliente</button></div>
							<div class = 'medium-1 columns'><form method='post' action='exclui.php'>
								<input type='hidden' name='id' value='" . $row['idcliente'] ."'/>
								<button type='submit' class='button alert expanded'>  Excluir  cliente</button>
							</form></a></div>
							<div class ='medium-10 colums'></div>
						</div>
						</form>";
						echo "</div>";		
					
				}
				echo "<hr><h2>Projetos:</h2>";
				
				echo "<table class ='hover stack'>
					<thead>
					<tr>
						<th>Descrição</th>
						<th>Assinado em</th>
						<th>Valor</th>
						<th>Entrega prevista</th>
					</tr>
					</thead>
					<tbody>";
				
				$result = mysqli_query($con,"SELECT projeto.idprojeto, projeto.description, projeto.data_assinatura, projeto.valor, projeto.data_entrega FROM cliente LEFT JOIN projeto ON projeto.cliente_assoc = cliente.idcliente WHERE cliente.idcliente = " . $val );
				while($row = mysqli_fetch_array($result))
				{
					
						echo "<tr>";
						echo "<td><a href = './verprojeto.php?id=" . $row['idprojeto']. "'> " . $row['description'] . "</a></td>";
						echo "<td>" . $row['data_assinatura'] . "</td>";
						echo "<td>R$" . $row['valor'] . "</td>";
						echo "<td>" . $row['data_entrega'] . "</td>";
						echo "</tr>";
				}
				echo "</tbody>
					</table>";
				
			?>
</div>

			
<a href ='./clientes.php' class = 'button expanded' width = 100%>Voltar</a>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
