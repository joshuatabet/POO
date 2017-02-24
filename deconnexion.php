<?php
session_start();
unset($_SESSION['uniqid']);
header('Location: index.php');
?>
