<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 1.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <?php include './connect.php'; ?>
	</head>
<body>

<script>
    $(document).ready(function () { 
        var $CampoCpf = $("#input_cpf");
		var $CampoTelefone = $("#input_telefone");
		
		$CampoCpf.mask('000.000.000-00');
		$CampoTelefone.mask('(00)Z0000-0000', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});
    });
</script>

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

<div class="row expanded" align = "center">
<h3>Editar informações do cliente</h3>
</div>

<?php

    $id = $_POST["id"];

    $result = mysqli_query($con,"SELECT * FROM cliente WHERE cliente.idcliente = " . $id );
    $row = mysqli_fetch_array($result);

?>

<div class="panel expanded callout primary" align ="center">
	<div class="row">
        <form name="add_cliente" method="post" action="editaconclui.php">
           
            <div class="container" align ="center">
                <div class = "row">
					<div class = "medium-6 columns">
                        <label>Nome
                        <input type="text" name="f_nome" value="<?php echo $row['first_name'] ?>" />
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
						
                    </div>
                    <div class = "medium-6 columns">
                        <label>Sobrenome
                        <input type="text" name="f_sobrenome" value="<?php echo $row['last_name'] ?>"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>CPF
                        <input id = "input_cpf" type="text" name="f_cpf" value="<?php echo $row['cpf'] ?>"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>Telefone
                        <input id = "input_telefone" type="text" name="f_tel" value="<?php echo $row['telefone'] ?>"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>E-mail
                        <input type="email" name="f_email" value="<?php echo $row['email'] ?>"/>
                    </div>
                </div>

            </div>

            <div class="container" align ="center">
                <div class = "row">
                    <div class = "medium-12 columns">
                         <br><h3> Adicionar projeto </h3><br>
                    </div>
                </div>



                <div class = "row">
                    <div class = "medium-6 columns">
                        <label>Data de assinatura
                        <input type="date" name="f_data_ass"/>
                    </div>
                    <div class = "medium-6 columns">
                        <label>Data para entrega
                        <input type="date" name="f_data_ent"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>Descrição do projeto
                        <input type="text" name="f_descricao"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>Valor do projeto
                        <input type="text" name="f_valor"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <button type="submit" class="button expanded success"> Atualizar </button>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>
<a class="button expanded" href = "./clientes.php">Voltar</a>

<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>