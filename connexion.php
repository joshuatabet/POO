<?php

session_start();

include('config/config.php');
include('functions/functions.fn.php');

$user = userConnect($db, $_POST['pseudo'], $_POST['pass']);



if($user == true){
    header('Location: index.php');
}else {
    header('Location: index.php');
}

?>
