<?Php
session_start();
require_once("functions.php");
?>

<html>

<head>
    <title>Session Cart Remove all Items</title>
</head>

<body>
<?Php

while (list ($key, $val) = each ($_SESSION['myCart']))
    {
        //echo "$key -> $val <br>";
        unset($_SESSION['myCart'][$key]);
    }
       $_SESSION['myToti']=0;
        $_SESSION['myTotp']=0;

echo "Number of Items in the cart = ".sizeof($_SESSION['myCart'])." <br>";

redirect_to('cart_view.php');
?>
</body>
</html>