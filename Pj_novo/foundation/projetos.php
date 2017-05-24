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
      <li><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li class="active"><a href="#"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>




</header>

<h3 align = "center"> Seus projetos</h3>

<div class="panel callout radius primary" align ="center">
	<div class="row expanded">
		<?php	
        $result = mysqli_query($con,"SELECT projeto.description, CONCAT_WS(\" \",cliente.first_name,cliente.last_name) AS `nome`, projeto.data_assinatura, projeto.valor, projeto.data_entrega, projeto.idprojeto FROM `projeto` INNER JOIN `cliente` ON cliente.idcliente = projeto.cliente_assoc ORDER BY data_entrega");

		if(!empty($row = mysqli_fetch_array($result))){

			echo "<table class ='hover stack' width = '100%'>
			<thead>
			<tr align = 'center'>
			<th>Descrição</th>
			<th>Cliente</th>
			<th>Assinado em</th>
			<th>Valor</th>
			<th>Entrega prevista</th>
			<th> </th>
			<th>Ação</th>
			<th> </th>
			</tr>
			</thead>
			<tbody>";

			$result = mysqli_query($con,"SELECT projeto.description, CONCAT_WS(\" \",cliente.first_name,cliente.last_name) AS `nome`, projeto.data_assinatura, projeto.valor, projeto.data_entrega, projeto.idprojeto FROM `projeto` INNER JOIN `cliente` ON cliente.idcliente = projeto.cliente_assoc ORDER BY data_entrega");

			while($row = mysqli_fetch_array($result))
			{
			echo "<tr align = 'center'>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['nome'] . "</td>";
			echo "<td>" . $row['data_assinatura'] . "</td>";
			echo "<td>R$" . $row['valor'] . "</td>";
			echo "<td>" . $row['data_entrega'] . "</td>";
			echo '
				<td> 
					<form method="get" action="verprojeto.php">
						<input type="hidden" name="id" value="' . $row['idprojeto'] .'"/>
						<button type="submit" class="button expanded">  Ver  </button>
					</form>
				</td>
				<td> 
					<form method="post" action="editaprojeto.php">
						<input type="hidden" name="id" value="' . $row['idprojeto'] .'"/>
						<button type="submit" class="button success expanded">  Editar  </button>
					</form>
				</td>
				<td> 
					<form method="post" action="excluiprojeto.php">
						<input type="hidden" name="id" value="' . $row['idprojeto'] .'"/>
						<button type="submit" class="button alert expanded">  Excluir  </button>
					</form>
				</td>
			
			';
			echo "</tr>";
			}
			echo "</tbody>
			</table>";
		}
		else{

			echo '<h2> Você não possui projetos cadastrados. </h2>';

		}


		?>
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