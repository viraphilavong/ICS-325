<?php

require_once("sessions.php");
require_once("connection.php");
require ("header.php");
require_once("functions.php");

$qstr = $_SERVER['QUERY_STRING'];
parse_str($qstr);

?>

<tr>
    <td colspan='2'>
        Shopping Cart Data
    </td>
</tr>

<tr>
    <td colspan="2">
        <table border="0" padding="0" cellspacing="0">
            <form action="cart_update.php" method="post" name="myForm">
                <tr class="trColor">
                    <td width="200" class="nvtxt">Item Description</td>
                    <td width="100" class="nvtxt">Item Price</td>
                    <td width="100" class="nvtxt">Quantity</td>
                </tr>
                <tr height="100">
                    <td><?= $item ?></td>
                    <td>$<?= $price ?></td>
                    <td>
                        <select name="qty">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                    <input type="hidden" name="item" value="<?= $item ?>">
                    <input type="hidden" name="price" value="<?= $price ?>">
                </tr>
                <tr class="trColor"><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td colspan="3" align="center" height="100">
                        <a href="index.php">Continue Shopping</a>
                        <a href="javascript:void(0)"
                           onclick="document.myForm.submit();">Update Cart</a>
                    </td>
                </tr>
            </form>
        </table>
    </td>
</tr>

<?php require ("footer.php"); ?>