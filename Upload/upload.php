<?php
session_start();
ini_set('default_charset', 'UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro de livros</title>
</head>
<body>

<h3>Upload de Imagens com PHP e MySQL</h3>
        <br />
        <h6>Imagens:</h6>
        <br />
        <form action="upload2.php" method="post" enctype="multipart/form-data">
        Livro:<br />
        <input type="text" name="nome" /><br /><br />
        Autor:<br />
        <input type="text" name="autor" /><br /><br />
        Sinopse:<br />
        <input type="text" name="sinopse" /><br /><br />
        Categoria:<br />
        <select name="categoria"><br /><br />
        <option selected="selected" value="0">Selecione uma categoria</option>
        <option value="Romance">Romance</option>
        <option value="Fantasia">Fantasia</option>
        <option value="Horror">Horror</option>
        <option value="Suspense">Suspense</option>
        <option value="Ficcao cientifica">Ficção científica</option>
        <option value="Poesia">Poesia</option>
        </select> <br/> <br>
        Selecione o arquivo: 
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>