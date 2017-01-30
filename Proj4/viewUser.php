<?php
session_start();
require_once("connection.php");
echo date(" l, F j, Y");
require ("header.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View User Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <a href="admin.php">Return to Admin Page</a>
</div>
<?php

$result = mysqli_query($dbcn,"SELECT * FROM users");
echo "<table align='center' border='1'>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Email</th>
    </tr>";

while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['zip'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
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