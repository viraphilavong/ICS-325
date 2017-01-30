<?php
require_once("sessions.php");
require_once("connection.php");
require ("header.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Movies Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <a href="index.php">Return to Main Page</a>
</div>
<?php
$result = mysqli_query($dbcn,"SELECT * FROM product WHERE category = 'Movies' ");
echo "<table align='center'>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . "<img src=uploads/".$row["filename"] .
        " width=80 height=80 /></a><p />" . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($dbcn);
?>

<?php require ("footer.php"); ?>
</body>
</html>