<?php
session_start();
include_once('livros/inc/conexao.php');
include('header.php'); 
error_reporting(0);
ini_set('display_errors', 0);
//pegar id do

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyBookShelf.net</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        .list-container {
    position: relative;
    background-color: #ffffff;
    border: #EBEBEB 1px solid;
    width: 1058px;
    margin-bottom: 0;
    margin-right: auto;
    margin-left: auto;
    text-align: left;
}   .status-menu-container {
    width: 1058px;
    height: 46px;
    background-color: #FFF;
    border-bottom: #EBEBEB 1px solid;
    z-index: 1;
}   .status-menu-container .status-menu {
    display: table;
    margin: 0 auto;
    border-collapse: separate;
    border-spacing: 40px 0;
}   .status-menu-container .status-menu .status-button {
    position: relative;
    display: table-cell;
    padding: 12px 0;
    margin: 0;
    font-family: 'Helvetica neue', Helvetica, "lucida grande", tahoma, verdana, arial, sans-serif;
    text-align: center;
    vertical-align: middle;
    font-size: 1.6em;
    color: #9B9B9B;
}   a {
    color: #1d439b;
    text-decoration: none;
}   .list-block {
    margin-top: 16px;
    min-height: 600px;
    padding: 0;
}   .list-unit {
    display: block;
    margin: 0 auto;
    width: 1024px;
}   .list-unit .list-status-title {
    position: relative;
    display: table;
    background-color: #4065BA;
    width: 1024px;
    height: 38px;
}   .list-table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
    border: #EBEBEB 1px solid;
}   table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: gray;
}   .list-container {
    position: relative;
    background-color: #ffffff;
    border: #EBEBEB 1px solid;
    width: 1058px;
    margin-bottom: 0;
    margin-right: auto;
    margin-left: auto;
    text-align: left;
}   .list-unit .list-status-title .text {
    display: table-cell;
    width: 1024px;
    height: 38px;
    font-size: 2.0em;
    color: #FFF;
    font-weight: bold;
    font-family: 'Helvetica neue', Helvetica, "lucida grande", tahoma, verdana, arial, sans-serif;
    text-align: center;
    vertical-align: middle;
}   .list-table .list-table-data .data {
    display: table-cell;
    padding: 4px 0;
    text-align: center;
    vertical-align: middle;
    border-bottom: #EBEBEB 1px solid;
}   td {
    line-height: 1.5em;
}   td {
    display: table-cell;
    vertical-align: inherit;
}   .list-table .list-table-data .data.title {
    padding-left: 8px;
    text-align: left;
}   .list-table .list-table-data .data.title {
    padding-left: 8px;
    text-align: left;
    word-wrap: break-word;
}   .list-table .list-table-data .data {
    display: table-cell;
    padding: 4px 0;
    text-align: center;
    vertical-align: middle;
    border-bottom: #EBEBEB 1px solid;
}   .list-table .list-table-header .header-title.status {
    background-image: none;
    width: 4px;
}   .list-table .list-table-header .header-title.number {
    width: 30px;
}   .list-table .list-table-header .header-title.image {
    width: 66px;
}   .list-table .list-table-header .header-title.title {
    padding-left: 8px;
    text-align: left;
}   .list-table .list-table-header .header-title.score {
    width: 65px;
}      .list-table .list-table-header .header-title {
    background: #F6F6F6 url("/img/pc/ownlist/bar-table-header.png") no-repeat right 7px / 1px 22px;
    display: table-cell;
    border-bottom: #EBEBEB 1px solid;
    height: 36px;
    text-align: center;
    vertical-align: middle;
} .row{
    
}
    </style>
</head>
<body>
    <br><br><br><br><br><br><br><br>
<div id="list-container" class="list-container">
  
<div id="status-menu" class="status-menu-container">
<div class="status-menu"><a href="perfil_lista.php" class="status-button all_books ">Todos os livros</a>
<a href="perfil_lendo.php" class="status-button lendo">Lendo</a>
<a href="perfil_completo.php" class="status-button completo ">Completo</a>
<a href="perfil_onhold.php" class="status-button onhold ">On Hold</a>
<a href="perfil_drop.php" class="status-button dropped ">Parou de ler</a>
<a href="perfil_planeja.php" class="status-button plantowatch ">Planeja ler</a><div class="search-container">
</a>
</div>
</div>
</div>



<div class="list-block">
      





<div class="list-unit watching">
<div class="list-status-title">
<span class="text">TODOS OS LIVROS</span>
<span class="stats">
</span>
</div>

<?php
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
$nome = $_SESSION['nome'];
$query1 = "select * from usuario where nome='{$nome}'";

  $result = mysqli_query($conn, $query1);
  
  $row = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $id_usuario = $row['idusuario'];
  }




  $query2 = "select * from addlivro where idusuario = '$id_usuario'";

  $result = mysqli_query($conn, $query2);
  
  $row = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $id_livros = $row['idlivros'];
  

//selecionar todos os livros da tabela
$result_livros = "SELECT * FROM livros WHERE idlivros = $id_livros";
$resultado_livros = mysqli_query($conn, $result_livros);

//contar o total de livros
$total_livros = mysqli_num_rows($resultado_livros);

//definir o numero de itens por pag
$itens_por_pag = 10;

//calculo das páginas necessárias para apresentar os livros
$num_pagina = ceil($total_livros/$itens_por_pag);

//calcula inicio da visualização
$inicio = ($itens_por_pag*$pagina)-$itens_por_pag;

//selecionando os livros a serem apresentados na pagina
$result_livros = "SELECT * FROM livros WHERE idlivros = $id_livros limit $inicio, $itens_por_pag";
$resultado_livros = mysqli_query($conn,$result_livros);
$total_livros = mysqli_num_rows($resultado_livros);

//pegar imagens banco de dados
$query = $conn->query("SELECT * FROM livros WHERE idlivros = $id_livros ORDER BY date_added DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'Upload/uploads/'.$row["img"];
    }
}
?>

<div class="input-group">
    <div class = "container-fluid">
        <div class="row">
            <?php while($rows_livros = mysqli_fetch_assoc($resultado_livros)){ ?>
            <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <?php
               $output = '
              <img src="Upload/uploads/'.$rows_livros["img"].'" alt="'.$rows_livros["nomelivro"].'" width="200" height="100" alt="..."/>';
              echo $output;
            ?>
					<div class="caption text-center">
							<a href="detalhes_livro.php?id_livro=<?php echo $rows_livros['idlivros']; ?>"><h3><?php echo $rows_livros['nomelivro']; ?></h3></a>
							<p><a href="#" class="btn btn-primary" role="button"></a> </p>
						</div>
					</div>
            </div>
         </div>
        <?php } }?>
        <?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			<nav class="text-center">
				<ul class="pagination">
					<li>
						<?php
						if($pagina_anterior != 0){ ?>
							<a href="livro_geral.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a href="livro_geral.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li>
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a href="livro_geral.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&raquo;</span>
					<?php }  ?>
					</li>
				</ul>
			</nav>
		</div>
    </div>
<div class="loading-space">
<i id="loading-spinner" class="fa-solid fa-spinner fa-spin" style="display: none;"></i>
</div>
</div>          </div>
</div>
</body>
</html>

