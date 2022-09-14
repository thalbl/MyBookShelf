<?php
session_start();
session_destroy();
header('Location: mybookshelf.php');
exit();