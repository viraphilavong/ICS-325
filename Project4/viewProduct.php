<?php
require_once("sessions.php");
require_once("connection.php");
require ("header.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Product Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
    $result = mysqli_query($dbcn,"SELECT * FROM product");
    echo "<table align='center' border='1'>
        <tr>        
            <th>Product Image</th>
            <th>Product Category</th>
            <th>Product Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>";

    while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . "<img src=uploads/".$row["filename"] .
                " width=80 height=80 /></a><p />" . "</td>";

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

<?php require ("footer.php"); ?>
</body>
</html>