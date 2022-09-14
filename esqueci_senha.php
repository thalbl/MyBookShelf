<?php

include 'conexao.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
  <title>MyBookShelf - Esqueci a senha</title>
  <style>

    body{
      height: 650px;
    }

    .wrapper{
      width: 400px;
      height: 400px;
      margin: 100 auto;
    }

  </style>
</head>
<body>
<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Atualizar senha</h3>
                        <form action="" method="POST">
                            <div class="field">
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" type="text" class="input is-large" placeholder="Entre com o seu usuário" required="">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <br>
                                    <input name="email" type="text" class="input is-large" placeholder="Entre com seu email" required="">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Entre com sua nova senha" required="">
                                    <br>
                             </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth" name="submit">Atualizar</button>
                        </form>
                        </div>
                        <?php
		                      if(isset($_POST['submit'])){
                            $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
			                      if(mysqli_query($conexao,"UPDATE usuario SET senha='$senha' WHERE usuario='$_POST[usuario]' AND email='$_POST[email]' ;")){
                            ?>
					                <script type="text/javascript">
                alert("Senha atualizada com sucesso.");
              </script> <?php
              }
            }
            ?>
                </div>
            </div>
        </div>
  </section>
  <?php
   
  ?>
</body>
