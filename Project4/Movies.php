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
<?php
echo "<table border='0' align='left' cellspacing='3' cellpadding='3'>";
$result = mysqli_query($dbcn,"SELECT * FROM product WHERE category = 'Movies' ");

    echo "<tr>";
    $cell_ctr = 0;
        while($row = mysqli_fetch_array($result))
            {
                if (($cell_ctr % 2) == 0)  //two is the number of columns
                    {
                        echo "</tr>";
                        echo "<tr>";
                        $cell_ctr = 0;
                    }
                echo "<td>" . $row['title'] . "<br />" . "Price: " . $row['price'] . "<td>";
                echo "<td>" . "<a href=".$row["link"].">" . "<img src=uploads/".$row["filename"] . " width=80 height=80 /></a><p />" . "</td>";
                $cell_ctr++;
            }
    if($cell_ctr == 1) {
            echo '<td></td>';
            echo "</tr>";
        } else if ($cell_ctr == 2) {
            echo "</tr>";
        }
    echo "</table>";
//free the result set
mysqli_free_result($result);
//close the database
mysqli_close($dbcn);
?>
<?php require ("footer.php"); ?>
</body>
</html>