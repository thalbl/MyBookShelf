<?php
// Include the database configuration file
include 'conexao.php';
ini_set('default_charset', 'UTF-8');
$statusMsg = '';

// File upload path
$nome = $_POST['nome'];
$autor = $_POST['autor'];
$sinopse = $_POST['sinopse'];
$categoria = $_POST['categoria'];

$targetDir = "uploads/";
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
            $insert = $conexao->query("INSERT INTO livros (nomelivro, sinopse, img, autorlivro, categoria) 
    VALUES ('".$nome."', '".$sinopse."', '".$fileName."', '".$autor."', '".$categoria."')");
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
