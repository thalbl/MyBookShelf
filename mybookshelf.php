<?php
  session_start();
	include_once("conexao.php");
  include('header.php');
  function make_query($conexao)
  {
   $query = "SELECT * FROM livros ORDER BY idlivros DESC";
   $result = mysqli_query($conexao, $query);
   return $result;
  }
  
  function make_slide_indicators($conexao)
  {
   $output = ''; 
   $count = 0;
   $result = make_query($conexao);
   while($row = mysqli_fetch_array($result))
   {
    if($count == 0)
    {
     $output .= '
     <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
     ';
    }
    else
    {
     $output .= '
     <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
     ';
    }
    $count = $count + 1;
   }
   return $output;
  }

  function make_slides($conexao)
  {
   $output = '';
   $count = 0;
   $result = make_query($conexao);
   while($row = $result->fetch_assoc())
   {
    if($count == 0)
    {
     $output .= '<div class="item active">';
    }
    else
    {
     $output .= '<div class="item">';
    }
    $output .= '
    <img src="Upload/uploads/'.$row["img"].'" alt="'.$row["nomelivro"].'" />
    <div class="carousel-caption">
    <a href="detalhes_livro.php?id_livro='.$row["idlivros"].'"><h3>'.$row["nomelivro"].'</h3></a>
    </div>
    </div>
    ';
    $count = $count + 1;
   }
   return $output;
  }
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
    <title>MyBookShelf.net</title>

    <style>
    .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    object-fit: none;
    object-position: center;
    width: 100%;
    max-height: 400px
;}.page-common a, .page-common a:visited {
    color: #ffffff;
    text-decoration: none;
}
  }

    </style>
</head>
<br> <br> <br> <br> <br> <br> <br> 
  <div id="body">
  <div class = "page-common">
  <div class="container">
   <h2 align="center"></h2>
   <br />
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($conexao); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($conexao); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>        
  </div>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>      
</div>        
    
</html> 