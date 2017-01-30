<?php
session_start();
require_once("connection.php");
require_once("functions.php");
require ("header.php");
?>
<?php
if (isset($_POST['submit']))
{
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $address=$_REQUEST['address'];
    $phone=$_REQUEST['phone'];
    $totalprice=$_SESSION['myTotp'];
    $uid=$_SESSION["uid"];

    //$result=mysql_query("insert into customers values('','$name','$email','$address','$phone')");
    //$customerid=mysql_insert_id();

    //insert into orders table
    $date=date('Y-m-d');
    $query1 ="INSERT INTO orders ";
    $query1 .= "(cid, amount, date) ";
    $query1 .= "VALUES ('$uid', '$totalprice', '$date') ";
    $dbcn->query($query1);
    $oid=mysqli_insert_id($dbcn);

    $max=count($_SESSION['myCart']);
    for($i=0;$i<$max;$i++){
        $pid=$_SESSION['myCart'][$i]['pid'];
        $item=$_SESSION['myCart'][$i]['item'];
        $qty=$_SESSION['myCart'][$i]['qty'];
        $price=$_SESSION['myCart'][$i]['price'];

        $query2 ="INSERT INTO orderitems ";
        $query2 .= "(oid, pid, item, quantity, price) ";
        $query2 .= "VALUES ('$oid', '$pid', '$item', '$qty', '$price') ";
        $dbcn->query($query2);

        $query3 = "UPDATE product ";
        $query3 .= "SET quantity = (quantity - $qty ) ";
        $query3 .= "WHERE pid = $pid";
        $dbcn->query($query3);
    }
    unset ($_SESSION['myCart']);
    unset ($_SESSION['myTotp']);
    unset ($_SESSION['myToti']);
    redirect_to('index.php');

}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Confirmation Page</title>
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

<form action="<? $_SERVER['PHP_SELF'] ?>"  name="myForm" method="post">
    <?php
        echo $_SESSION['name'] . ", <br /><br />" . "&nbsp &nbsp Thank you for your interest in our company and placing an order. <br />Your order total was
         " . $_SESSION['myTotp'] . ".<br /><br />" . "  Press enter to continue and your purchased will be processed.<br /><br />"
    ?>

    <input align="center" type="submit" name="submit" value="Enter" />
</form>

</body>

<?php require ("footer.php"); ?>

</html>
