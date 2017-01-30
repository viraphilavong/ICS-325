<?php

require_once("sessions.php");
require_once("connection.php");
require ("header.php");
require_once("functions.php");

$item = $_POST['item'];
$price = $_POST['price'];
$qty = $_POST['qty'];

$_SESSION['myCart'][] = array("item"=>$item,"qty"=>$qty,"price"=>$price);
$_SESSION['myToti'] = $_SESSION['myToti'] + $qty;
$_SESSION['myTotp'] = $_SESSION['myTotp'] + ($price * $qty);

header("Location:cart_view.php");
?>