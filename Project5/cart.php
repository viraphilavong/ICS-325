<?php
session_start();
require_once("connection.php");
require ("header.php");
require_once("functions.php");

$qstr = $_SERVER['QUERY_STRING'];
parse_str($qstr);

?>
<!-- START OF LEFT COLUMN -->
<div id="left_col">
    <h3>Products</h3>

    <?php
    //query of the category table
    $query = "SELECT * FROM category ";
    $result = $dbcn->query($query);
    //uses results of the query to fill the product line and links
    while($row = $result->fetch_assoc())
    {
        echo "<a href=".$row['category'] . ".php" . ">" .$row['category'] . "</a><br>";
    }
    ?>

    <!--Used to view individual orders-->
    <?php if ($_SESSION["loggedIn"]){ ?>
        <br />
        <a href="view_my_orders.php">View My Orders</a><br />
        <br />
    <?php } ?>

    <!--Used to allow only admin users to return to admin page-->
    <?php if (@$_SESSION['adminFlag'] == 1) { ?>
        <br />
        <a href="admin.php">Admin Menu</a><br />
        <br />
    <?php } ?>

</div>
<!-- END OF LEFT COLUMN -->
<?php
If (isset($_SESSION['errors']))
    {
        $errors = $_SESSION['errors'];
        if (!empty($errors[0]))
            {
                echo "<p style=\"color:red;\">" . "$errors[0] <br />";
                unset($_SESSION['errors']);
            }
    }
?>
<br />
    <form action="cart_update.php" method="post" name="myForm">
        <table border="0" cellspacing="0">

            <tr>
                <td colspan='2'>
                    <h1>Shopping Cart Data</h1><br />
                </td>
            </tr>
            <tr>
                <td colspan="4" align="left" height="100">
                    <input type="button" value="Continue Shopping" onclick="window.location='index.php'">
                </td>
            </tr>
<!--<tr>
    <td colspan="2">-->
            <tr class="trColor">
                <td width="100" class="nvtxt">Product ID Number</td>
                <td width="200" class="nvtxt">Item Description</td>
                <td width="100" class="nvtxt">Item Price</td>
                <td width="100" class="nvtxt">Quantity</td>
            </tr>
            <tr>
                <td height="50"><?= $pid ?></td>
                <td height="50"><?= $item ?></td>
                <td height="50">$<?= $price ?></td>
                <td height="50">
                    <select name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <input type="hidden" name="pid" value="<?= $pid ?>">
                <input type="hidden" name="item" value="<?= $item ?>">
                <input type="hidden" name="price" value="<?= $price ?>">
            </tr>
            <tr class="trColor"><td colspan="3">&nbsp;</td></tr>
            <tr>
                <td colspan="3" align="center" height="100">
                    <a href="javascript:void(0)" onclick="document.myForm.submit();"><button>Update Cart</button></a>
                </td>
            </tr>

        </table>
    </form>
<!--    </td>
</tr>-->

<?php require ("footer.php"); ?>