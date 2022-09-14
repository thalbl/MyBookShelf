<?php
session_start();
if(!$_SESSION['nome']) {
	header('Location: mybookshelf.php');
	exit();
}