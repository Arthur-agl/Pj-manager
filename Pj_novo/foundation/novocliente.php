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

<?php

    $vnome = $_POST["f_nome"];
    $vsobrenome = $_POST["f_sobrenome"];
    $vcpf = $_POST["f_cpf"];
    $vtelefone = $_POST["f_tel"];
    $vemail = $_POST["f_email"];
	$vempresa = $_POST["f_empresa"];
	$vcnpj = $_POST["f_cnpj"];
	$vendereco = $_POST["f_endereco"];

    $result = mysqli_query($con,"SELECT * FROM empresa");
    
    while($row = mysqli_fetch_array($result))
	{
        $id = $row['idempresa'];
	}

    if(!empty($id)){
      $id++;
    }
    else{
      $id = 1;
    }
	
	if(!empty($vempresa) && !empty($vcnpj) && !empty($vendereco) ) {
	$sql = "INSERT INTO empresa VALUES ( $id, '$vempresa','$vcnpj','$vendereco')";
	mysqli_query($con,$sql);
	$sql = "INSERT INTO cliente VALUES ( 0 , '$vnome' , '$vsobrenome' , '$vcpf' , '$vtelefone' , '$vemail' , $id)";
	mysqli_query($con,$sql);
	}
	else{
		$sql = "INSERT INTO cliente VALUES ( 0 , '$vnome' , '$vsobrenome' , '$vcpf' , '$vtelefone' , '$vemail' , NULL)";
		mysqli_query($con,$sql);
	}
    

    mysqli_query($con,$sql);

?>

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




</header>


<div class="panel callout radius primary" >
	<div class="row expanded" align = "center">
        <h2> Cliente adicionado com sucesso! </h2>
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