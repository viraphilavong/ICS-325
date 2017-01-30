<?php
require_once("connection.php");
require_once("functions.php");
session_start();
require ("header.php");

//redirect user to login page if they haven't already logged in
if ($_SESSION['adminFlag'] != 1)
    {
        redirect_to("login.php");
        exit;
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <table>
        <!--welcome message-->
        <?php echo "<h2>Active Administrator: " . $_SESSION["name"] . "</h2>" ?>
        <!--this if statement will keep any non-admin from viewing this part of the tables-->
        <?php if ($_SESSION['adminFlag'] == 1){ ?>
            <tr>
                <td>
                    <fieldset class="admin" >
                        <legend>Products</legend>
                        <ul>
                            <li><a href="viewProduct.php">View Product List</a></li>
                            <li><a href="">Edit Product List</a></li>
                            <li><a href="newProduct.php">Add New Product</a></li>
                            <li><a href="newCategory.php">Add New Category</a></li> 
                        </ul>
                    </fieldset>
                </td>

                <td>
                    &nbsp;
                </td>

            </tr>

            <tr>

                <td>
                    &nbsp;
                </td>
                <td>
                    <fieldset class="admin">
                        <legend>User Maintenance</legend>
                        <ul>
                            <li><a href="viewUser.php">View Users</a></li>
                            <li><a href="newUser.php">Add New User</a></li>
                            <li><a href="editUserTable.php">Edit User</a></li>
                        </ul>
                    </fieldset>
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td>
                <fieldset class="admin">
                    <legend>Options</legend>
                    <ul>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </fieldset>
            </td>

        </tr>
    </table>

</body>

<?php require ("footer.php"); ?>

</html>
