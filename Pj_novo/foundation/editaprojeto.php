<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Manager 0.0.1</title>
    <link rel="stylesheet" href="./css/foundation.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <?php
	    include './connect.php';
	?>
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

<style>.fi-social-facebook{color:dodgerblue;font-size:2rem;}.fi-social-youtube{color:red;font-size:2rem;}.fi-social-pinterest{color:darkred;font-size:2rem;}i.fi-social-instagram{color:brown;font-size:2rem;}i.fi-social-tumblr{color:navy;font-size:2rem;}.fi-social-twitter{color:skyblue;font-size:2rem;}</style>
<header>



<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li><a style="border-right: 1px solid #aaa9a9;" >Sistema de Gestão</a></li>
      <li><a href="./index.php"> <i class="fi-home"></i> Home </a></li>
      <li><a href="./clientes.php"> <i class="fi-torsos-all"></i> Clientes</a>
      <li class="active"><a href="./projetos.php"> <i class="fi-page-copy"></i> Projetos</a></li>
    </ul>
  </div>
</div>

</header>

<div class="row expanded" align = "center">
<h3>Editar informações do projeto</h3>
</div>

<?php

    $id = $_POST["id"];

    $result = mysqli_query($con,"SELECT * FROM projeto WHERE projeto.idprojeto = " . $id );
    $row = mysqli_fetch_array($result);

?>

<div class="panel expanded callout primary" align ="center">
	<div class="row">
        <form name="edita_projeto" method="post" action="editaprojetoconclui.php">

            <div class="container" align ="center">

                <div class = "row">
                    <div class = "medium-6 columns">
                        <label>Data de assinatura
                        <input type="date" name="f_data_ass" value="<?php echo $row['data_assinatura'] ?>"/>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                    <div class = "medium-6 columns">
                        <label>Data para entrega
                        <input type="date" name="f_data_ent" value="<?php echo $row['data_entrega'] ?>"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>Descrição do projeto
                        <input type="text" name="f_descricao" value="<?php echo $row['description'] ?>"/>
                    </div>
                </div>

                <div class = "row">
                    <div class = "medium-12 columns">
                        <label>Valor do projeto
                        <input type="text" name="f_valor" value="<?php echo $row['valor'] ?>"/>
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
<a class="button expanded" href = "./projetos.php">Voltar</a>

<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>