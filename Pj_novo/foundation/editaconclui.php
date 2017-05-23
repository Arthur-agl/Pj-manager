<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 0.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
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
      <li class="active"><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li ><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

</header>

<?php

    $id = $_POST["id"];
    
    $nome = $_POST["f_nome"];
    $sobrenome = $_POST["f_sobrenome"];
    $cpf = $_POST["f_cpf"];
    $telefone = $_POST["f_tel"];
    $email = $_POST["f_email"];

    $data_ass = $_POST["f_data_ass"];
    $data_ent = $_POST["f_data_ent"];
    $descricao = $_POST["f_descricao"];
    $valor = $_POST["f_valor"];

    $result = mysqli_query($con,"SELECT * FROM cliente WHERE cliente.idcliente = $id");
    $row = mysqli_fetch_array($result);

    if($nome != $row['first_name']){
        $sql = "UPDATE cliente SET first_name = '$nome' WHERE cliente.idcliente = $id";
        mysqli_query($con,$sql);
    }

    if($sobrenome != $row['last_name']){
        $sql = "UPDATE cliente SET last_name = '$sobrenome' WHERE cliente.idcliente = $id";
        mysqli_query($con,$sql);
    }
    
    if($cpf != $row['cpf']){
        $sql = "UPDATE cliente SET cpf = '$cpf' WHERE cliente.idcliente = $id";
        mysqli_query($con,$sql);
    }

    if($telefone != $row['telefone']){
        $sql = "UPDATE cliente SET telefone = '$telefone' WHERE cliente.idcliente = $id";
        mysqli_query($con,$sql);
    }

    if($email != $row['email']){
        $sql = "UPDATE cliente SET email = '$email' WHERE cliente.idcliente = $id";
        mysqli_query($con,$sql);
    }

?>
 
<div class="panel callout radius primary" align ="center">
	<div class="row">
        
        <h2> Cliente editado com sucesso! </h2>
        <?php 
        
        $result = mysqli_query($con,"SELECT * FROM projeto");
	
        while($row = mysqli_fetch_array($result)){
            $id_proj = $row['idprojeto'];
        }

        if(!empty($id_proj)){
            $id_proj++;
        }
        else{
            $id_proj = 1;
        }

        if(!empty($data_ass) && !empty($data_ent) && !empty($descricao) && !empty($valor)){
            mysqli_query($con,"INSERT INTO projeto VALUES ($id_proj, $id, '$data_ass', $valor, '$descricao', '$data_ent')");
            echo '<br> <h2> Projeto inserido com sucesso! </h2>';
        }
        else{
            echo '<br> <h2> Nenhum projeto inserido! </h2>';
        }

        ?>
        <a class="button success" href="./clientes.php"><i class = "fi-arrow-left "></i> Voltar à página de clientes</a>

	</div>
</div>

<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>