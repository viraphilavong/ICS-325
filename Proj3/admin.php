<?php
session_start();
if(@$_SESSION['access'] != 2) {
    header("location:notAdmin.php");
    exit;
}
/**
 * Created by PhpStorm.
 * User: AlexPhilavong
 * Date: 6/30/2016
 * Time: 8:13 PM
 */
require ("header.php");
echo "<h2>Active Administrator " . @$_SESSION['uid'] . "</h2>";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <h3>Products</h3>
</div>
<table>
    <?php //this if statement will keep any non-admin from viewing this part of the tables ?>
    <?php if ($_SESSION['access'] == 2){ ?>
        <tr>
            <td>
                <fieldset class="admin" >
                    <legend>Products</legend>
                    <ul>
                        <li><a href="">View Product List</a></li>
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
                        <li><a href="customers.php">View Users</a></li>
                        <li><a href="">New User</a></li>
                        <li><a href="">Edit User</a></li>
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
