<?php
//This is for view all orders for a customer
require_once("sessions.php");
require_once("connection.php");
require ("header.php");
require_once("functions.php");

if (@!$_SESSION["loggedIn"]) 
    {
        redirect_to("login.php");
        exit;
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View My Orders</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
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
<?php
$uid = $_SESSION['uid'];

//query of the category table
$query = "SELECT * ";
$query .= "FROM orders ";
$query .= "WHERE cid = $uid";
$Order_set = $dbcn->query($query);
confirm_query($Order_set);

//create table
echo "<table align='left' border='1'>
        <tr>
            <th>Order Number</th>
            <th>Date Ordered</th>            
        </tr>";

//fetch results and insert into table with links
while ($row = mysqli_fetch_array($Order_set))
    {
        echo "<tr>";
        echo "<td align='center'>" . $row['oid'] . "</td>";
        echo "<td>" . "<a href = orders.php?oid=$row[oid]&date=$row[date]" . ">" .$row['date'] . "</a><br>" . "</td>";
        echo "</tr>";
    }
echo "</table>";

mysqli_close($dbcn);
?>

<?php require ("footer.php"); ?>
</body>
</html>