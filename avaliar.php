<?php
session_start();
include_once('livros/inc/conexao.php');  

$id_livro = $_GET['id_livro'];
$status = $_POST['myinfo_status'];
$privacidade = $_POST['privacy-user'];
$nome = $_SESSION['nome'];
  $query1 = "select * from usuario where nome='{$nome}'";

  $result = mysqli_query($conn, $query1);
  
  $row = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $id_usuario = $row['idusuario'];
  }

  $sql = "select count(*) as total from addlivro where idlivros = '$id_livro' and idusuario = '$id_usuario'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($row['total']==1){
    if ($status == 1){
      $status = "Lendo";
      $sql1 =  $conn->query("UPDATE addlivro SET situacao = '$status', avaliacao = NULL, comentario = NULL, privacidade = $privacidade, date_added = NOW() WHERE idlivros = '$id_livro' and idusuario = '$id_usuario'");
    }
    else if($status == 2){
      $avaliacao = $_POST['myinfo_score'];
      $status = "Terminei de ler";
      $sql1 =  $conn->query("UPDATE addlivro SET situacao = '$status', avaliacao = '$avaliacao', comentario = NULL, privacidade = $privacidade, date_added = NOW() WHERE idlivros = '$id_livro' and idusuario = '$id_usuario'");
    }
    else if ($status == 3){
      $status = "On-Hold";
      $sql1 =  $conn->query("UPDATE addlivro SET situacao = '$status', avaliacao = NULL, comentario = NULL, privacidade = $privacidade, date_added = NOW() WHERE idlivros = '$id_livro' and idusuario = '$id_usuario'");
    }
    else if($status == 4){
      $comentario = $_POST['commentText'];
      $status = "Não quis mais ler";
      $sql1 = $conn->query("UPDATE addlivro SET situacao = '$status',  avaliacao = NULL, comentario = '$comentario', privacidade = $privacidade, date_added = NOW() WHERE idlivros = '$id_livro' and idusuario = '$id_usuario'");
    }
    else{
      $status = "Planejo ler";
      $sql1 =  $conn->query("UPDATE addlivro SET situacao = '$status', avaliacao = NULL, comentario = NULL, privacidade = $privacidade, date_added = NOW() WHERE idlivros = '$id_livro' and idusuario = '$id_usuario'");
    }

  }else {
  if ($status == 1){
    $status = "Lendo";
    $sql1 =  $conn->query("INSERT INTO addlivro(idusuario, idlivros, situacao, privacidade, date_added) VALUES ('$id_usuario', '$id_livro', '$status', '$privacidade', NOW())");
  }
  else if($status == 2){
    $avaliacao = $_POST['myinfo_score'];
    $comentario = $_POST['commentText1'];
    $status = "Terminei de ler";
    $sql1 =  $conn->query("INSERT INTO addlivro(idusuario, idlivros, situacao, avaliacao, comentario, privacidade, date_added) VALUES ('$id_usuario', '$id_livro', '$status', '$avaliacao', '$comentario', '$privacidade', NOW())");
  }
  else if ($status == 3){
    $status = "On-Hold";
    $sql1 =  $conn->query("INSERT INTO addlivro(idusuario, idlivros, situacao, privacidade, date_added) VALUES ('$id_usuario', '$id_livro', '$status', '$privacidade', NOW())");
  }
  else if($status == 4){
    $comentario = $_POST['commentText'];
    $status = "Não quis mais ler";
    $sql1 = $conn->query("INSERT INTO addlivro(idusuario, idlivros, situacao, comentario, privacidade, date_added) VALUES ('$id_usuario', '$id_livro', '$status', '$comentario', '$privacidade', NOW())");
  }
  else{
    $status = "Planejo ler";
    $sql1 =  $conn->query("INSERT INTO addlivro(idusuario, idlivros, situacao, privacidade, date_added) VALUES ('$id_usuario', '$id_livro', '$status', '$privacidade', NOW())");
  }
}
?>