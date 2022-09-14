<?php
session_start();
include_once("conexao.php");

$nome = $_SESSION['nome'];

$query1 = "select * from usuario where nome='{$nome}'";

$result = mysqli_query($conexao, $query1);

$row = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)){
  $id_usuario = $row['idusuario'];
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE usuario SET nome='$nome', email='$email', usuario='$usuario' WHERE idusuario='$id_usuario'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

if(mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: painel.php");
	$_SESSION['nome'] = $usuario_bd['nome'];
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit_usuario.php");
}
?>
