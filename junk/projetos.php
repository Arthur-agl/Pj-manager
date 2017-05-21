<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 0.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<?php include './connect.php'; ?>
	</head>
<body>



<style>.fi-social-facebook{color:dodgerblue;font-size:2rem;}.fi-social-youtube{color:red;font-size:2rem;}.fi-social-pinterest{color:darkred;font-size:2rem;}i.fi-social-instagram{color:brown;font-size:2rem;}i.fi-social-tumblr{color:navy;font-size:2rem;}.fi-social-twitter{color:skyblue;font-size:2rem;}</style>
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



<br>
</header>
<br>

<div class="container" align ="center">
	<div class="row">
		<?php	
        $result = mysqli_query($con,"SELECT projeto.description, CONCAT_WS(\" \",cliente.first_name,cliente.last_name) AS `nome`, projeto.data_assinatura, projeto.valor, projeto.data_entrega FROM `projeto` INNER JOIN `cliente` ON cliente.idcliente = projeto.cliente_assoc ORDER BY data_entrega");

		echo "<table class ='hover'>
		</thead>
		<tr>
		<th>Descrição</th>
		<th>Cliente</th>
		<th>Assinado em</th>
		<th>Valor</th>
		<th>Entrega prevista</th>
		</tr>
		</thead>
		<tbody>";

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['description'] . "</td>";
		echo "<td>" . $row['nome'] . "</td>";
		echo "<td>" . $row['data_assinatura'] . "</td>";
		echo "<td>" . $row['valor'] . "</td>";
		echo "<td>" . $row['data_entrega'] . "</td>";
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



<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
