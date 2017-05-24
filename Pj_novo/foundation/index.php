<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 1.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
	<?php include "./connect.php"?>
	</head>
	
<body>

<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li><a style="border-right: 1px solid #aaa9a9;" >Sistema de Gestão</a></li>
      <li class="active"><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
      <li><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

</header>

<div class="row expanded callout success"><h3 class = "alert" align = "center"><strong>Próximos projetos para entrega</strong></h3></div>

<div class="row expanded">
	<ul class="accordion" data-accordion data-allow-all-closed="true">
		<li class="accordion-item" data-accordion-item>
    
			<a href="#" class="accordion-title">Referência rápida</a>
			
			<div class="accordion-content" data-tab-content>
			  <p><strong><i class="fi-home"></i> Home:</strong><br>Aqui você visualiza os projetos que precisam de atenção.</p>
			  <p><strong><i class="fi-torsos-all"></i> Clientes:</strong><br>Aqui você visualiza seus clientes e adiciona novos clientes, ou novos projetos a um cliente já existente.</p>
			  <p>Como fazer: crie um novo cliente ou selecione Editar. Na página seguinte preencha o formulário com os dados sobre seu cliente/projeto.</p>
			  <p><strong><i class="fi-page-copy"></i> Projetos:</strong><br>Aqui você pode visualizar seus projetos.</p>
			</div>
		</li>
	</ul>
 </div>
 
	<div class="panel callout radius primary">
		
		<div class="row expanded">
			<?php	
				$result = mysqli_query($con,"SELECT idprojeto, projeto.data_entrega, projeto.description, CONCAT_ws(' ',cliente.first_name, cliente.last_name) as nome, projeto.valor FROM projeto INNER JOIN cliente ON projeto.cliente_assoc = cliente.idcliente ORDER BY data_entrega ASC");

				echo "<table class ='hover stack ' width='100%'>
				<thead>
				<tr>
				<th>Data para entrega</th>
				<th>Projeto</th>
				<th>Cliente</th>
				<th>Valor</th>
				<th>Ação</th>
				</tr>
				</thead>
				<tbody>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr align = 'center'>";
					echo "<td>" . $row['data_entrega'] . "</td>";
					echo "<td>" . $row['description'] . "</td>";
					echo "<td>" . $row['nome'] . "</td>";
					echo "<td>R$" . $row['valor'] . "</td>";
					echo '<td><form method="get" action="verprojeto.php">
									<input type="hidden" name="id" value=' . $row['idprojeto'] .'>
									<button type="submit" class="button expanded">  Detalhes  </button>
								</form></td>';
					echo "</tr>";
				}
				echo "</tbody>
				</table>"; 
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
