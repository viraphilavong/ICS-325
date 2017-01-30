<?php
require_once("sessions.php");
require_once("connection.php");
require ("header.php");
require_once("functions.php");


//NEW PRODUCT PROCESSING
// Only execute if New Product Button is selected.
if (isset($_POST['submit']))
    {

        $Category = trim($_POST['category']);
        $Title = trim($_POST['title']);
        $Cost = trim($_POST['cost']);
        $Price = trim($_POST['price']);
        $Quantity = trim($_POST['quantity']);

        if (is_uploaded_file ($_FILES['aFile']['tmp_name']))
            {
                $realName = $_FILES['aFile']['name'];
                move_uploaded_file($_FILES['aFile']['tmp_name'], 'C:/MAMP/htdocs/Project4/uploads/' . $realName);


                //MySqli Update Query
                $query = "INSERT INTO product ";
                $query .= "(category, title, cost, price, quantity, filename) ";
                $query .= "VALUES ('$Category', '$Title', '$Cost', '$Price', '$Quantity', '$realName')";

                if ($dbcn->query($query) === TRUE)
                    {
                        echo "New product record created successfully";
                    } else {
                        echo "Error: " . $query . "<br>" . $dbcn->error;
                    }
            }
    }
//END NEW PRODUCT PROCESSING

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
            <legend>New Product</legend>
            <ul>
                <li>
                    <label for="category">Category or Department *</label>
                    <input type="text" name="category" id="category" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="title">Product Name *</label>
                    <input type="text" name="title" id="title" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="cost">Cost *</label>
                    <input type="text" name="cost" id="cost" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="price">Retail Price *</label>
                    <input type="text" name="price" id="price" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="quantity">Quantity *</label>
                    <input type="text" name="quantity" id="quantity" value="" required />
                </li>
            </ul>

            <ul>
                <li>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <label for="aFile">File to upload/store in database: *</label>
                    <input type="file" name="aFile" id="aFile" size="40" />
                </li>
            </ul>

            <input type="submit" name="submit" value="Add Product" style="height:1.90em; width:8em;" />

        </fieldset>
    </form>


    <?php if (!empty($message)) {echo "<b><p class=\"message\">" . $message . "</p></b>";} ?>
</div>
<?php
require ("footer.php");
?>
</body>
</html>