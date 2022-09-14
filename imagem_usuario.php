<?php 
session_start();
include_once('livros/inc/conexao.php');  
include('header.php');

$nome = $_SESSION['nome'];

  $query1 = "select * from usuario where nome='{$nome}'";

  $result = mysqli_query($conn, $query1);
  
  $row = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $id_usuario = $row['idusuario'];
  }

$targetDir = "Upload/user-upload/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("UPDATE usuario SET img_usuario='$fileName' WHERE idusuario= '$id_usuario'");
            if($insert){
                $statusMsg = "O arquivo ".$fileName. " foi upado com sucesso.";
            }else{
                $statusMsg = "O upload do arquivo falhou, tente novamente.";
            } 
        }else{
            $statusMsg = "Desculpa, houve um erro ao upar seu arquivo.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>