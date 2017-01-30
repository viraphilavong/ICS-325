<?php
session_start();
require_once("connection.php");
require_once("functions.php");
require ("header.php");

$date = $_GET['date'];
$oid = $_GET['oid'];
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

<div id="main">
    <br />

    <?php
    $cid = $_SESSION['cid'];

    //query of the category table
    $query = "SELECT * ";
    $query .= "FROM orderitems ";
    $query .= "WHERE oid='$oid' ";
    $result = $dbcn->query($query);

    //create table
    echo "<table align='left' border='1'>
        <tr>
            <th>Order Number</th>
            <th>Items</th>    
            <th>Quantity</th>  
            <th>Price</th>  
        </tr>";

    //fetch results and insert into table with links
    while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td align='center'>" . $row['oid'] . "</td>";
            echo "<td align='center'>" . $row['item'] . "</td>";
            echo "<td align='center'>" . $row['quantity'] . "</td>";
            echo "<td align='center'>" . $row['price'] . "</td>";
            echo "</tr>";
        }
    echo "</table>";

    mysqli_close($dbcn);
    ?>



</div>
