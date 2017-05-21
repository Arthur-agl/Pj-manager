<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Project Manager 0.0.1</title>
		<link rel="stylesheet" href="./css/foundation.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
			
		<?php
			include './connect.php';
		?>
	</head>
<body>

	<style>.fi-social-facebook{color:dodgerblue;font-size:2rem;}.fi-social-youtube{color:red;font-size:2rem;}.fi-social-pinterest{color:darkred;font-size:2rem;}i.fi-social-instagram{color:brown;font-size:2rem;}i.fi-social-tumblr{color:navy;font-size:2rem;}.fi-social-twitter{color:skyblue;font-size:2rem;}</style>
	<header>

	<div class="top-bar">
	  <div class="top-bar-left">
		<ul class="menu">
		  <li><a style="border-right: 1px solid #aaa9a9;" >Empresa</a></li>
		  <li><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
		  <li class="active"><a href="#"> <i class="fi-torsos-all"></i> Clientes</a>
		  <li><a href="./projetosphp.php"> <i class="fi-page-copy"></i> Projetos</a></li>
		</ul>
	  </div>
	</div>

	<br>
	</header>
	<br>

	<div class="container" align ="center">
			<div class = "row">
				<?php	
				$result = mysqli_query($con,"SELECT CONCAT_ws(' ',cliente.first_name, cliente.last_name) as nome, cliente.cpf, cliente.telefone, cliente.email, empresa.Nome FROM cliente LEFT JOIN empresa ON cliente.empresa_assoc = empresa.idempresa ");

				echo "<table id = 'datatable' class ='hover'>
				</thead>
				<tr>
				<th>Nome</th>
				<th>Cpf</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Empresa</th>
				</tr>
				</thead>
				<tbody>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['nome'] . "</td>";
					echo "<td>" . $row['cpf'] . "</td>";
					echo "<td>" . $row['telefone'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['Nome'] . "</td>";
					echo "</tr>";
				}
				echo "</tbody>
				</table>"; ?>
			</div>
	</div>

	<footer>
		<div class="row expanded callout secondary">
		</div>
	</footer>


	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	
	<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
	<script>
		  $(document).foundation();
	</script>
	<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
	
</body>
</html>
