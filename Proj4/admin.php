<?php
require_once("connection.php");
session_start();
echo date(" l, F j, Y");
require ("header.php");

//redirect user to login page if they haven't already logged in
//if (!logged_in())
//    {
//        redirect_to("login.php");
//    }

//welcome message
echo "<h2>Active Administrator " . $_SESSION["name"] . "</h2>";
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <h3>Admin Menu</h3>
</div>
    <table>
        <!--this if statement will keep any non-admin from viewing this part of the tables-->
        <?php if ($_SESSION['adminFlag'] == 1){ ?>
            <tr>
                <td>
                    <fieldset class="admin" >
                        <legend>Products</legend>
                        <ul>
                            <li><a href="viewProduct.php">View Product List</a></li>
                            <li><a href="">Edit Product List</a></li>
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
                            <li><a href="editUser.php">Edit User</a></li>
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
<?php
require ("footer.php");
?>
</body>
</html>
