<?php
session_start();
include_once('header.php');
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
var_dump($id);
$result_usuario = "SELECT * FROM usuario WHERE idusuario = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>MyBookShelf - Editar Dados</title>	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>MyBookShelf.net - <?php echo $_SESSION['nome'];?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
		<style>

element.style {
    display: inline;
}table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: gray;
}tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}.page-common td {
    font-size: 11px;
    line-height: 1.5em;
}td {
    display: table-cell;
    vertical-align: top;
}.page-common {
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    text-align: left;
    width: 1060px;
}.page-common .normal_header {
    border-color: #bebebe;
    border-style: solid;
    border-width: 0 0 1px;
    color: #000;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 5px;
    margin-top: 4px;
    padding: 3px 0;
}div {
    display: block;
}element.style {
    margin-top: 4px;
    margin-bottom: 4px;
}.page-common .inputButton {
    background-color: #4165ba;
    border-bottom-color: #2e51a2;
    border-bottom-width: 1px;
    border-left-color: #6c8cd8;
    border-left-width: 1px;
    border-right-color: #2e51a2;
    border-right-width: 1px;
    border-style: solid;
    border-top-color: #6c8cd8;
    border-top-width: 1px;
    color: #fff;
    cursor: pointer;
    font-family: lucida grande,tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 1px 3px;
    text-decoration: none;
}input[type="submit" i] {
    appearance: auto;
    user-select: none;
    white-space: pre;
    align-items: flex-start;
    text-align: center;
    cursor: default;
    box-sizing: border-box;
    background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
    color: -internal-light-dark(black, white);
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
}
		</style>	
	</head>
	<body>
		<br> <br><br>
	<div class = "page-common profile">
		<div id="contentWrapper"><div><h1 class="h1">Configurações</h1></div><div id="content"><div id="horiznav_nav">
</div>

<div style="padding: 0 15px">

	<form name="picture_form" style="display: inline;" method="post" enctype="multipart/form-data" action="imagem_usuario.php">
	<table border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
	  <td valign="top" width="240">
		  <div class="normal_header">Foto atual</div>
	  <?php

$nome = $_SESSION['nome'];

$query1 = "select * from usuario where nome='{$nome}'";

$result = mysqli_query($conexao, $query1);

$row = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)){
  $id_usuario = $row['idusuario'];
}

$result_livros = "SELECT * FROM usuario WHERE idusuario='$id_usuario'";
$resultado_livro = mysqli_query($conexao, $result_livros);
$row_livros = mysqli_fetch_assoc($resultado_livro);

$query = $conexao->query("SELECT * FROM usuario ORDER BY data_cadastro DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'Upload/uploads/'.$row["img_usuario"];
    }
  }

  $output = '
  <img src="Upload/user-upload/'.$row_livros["img_usuario"].'" alt="'.$row_livros["nome"].'"  width="225" height="225"/>';
  echo $output;
    ?>
	  </td>
	  <td width="475" valign="top">
	  <div class="normal_header">Selecione uma foto</div>
	  Precisa ser em png, jpg ou gif
	  <br>
	  <div style="margin-top: 4px; margin-bottom: 4px;"><input name="file" size="50" type="file"></div>
	  <input type="submit" class="inputButton" name="submit" value="Enviar">
	  <br>
	  <br>

	  <div class="normal_header">Remover foto</div>
	  Você pode remover essa foto clicando no botão abaixo, não esqueça de selecionar outra.

	  <div style="margin-top: 4px; margin-bottom: 4px;"><input type="submit" name="remove_pic" value="Remover" class="inputButton" onclick="return confirm('Tem certeza que quer remover esta imagem?');"></div>
	  </td>
	</tr>
	</tbody></table>
	</form>
	
</div>
</div><!-- end of contentHome -->

</div>
		<h1>Editar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}

        $nome = $_SESSION['nome'];

$query1 = "select * from usuario where nome='{$nome}'";

$result = mysqli_query($conexao, $query1);

$row = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)){
  $id_usuario = $row['idusuario'];
}
		?>
        
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $id_usuario; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o seu novo nome" value="<?php echo $row_usuario['nome']; ?>"><br><br>

			<label> Usuario: </label>
			<input type="text" name="usuario" placeholder="Digite seu novo Usuario" value="<?php echo $row_usuario['usuario']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
			<button type="submit" class="button is-block is-link is-large is-fullwidth" name="submit">Atualizar</button>
			<!--Ao editarmos os dados, a variavel SESSION é atualizada, e por isso, é necessário logar novamente -->
		</form>
</div>
	</body>
</html>