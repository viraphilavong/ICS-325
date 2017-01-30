<?php
session_start();
require_once("connection.php");
include ("header.php");
require_once("cartfunctions.php");


$qstr = $_SERVER['QUERY_STRING'];
parse_str($qstr);

//Delete Item
if ( isset($_GET['delete']) )
{
    $ctr = $_GET['delete'];
    echo $_SESSION['myCart']["qty"];
    //echo $_SESSION['myCart'][$ctr];
    $_SESSION['myToti'] -= $_SESSION['myCart'][$ctr]["qty"];
    $_SESSION['myTotp'] -= (($_SESSION['myCart'][$ctr]["qty"]) * ($_SESSION['myCart'][$ctr]["price"]));
    unset($_SESSION['myCart'][$ctr]);
}

//Empty Cart
if ( isset($_GET['reset']) )
{
    if ($_GET["reset"] == 'true')
    {
        unset($_SESSION['myCart']);
        $_SESSION['myToti']=0;
        $_SESSION['myTotp']=0;
    }
}
?>

<style type="text/css">
    table { border-spacing:0;}
    td.nvtxt {color:#FFFFFF; font-size:14px; font-weight:300; font-family:Comic Sans MS}
    tr.trColor{background-color: #161ecc}
</style>


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

<br />

<tr><td colspan="2"><h1>Your Shopping Cart</h1></td></tr>
<tr>
    <td colspan="2">
        <table border="0" cellspacing="0">

            <tr>
                <td colspan="4" height="100">
                    <input type="button" value="Continue Shopping" onclick="window.location='index.php'">
                </td>
            </tr>
            <tr class="trColor">
                <td width="100" class="nvtxt">Product ID</td>
                <td width="200" class="nvtxt">Item Description</td>
                <td width="200" class="nvtxt">Item Price</td>
                <td width="100" class="nvtxt">Quantity</td>
                <td width="200" class="nvtxt">Item Total</td>
                <td width="200" class="nvtxt">Action</td>
            </tr>
            <?php
            $array_ctr = -1;
            foreach($_SESSION['myCart'] AS $temp)
                {
                    $itmTot = $temp["qty"] * $temp["price"];
                    $array_ctr=$array_ctr + 1;
            ?>
                    <tr>
                        <td><?= $temp["pid"] ?></td>
                        <td><?= $temp["item"] ?></td>
                        <td><?= $temp["price"] ?></td>
                        <td><?= $temp["qty"] ?></td>
                        <td><?= $itmTot ?></td>
                        <!--<td><a href="cart_remove_one_item.php"<?php echo $array_ctr; ?>>Delete Item</td>-->
                        <td><a href="cart_view.php?delete=<?php echo $array_ctr; ?>">Delete Item</td>
                    </tr>
            <?php
                }
            ?>
            <tr class="trColor">
                <td colspan="2">&nbsp;</td>
                <td class="nvtxt">Total Items</td>
                <td class="nvtxt">Total Price</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;</td>
                <td><?= $_SESSION['myToti'] ?></td>
                <td><?= $_SESSION['myTotp'] ?></td>
            </tr>
            <tr class="trColor"><td colspan="4">&nbsp;</td></tr>
            <tr><td><br /></td></tr>
            <tr><td colspan="5" align="right"><a href='cart_remove_all_items.php'><button>Clear Cart</button></a>
                    &nbsp &nbsp
                    <input type="button" value="Place Order" onclick="window.location='billing.php'"></td></tr>
        </table>
    </td>
</tr>

<?php require ("footer.php"); ?>
