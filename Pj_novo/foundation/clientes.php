<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 0.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
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
      <li><a style="border-right: 1px solid #aaa9a9;" >Sistema de Gestão</a></li>
	  <li><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
      <li class="active"><a href="#"> <i class="fi-torsos-all"></i> Clientes</a>
      <li><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>



<br>
</header>
<br>

<div class="container" align ="center">
	<table class = "table">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Sobrenome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Ação</th>
        	</tr>
		</thead> 
		<tbody>
			<?php
				
				$result = mysqli_query($con,"SELECT * FROM cliente");

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['first_name'] . "</td>";
					echo "<td>" . $row['last_name'] . "</td>";
					echo "<td>" . $row['cpf'] . "</td>";
					echo "<td>" . $row['telefone'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo '<td>' . '<a class="button tiny" href="#">Editar</a> <a class="button tiny" class="button alert" href="#">Excluir</a>' . '</td>';
					echo "</tr>";
				}
			?>

		</tbody>  
	</table>
	<a class="button success" href="./novocliente.html"><i class = "fi-plus "></i>    Adicionar novo cliente</a>
</div>

<footer>
<div class="row expanded callout secondary">
<div class="large-4 columns">


</div>


</div>
<div class="row expanded">
<div class="medium-6 columns">
<ul class="menu">
</ul>
</div>
<div class="medium-6 columns">
<ul class="menu align-right">
<!--<li class="menu-text"> Copyright © 2099 Random Mag </li> -->
</ul>
</div>
</div>
</footer>



<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
