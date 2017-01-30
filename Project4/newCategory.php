<?php
require_once("sessions.php");
require_once("connection.php");
require ("header.php");
require_once("functions.php");


//NEW CATEGORY PROCESSING
// Only execute if New Category Button is selected.
if (isset($_POST['submit']))
    {

        $Category = trim($_POST['category']);
        $Title = trim($_POST['title']);
        $Cost = trim($_POST['cost']);
        $Price = trim($_POST['price']);
        $Quantity = trim($_POST['quantity']);

        //MySqli Update Query
        $query = "INSERT INTO category ";
        $query .= "(category) VALUES ('$Category')";

        if ($dbcn->query($query) === TRUE)
            {
                echo "New category record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $dbcn->error;
            }

    }
//END NEW CATEGORY PROCESSING

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New Product Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="page">

    <form method="post" action="<? $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <fieldset>
            <legend>New Category</legend>
            <ul>
                <li>
                    <label for="category">Category or Department *</label>
                    <input type="text" name="category" id="category" value="" required />
                </li>
            </ul>

            <input type="submit" name="submit" value="Add Category" style="height:1.90em; width:8em;" />

        </fieldset>
    </form>
    
    <?php if (!empty($message)) {echo "<b><p class=\"message\">" . $message . "</p></b>";} ?>
</div>
<?php
require ("footer.php");
?>
</body>
</html>