<?php
    session_start();
    require_once("connection.php");
    echo date(" l, F j, Y");
    require ("header.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Product Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <a href="admin.php">Return to Admin Page</a>
</div>
<?php
    $result = mysqli_query($dbcn,"SELECT * FROM product");
    echo "<table align='center' border='1'>
    <tr>
        <th>Product Category</th>
        <th>Product Name</th>
        <th>Cost</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['cost'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

mysqli_close($dbcn);
?>

<?php
require ("footer.php");
?>
</body>
</html>