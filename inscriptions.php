<?php


session_start();

include('config/config.php');
include('functions/functions.fn.php');

$confirm = userRegistration($db, $_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['pass'], $_POST['descriptif']);


if($confirm == true){
    header('Location: index.php');
}else {
    header('Location: inscriptionerror.php');
}

?>