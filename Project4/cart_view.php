<?php

require_once("sessions.php");
require_once("connection.php");
require ("header.php");
require_once("functions.php");

$qstr = $_SERVER['QUERY_STRING'];
parse_str($qstr);

?>
<tr><td colspan="2">Shopping Cart Data</td></tr>
<tr>
    <td colspan="2">
        <table border="0" padding="0" cellspacing="0">
            <tr class="trColor">
                <td width="200" class="nvtxt">Item Description</td>
                <td width="200" class="nvtxt">Item Price</td>
                <td width="200" class="nvtxt">Quantity</td>
                <td width="200" class="nvtxt">Item Total</td>
            </tr>
            <?php
            foreach($_SESSION['myCart'] AS $temp) {
                $itmTot = $temp["qty"] * $temp["price"];
                ?>
                <tr>
                    <td><?= $temp["item"] ?></td>
                    <td><?= $temp["price"] ?></td>
                    <td><?= $temp["qty"] ?></td>
                    <td><?= $itmTot ?></td>
                </tr>
            <?php
            }
            ?>
            <tr class="trColor">
                <td colspan="2">&nbsp;</td>
                <td class="nvtxt">Quantity</td>
                <td class="nvtxt">Total</td>
            </tr>
            <tr>
                <td colspan="2" />&nbsp;&nbsp;
                <td><?= $_SESSION['myToti'] ?></td>
                <td><?= $_SESSION['myTotp'] ?></td>
            </tr>
            <tr class="trColor"><td colspan="4">&nbsp;</td></tr>
            <tr>
                <td colspan="4" align="center" height="100">
                    <a href="index.php">Continue Shopping</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
<?php require ("footer.php"); ?>
