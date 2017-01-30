<?php
session_start();
require_once("connection.php");
require ("header.php");
require_once("functions.php");

$pid = $_POST['pid'];
$item = $_POST['item'];
$price = $_POST['price'];
$qty = $_POST['qty'];

//obtain Product information from Query and assign to variables
$query = "SELECT * FROM product ";
$query .= "WHERE pid = '$pid' ";

$result = $dbcn->query( $query );
$data = $result->fetch_array();
echo $data['quantity'];

if(!$result)
{
    echo( "<p>Unable to query database at this time.</p>" );
    exit();
}
confirm_query($result);

if ($data['quantity'] >= $qty) {
    $_SESSION['myCart'][] = array("pid" => $pid, "item" => $item, "qty" => $qty, "price" => $price);
    $_SESSION['myToti'] = $_SESSION['myToti'] + $qty;
    $_SESSION['myTotp'] = $_SESSION['myTotp'] + ($price * $qty);
} else {
    $errors = array();
    $errors[] = 'The quantity you requested is not available, please choose a lesser amount.';
    $_SESSION['errors'] = $errors;
    redirect_to("cart.php?item=$item&price=$price&pid=$pid'");
    exit;
}

redirect_to("cart_view.php");
?>