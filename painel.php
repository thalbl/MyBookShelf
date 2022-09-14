<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include('conexao.php');
include('valida.php');
include('header.php');

$nome = $_SESSION['nome'];
$query1 = "select * from usuario where nome='{$nome}'";

  $result = mysqli_query($conexao, $query1);
  
  $row = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $id_usuario = $row['idusuario'];
  }


$queryLendo = "SELECT COUNT(*) as numLendo FROM addlivro where idusuario = $id_usuario and situacao = 'Lendo' ";
$resultLendo = mysqli_query($conexao, $queryLendo);
$fetchlendo = mysqli_fetch_array($resultLendo);
$numLendo = $fetchlendo['numLendo'];


$queryCompleto =  "SELECT COUNT(*) as numCompleto FROM addlivro where idusuario = $id_usuario and situacao = 'Terminei de ler' ";
$resultCompleto = mysqli_query($conexao, $queryCompleto);
$fetchCompleto = mysqli_fetch_array($resultCompleto);
$numCompleto = $fetchCompleto['numCompleto'];


$queryOnHold = "SELECT COUNT(*) as numOnHold FROM addlivro where idusuario = $id_usuario and situacao = 'On-Hold' ";
$resultOnHold = mysqli_query($conexao, $queryOnHold);
$fetchOnHold = mysqli_fetch_array($resultOnHold);
$numOnHold = $fetchOnHold['numOnHold'];

$queryDrop = "SELECT COUNT(*) as numDrop FROM addlivro where idusuario = $id_usuario and situacao = 'Não quis mais ler' ";
$resultDrop = mysqli_query($conexao, $queryDrop);
$fetchDrop = mysqli_fetch_array($resultDrop);
$numDrop = $fetchDrop['numDrop'];


$queryPlaneja = "SELECT COUNT(*) as numPlaneja FROM addlivro where idusuario = $id_usuario and situacao = 'Planejo ler' ";
$resultPlaneja = mysqli_query($conexao, $queryPlaneja);
$fetchPlaneja = mysqli_fetch_array($resultPlaneja);
$numPlaneja = $fetchPlaneja['numPlaneja'];

$queryTotal = "SELECT COUNT(*) as numTotal FROM addlivro where idusuario = $id_usuario";
$resultTotal = mysqli_query($conexao, $queryTotal);
$fetchTotal = mysqli_fetch_array($resultTotal);
$numTotal = $fetchTotal['numTotal'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
.page-common {
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    text-align: left;
    width: 1060px;
}

.page-common #contentWrapper {
    background-color: #fff;
    min-height: 555px;
    padding-bottom: 30px;
    position: relative;
}

.page-common.profile #content {
    padding: 8px;

}.page-common #content {
    background-color: #fff;
    border-color: #ebebeb;
    border-style: solid;
    border-width: 0 1px 1px;
    padding: 5px 10px 10px;
    position: relative;
}
    .page-common .content-container {
    display: table;
    width: 100%;
}   
    .page-common .content-container .container-left{
    border-right: #ebebeb 1px solid;
    display: table-cell;
    padding: 8px 8px 8px 0;
    vertical-align: top;
    width: 225px;
    }
    .user-profile {
    display: block;
    width: 224px;
}   
    .user-profile .user-image {
    display: block;
    text-align: center;
}
    .page-common .mb8 {
    margin-bottom: 8px!important;
}
    .user-profile .user-status.border-top {
    border-top: #f0f0f0 1px solid;
}
.page-common .content-container .container-right {
    display: table-cell;
    padding-left: 8px;
    vertical-align: top;
}
.profile .user-profile-about {
    display: block;
    margin-bottom: 48px;
    max-height: 1000px;
    overflow-y: hidden;
    padding-top: 8px;
    width: 800px;
    word-wrap: break-word;
}.page-common .mb24 {
    margin-bottom: 24px!important;
}.btn-detail-add-picture {
    background-color: #ffffff;
    border-radius: 2px;
    color: #787878!important;
    display: table-cell;
    height: 225px;
    position: relative;
    text-align: center;
    text-decoration: none;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
    vertical-align: middle;
    width: 225px;
}img{
    border-radius: 50%;
}
.page-common .fl-l {
    float: left!important;
}.profile .user-statistics .user-statistics-stats .stats {
    display: table-cell;
    padding-right: 8px;
    width: 50%;
}.page-common .mt12 {
    margin-top: 12px!important;
}.page-common .mr8 {
    margin-right: 8px!important;
}.page-common .ml8 {
    margin-left: 8px!important;
}ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}.page-common .mb12 {
    margin-bottom: 12px!important;
}li {
    display: list-item;
    text-align: -webkit-match-parent;
}.page-common .mb12 {
    margin-bottom: 12px!important;
}.profile .user-statistics .stats-status .circle {
    position: relative;
    text-indent: 24px;
}.page-common .lh10 {
    line-height: 1em!important;
}.page-common a, .page-common a:visited {
    color: #1d439b;
    text-decoration: none;
}.profile .user-statistics .stats-status .circle.watching:after, .profile .user-statistics .stats-status .circle.reading:after {
    background-color: #2db039;
}.profile .user-statistics .stats-status .circle:after {
    border-radius: 1em;
    content: '';
    display: block;
    height: 12px;
    left: 0;
    margin-top: -6px;
    position: absolute;
    top: 50%;
    width: 12px;
}.page-common p, .page-common .textReadability, .page-common span {
    line-height: 1.5em;
    margin: 0;
    padding: 0;
}.page-common .fl-r {
    float: right!important;
}.page-common .di-ib {
    display: inline-block!important;
}.clearfix, .manga-store #content, .manga-store .story-info, .manga-store .comics-list-tab-area, .manga-store .comics-list-cont, .manga-store .comic-list-pager-area {
    display: block;
}.profile .user-statistics .stats-status .circle.completed:after {
    background-color: #26448f;
}.profile .user-statistics .stats-status .circle:after {
    border-radius: 1em;
    content: '';
    display: block;
    height: 12px;
    left: 0;
    margin-top: -6px;
    position: absolute;
    top: 50%;
    width: 12px;
}.profile .user-statistics .stats-status .circle.on_hold:after {
    background-color: #f9d457;
}.profile .user-statistics .stats-status .circle:after {
    border-radius: 1em;
    content: '';
    display: block;
    height: 12px;
    left: 0;
    margin-top: -6px;
    position: absolute;
    top: 50%;
    width: 12px;
}.profile .user-statistics .stats-status .circle.dropped:after {
    background-color: #a12f31;
}.profile .user-statistics .stats-status .circle:after {
    border-radius: 1em;
    content: '';
    display: block;
    height: 12px;
    left: 0;
    margin-top: -6px;
    position: absolute;
    top: 50%;
    width: 12px;
}.profile .user-statistics .stats-status .circle.plan_to_watch:after, .profile .user-statistics .stats-status .circle.plan_to_read:after {
    background-color: #c3c3c3;
}.profile .user-statistics .stats-status .circle:after {
    border-radius: 1em;
    content: '';
    display: block;
    height: 12px;
    left: 0;
    margin-top: -6px;
    position: absolute;
    top: 50%;
    width: 12px;
}
@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}

.comentario {
  font-size:  1.875rem;
}

    </style>
</head>
<body>
<br><br><br><br><br>
<div class = "page-common profile">
    <div class = "container-esquerda"> 
        <div class = "imagem-usuario">
        <h2>Olá, <?php echo $_SESSION['nome'];?></h2>
        <h2><a href="logout.php">Sair</a></h2>
      <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      
      //Receber o número da página
      $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
      $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
      
      //Setar a quantidade de itens por pagina
      $qnt_result_pg = 3;
      
      //calcular o inicio visualização
      $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
      echo "<a href='edit_usuario.php?id=" . $row_usuario['idusuario'] . "'>Alterar Dados do perfil</a><br><hr>";
      $result_usuarios = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pg";
      $resultado_usuarios = mysqli_query($conexao, $result_usuarios);
      while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
      }
      ?>
<div id="contentWrapper">     
<div id="content">
      <div class="content-container">
        <div class="container-left">
      
<div class="user-profile">

  <div class="user-image mb8">
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
  <a href="edit_usuario.php" class="btn-detail-add-picture"><i class="fa-solid fa-circle-plus fs18 icon-plus-circle"></i><i class="fa-solid fa-camera fs48"></i><br>
  <img src="Upload/user-upload/'.$row_livros["img_usuario"].'" alt="'.$row_livros["nome"].'"  width="225" height="225"/><span class="text">Adicione uma foto</span></a>  </div>';
  echo $output;
    ?>
    

  <div class="user-button clearfix mb12">
    <a class="btn-profile-submit fl-l" href="perfil_lista.php">Lista de livros</a>
  </div>

</div>
    </div>

    <!--
        <div class="container-right">
              <div class="user-profile-about">
         Sem biografia. <a href="">Escreva ela agora</a>.
        </div>
    -->

            <div class="user-statistics mb24" id="statistics">
        <h2>Estatisticas</h2>

                <div class="user-statistics-stats mt16">
                    <div class="stats anime">
                        <h5>Status dos livros</h5>
            <div class="mt12 ml8 mr8 clearfix">
              <ul class="stats-status fl-l">
                <li class="clearfix mb12"><a href="perfil_lendo.php" class="di-ib fl-l lh10 circle book watching">Lendo</a><span class="di-ib fl-r lh10"><?php echo $numLendo; ?></span></li>
                <li class="clearfix mb12"><a href="perfil_completo.php" class="di-ib fl-l lh10 circle book completed">Completo</a><span class="di-ib fl-r lh10"><?php echo $numCompleto; ?></span></li>
                <li class="clearfix mb12"><a href="perfil_onhold.php" class="di-ib fl-l lh10 circle book on_hold">On-Hold</a><span class="di-ib fl-r lh10"><?php echo $numOnHold; ?></span></li>
                <li class="clearfix mb12"><a href="perfil_drop.php" class="di-ib fl-l lh10 circle book dropped">Parou de ler</a><span class="di-ib fl-r lh10"><?php echo $numDrop; ?></span></li>
                <li class="clearfix mb12"><a href="perfil_planeja.php" class="di-ib fl-l lh10 circle book plan_to_watch">Planeja ler</a><span class="di-ib fl-r lh10"><?php echo $numPlaneja; ?></span></li>
              </ul><ul class="stats-data fl-r"><li class="clearfix mb12"><span class="di-ib fl-l fn-grey2">Total de livros</span><span class="di-ib fl-r"> &nbsp;&nbsp; <?php echo $numTotal; ?></span></li>
    
            </ul>            
          </div>
          </div>
                
      </h2>

      <?php
      echo "<br> <br> <h2> ULTIMAS ATUALIZAÇÕES </h2>";
    $result_avaliacao = "SELECT * FROM addlivro WHERE idusuario = $id_usuario ORDER BY date_added DESC";
    $resultado_avaliacao = mysqli_query($conexao,$result_avaliacao);
    $total_avaliacao = mysqli_num_rows($resultado_avaliacao);

    while($rows_avaliacao = mysqli_fetch_assoc($resultado_avaliacao)){

    $id_livros = $rows_avaliacao['idlivros'];


    $result_l = "SELECT * FROM livros WHERE idlivros = $id_livros";
    $resultado_l = mysqli_query($conexao, $result_l);
    $row_l = mysqli_fetch_assoc($resultado_l);

    $query4 = $conexao->query("SELECT * FROM livros DESC LIMIT 5");

    if($query4->num_rows > 0){
      while($row = $query4->fetch_assoc()){
          $imageURL = 'Upload/uploads/'.$row["img"];
      }
    }
  

    $output = '
    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="Upload/uploads/'.$row_l["img"].'" alt="'.$row_l["nomelivro"].'"  width="225" height="225"/>';
  
  
    ?>

    <!-- mostrar avaliacao -->
    
    <div class="row">
      <div class="col-12">
        <div class="media g-mb-30 media-comment">
            <?php echo $output ?>
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php  echo $row_l["nomelivro"];  ?></h5>
                <span class="g-color-gray-dark-v4 g-font-size-70"><?php echo $rows_avaliacao['date_added'];?></span> <br>
                <span class="g-color-gray-dark-v4 g-font-size-20"><?php echo $rows_avaliacao['situacao']; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <?php 
                if ($rows_avaliacao['situacao'] == "Terminei de ler"){ ?>
                <span class="g-color-gray dark-v1 mb-0 g-font-size-70"> Avaliação: <?php echo $rows_avaliacao["avaliacao"]; ?> </h5>
                <?php } ?>
                
            </div>
        
              <p class="comentario">
              <?php echo $rows_avaliacao['comentario']?>
              </p>
            </div>
          </div>
      </div>
      </div>  
      <br><br><br>
    <?php } ?>

    </div>

    </div>
</body>
</html>