<?php
function clear_cart()
    {
        while (list ($key, $val) = each ($_SESSION['myCart']))
            {
                unset($_SESSION['myCart'][$key]);
            }
        $_SESSION['myToti']=0;
        $_SESSION['myTotp']=0;

        //echo "Number of Items in the cart = ".sizeof($_SESSION['myCart'])." <br>";

        redirect_to('cart_view.php');

    }

?>
