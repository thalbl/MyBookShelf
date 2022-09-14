<?php 
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include_once('livros/inc/conexao.php');  
include('header.php');
$id_livro = $_GET['id_livro'];
$result_livros = "SELECT * FROM livros WHERE idlivros='$id_livro'";
$resultado_livro = mysqli_query($conn, $result_livros);
$row_livros = mysqli_fetch_assoc($resultado_livro);

$query = $conn->query("SELECT * FROM livros ORDER BY date_added DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'Upload/uploads/'.$row["img"];
    }
  }

  $nome = $_SESSION['nome'];

  $query1 = "select * from usuario where nome='{$nome}'";

  $result = mysqli_query($conn, $query1);
  
  $row = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $id_usuario = $row['idusuario'];
  }

  $query = "SELECT ROUND(AVG(avaliacao), 1) as numRating FROM addlivro WHERE idlivros = $id_livro";
  $avgresult = mysqli_query($conn, $query);
  $fetchAverage = mysqli_fetch_array($avgresult);
  $numRating = $fetchAverage['numRating'];

  if($numRating <= 0){
      $numRating = "Sem avaliações";
  }
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>

    html, body {
  height: 100%;
  width: 100%;
  margin: 0;
  font-family: 'Roboto', sans-serif;
}
 
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}
.left-column {
  width: 65%;
  position: relative;
}
 
.right-column {
  width: 35%;
  margin-top: 60px;
}
.left-column img {
}
 
.left-column img.active {
  opacity: 1;
}
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
.product-color {
  margin-bottom: 30px;
}
 
.color-choose div {
  display: inline-block;
}
 
.color-choose input[type=&amp;quot;radio&amp;quot;] {
  display: none;
}
 
.color-choose input[type=&amp;quot;radio&amp;quot;] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
}
 
.color-choose input[type=&amp;quot;radio&amp;quot;] + label span {
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
}
 
.color-choose input[type=&amp;quot;radio&amp;quot;]#red + label span {
  background-color: #C91524;
}
.color-choose input[type=&amp;quot;radio&amp;quot;]#blue + label span {
  background-color: #314780;
}
.color-choose input[type=&amp;quot;radio&amp;quot;]#black + label span {
  background-color: #323232;
}
 
.color-choose input[type=&amp;quot;radio&amp;quot;]:checked + label span {
  background-image: url(images/check-icn.svg);
  background-repeat: no-repeat;
  background-position: center;
}
/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}
 
.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}
/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}
 
.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}

.btn-user-status-add-list {
    background-color: #4f74c8;
    border: #4f74c8 1px solid;
    border-radius: 4px;
    color: #fff!important;
    cursor: pointer;
    display: inline-block;
    font-family: Avenir,lucida grande,tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    line-height: 1.0em;
    margin: 0 auto;
    opacity: 1;
    padding: 6px 12px 6px 24px;
    position: relative;
    text-align: left;
    text-decoration: none!important;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
    vertical-align: middle;
}.product-configuration .form-user-score {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    background-position: 8px 4px,118px 8px;
    background-repeat: no-repeat,no-repeat;
    background-size: 14px 13px,10px auto;
    border: #bebebe 1px solid;
    border-radius: 4px;
    color: #2e51a2;
    cursor: pointer;
    display: inline-block;
    font-family: Avenir,lucida grande,tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0 auto;
    opacity: 1;
    padding: 4px 8px 4px 26px;
    text-align: left;
    text-decoration: none;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
    vertical-align: middle;
    width: 138px;
}.product-configuration .form-user-status {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url(/images/icon-triangles-select.png?v=1634263200);
    background-position: 80px 8px;
    background-repeat: no-repeat;
    background-size: 10px auto;
    border: #4f74c8 1px solid;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    font-family: Avenir,lucida grande,tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0 auto;
    opacity: 1;
    padding: 4px 8px;
    text-align: left;
    text-decoration: none;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
    vertical-align: middle;
    width: 100px;
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <title>MyBookShelf.net - <?php echo $row_cursos['nomelivro']; ?> </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</head>
<body>
  <br><br><br><br><br><br><br><br><br><br><br><br>

  <!-- Right Column -->
<main class="container">
 
  <div class="left-column">
    <?php
      $output = '
      <img src="Upload/uploads/'.$row_livros["img"].'" alt="'.$row_livros["nomelivro"].'" />';
      echo $output;
    ?>
  </div>
 
 
  <!-- Right Column -->
  <form action="avaliar.php?id_livro=<?php echo $row_livros['idlivros'];?>" method="POST" class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span>Livros</span>
        <h1><?php echo $row_livros['nomelivro'];?></h1>
        <h2><?php echo $row_livros['autorlivro'];?></h2>
        <h3><?php echo $row_livros['categoria'];?></h3>
        <p><?php echo $row_livros['sinopse'];?></p>
        Avaliação : <span id='numeric_rating_<?php echo $id_livro; ?>'><?php echo $numRating; ?></span>      
    </div>
 
    <div class="product-configuration">
      <tr>
        <td>
        </td>
        </tr>
          <div class="livros-detalhes">


            <?php 
              if(isset($_SESSION['nome'])){
            ?>

            <div class=avaliacao-usuario-block js-user-status-block fn-grey6 clearfix al mt8 po-r">
              <input type="hidden" id="myinfo_livro_id" value="<?php echo $id_livro;?>">
              <button type="submit" id="myinfo_status" class="btn-user-status-add-list js-form-user-status js-form-user-status-btn  myinfo_addtolist" data-value="1" data-class="watching">Adicionar a lista</button>
              <select name= "myinfo_status" id="myinfo_status_select" class="form-user-status js-form-user-status myinfo_updateInfo" onchange="mostraCampo(this)">
                <option selected="selected" value="1">Lendo</option>
                <option value="2">Terminei de ler</option>
                <option value="3">On-Hold</option>
                <option value="4">Parei de ler</option>
                <option value="5">Planejo ler</option>
              </select>
            
              <select name="myinfo_score" id="myinfo_score" class="form-user-score js-form-user-score m18" style="display: none;">
                <option selected="selected" value="0">Avalie</option>
                <option value="5">(5) Excelente</option>
              <option value="4">(4) Bom</option>
            <option value="3">(3) Mediano</option>
            <option value="2">(2) Ruim</option>
            <option value="1">(1) Terrível</option>
        </select>

        <select name= "privacy-user" id="myinfo_status_privacy" class="form-user-status js-form-user-status myinfo_updateInfo">
                <option value="0">Quem pode ver sua avaliação?</option>
                <option value="1">Publico</option>
                <option value="2">Privado</option>
        </select>
          

      <div class="user-comments mt24 pt24" id="lastcomment" style="display: none;">
        <h2 id="reason">
             Por que deixou de ler?
        </h2>

        <div class="comment-form mt12 mb24">
            <form name="UserComment">
              <textarea class="textarea" cols="60" name="commentText" rows="7" placeholder="Por que deixou de ler" style="width:786px;"></textarea>
              <input name="profileMemId" type="hidden" value="13459525">
              <input name="profileUsername" type="hidden" value="ThalBL">
            </form>
        </div>
      </div>


    </div>
    <script>
function mostraCampo(that) 
{
    if (that.value == "2") 
    {
        document.getElementById("myinfo_score").style.display = "inline-block";
    }
    else
    {
        document.getElementById("myinfo_score").style.display = "none";
    }
    if (that.value == "4")
    { 
        document.getElementById("lastcomment").style.display = "block";
    }
    else
    {
        document.getElementById("lastcomment").style.display = "none";
    }
}
      </script>
    <?php
          }
      else {
    ?>
    Faça login para adicionar o livro em sua lista
    <?php
    }
      echo "<br> <br> <h2> ULTIMAS ATUALIZAÇÕES </h2>";
    $result_avaliacao = "SELECT * FROM addlivro WHERE idlivros = $id_livro AND privacidade = 1";
    $resultado_avaliacao = mysqli_query($conn,$result_avaliacao);
    $total_avaliacao = mysqli_num_rows($resultado_avaliacao);

    while($rows_avaliacao = mysqli_fetch_assoc($resultado_avaliacao)){

    $id_usuario = $rows_avaliacao['idusuario'];


    $result_usuario = "SELECT * FROM usuario WHERE idusuario = $id_usuario";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);

    $query3 = $conn->query("SELECT * FROM usuario ORDER BY data_cadastro DESC");

    if($query3->num_rows > 0){
      while($row = $query3->fetch_assoc()){
          $imageURL = 'Upload/uploads/'.$row["img_usuario"];
      }
    }
  

    $output = '
    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="Upload/user-upload/'.$row_usuario["img_usuario"].'" alt="'.$row_usuario["nome"].'"  width="225" height="225"/>';
  
  
    ?>

    <!-- mostrar avaliacao -->
    
    <div class="row">
      <div class="col-12">
        <div class="media g-mb-30 media-comment">
            <?php echo $output ?>
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php  echo $row_usuario["nome"];  ?></h5>
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
  
  </form>
</main>
</body>
</html>     