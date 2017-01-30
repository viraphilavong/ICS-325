<?Php
session_start();
require_once("functions.php");
?>

<html>

<head>
    <title>Session Cart Remove one Items</title>
</head>

<body>
<?Php
    $item = $_GET['item'];
    $price = $_GET['price'];
    $qty = $_GET['qty'];

    $ctr = $_GET['delete'];
    echo $_SESSION['myCart']["qty"];
    //echo $_SESSION['myCart'][$ctr];
    $_SESSION['myToti'] -= $_SESSION['myCart'][$ctr]["qty"];
    $_SESSION['myTotp'] -= (($_SESSION['myCart'][$ctr]["qty"]) * ($_SESSION['myCart'][$ctr]["price"]));
    unset($_SESSION['myCart'][$ctr]);

redirect_to('cart_view.php');
?>
</body>
</html>