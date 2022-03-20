<?php

session_start();
unset($_SESSION["username"]);
$_SESSION["flag"]=0;
header('location:index.php');

?>