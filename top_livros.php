<?php
session_start();
include_once('livros/inc/conexao.php');  
include('header.php');



$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

//selecionar todos os livros da tabela
$result_livros = "SELECT * FROM livros";
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
$result_livros = "SELECT * FROM livros limit $inicio, $itens_por_pag";
$resultado_livros = mysqli_query($conn,$result_livros);
$total_livros = mysqli_num_rows($resultado_livros);

//pegar imagens  banco de dados
$query = $conn->query("SELECT * FROM livros ORDER BY date_added DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'Upload/uploads/'.$row["img"];
?>
<?php }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.navbar-form{
  text-align: right;

}
</style>
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

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
      .barra-pesquisa{
        
        font-size: 4px;
      }
      .btn {
        background-color: #ffffff;
        font-size: 20px;
        margin-botton:
      }
    </style>
	
  
    <title>Livros - MyBookShelf</title>
</head>
<body>

<br><br>
<br>
<br>
<br>
<br>
<br>
<br>

<div>
  <form class="navbar-form" method="post" name="form1">
        <div>
        <select name= "myinfo_status" id="myinfo_status_select" class="form-user-status js-form-user-status myinfo_updateInfo" onchange="mostraCampo(this)">
            <option selected="selected" value="1">Livro</option>
            <option value="2">Autor</option>
            <option value="3">Categoria</option>
        </select>

          <input type="form-control" name="search" placeholder="Busca..." style="font-size: 15px" required="">
          <button type="submit" name="submit" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-search"></span>
        </div>
  </form>
</div>
<div class="input-group">
    <div class = "container-fluid">
        <div class="row">
            <?php while($rows_livros = mysqli_fetch_assoc($resultado_livros)){
              $id_livro = $rows_livros["idlivros"];

              $result_avaliacao = "SELECT SUM(avaliacao) FROM addlivro WHERE idlivros = $id_livro";
              $resultado_avaliacao = mysqli_query($conn, $result_avaliacao);
              $total_avaliacao = mysqli_num_rows($resultado_avaliacao);

              while($rows_avaliacao = mysqli_)
              ?>
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
        <?php } ?>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>