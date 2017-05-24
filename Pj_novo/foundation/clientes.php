<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 1.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
	<?php include './connect.php';?>
	</head>
<body>



<header>



<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li><a style="border-right: 1px solid #aaa9a9;" >Sistema de Gestão</a></li>
	  <li><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
      <li class="active"><a href="#"> <i class="fi-torsos-all"></i> Clientes</a>
      <li><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

</header>

<h3 align = "center"> Seus clientes</h3>
<a class='button expanded success' href='./novocliente.html'><i class = 'fi-plus'></i>    Adicionar novo cliente</a>

<div class="panel callout radius primary">
	<div class="row expanded"><table class = "hover stack" width = 100%>
		<thead>
			<tr>
				<th>Nome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Empresa</th>
				<th></th>
				<th>Ação</th>
				<th></th>
        	</tr>
		</thead> 
		<tbody>
			<?php
				
				$result = mysqli_query($con,"SELECT idcliente, CONCAT_ws(' ',cliente.first_name, cliente.last_name) as nome, cliente.cpf, cliente.telefone, cliente.email, empresa.Nome FROM cliente LEFT JOIN empresa ON cliente.empresa_assoc = empresa.idempresa ORDER BY nome");
				while($row = mysqli_fetch_array($result))
				{
					
						echo "<tr align = 'center'>";
						echo "<td>" . $row['nome'] . "</td>";
						echo "<td>" . $row['cpf'] . "</td>";
						echo "<td>" . $row['telefone'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['Nome'] . "</td>";
						echo 
						'
							<td> 
								<form method="get" action="vercliente.php">
									<input type="hidden" name="id" value="' . $row['idcliente'] .'"/>
									<button type="submit" class="button expanded">  Ver  </button>
								</form>
							</td>
							<td> 
								<form method="post" action="edita.php">
									<input type="hidden" name="id" value="';
									echo $row['idcliente'];
									
									echo '"/>
									<button type="submit" class="button success expanded">Editar</button>
								</form>
							</td>
							<td>
								<form method="post" action="exclui.php">
									<input type="hidden" name="id" value="';
									echo $row['idcliente'];
									
									echo '" />
									<button type="submit" class="button alert expanded" href="clientes.php">Excluir</button>
								</form>
							</td>
						';
						echo "</tr>";
					
				}
				
			?>

		</tbody>

	</table>
	
	</div>
</div>
<a class='button expanded success' href='./novocliente.html'><i class = 'fi-plus'></i>    Adicionar novo cliente</a>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
	  $(document).foundation();
</script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
