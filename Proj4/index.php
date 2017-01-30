
<?php require_once("sessions.php"); ?>
<?php require_once("connection.php"); ?>
<?php echo date(" l, F j, Y"); ?>
<?php require ("header.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <h3>Products</h3>
    <?php
    $query = "SELECT category FROM product ";
    $result = $dbcn->query($query);

    while($row = $result->fetch_assoc()) {
        echo $row['category'] . '<br>';
    }
    ?>

    <br /><br /><br />
</div>

<img src="uc.jpg" height="600" width="600" align="middle">
<?php
require("footer.php");
?>
</body>
</html>

