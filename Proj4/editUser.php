<?php

session_start();
require_once("connection.php");
echo date(" l, F j, Y");
require ("header.php");
require_once("functions.php");

//check to see if a User has been selected
if (isset($_GET['UID']))
    {
        $SelectedUID = $_GET['UID'];
        $_SESSION['SelectedUID'] = $_GET['UID'];

    } else {
        $SelectedUID = "";
    }

//DELETE USER FORM PROCESSING
//only execute if Delete Button is selected.
if (isset($_POST['delete']))
    {
        if ($_POST['deleteflag'] == 1)
            {
                $stmt = $dbcn->query("DELETE FROM users WHERE UID = {$_SESSION['SelectedUID']} LIMIT 1");
                if($stmt)
                    {
                        $message = 'User ( ' . $_SESSION['UserEdit'] . ' ) was successfully deleted.';
                        $_SESSION['UserEdit'] = "";
                        $_SESSION['SelectedUID'] = "";
                        $SelectedUID = "";
                    }else{
                        $message = 'Error : ('. $dbcn->errno .') '. $dbcn->error;
                    }
            }else {
                $message = "Delete Cancelled! - You must confirm delete by selecting 'Yes'.";
            }
    }
//END DELETE USER FORM PROCESSING

//UPDATE USER FORM PROCESSING
// Only execute if Update Rack Button is selected.
if (isset($_POST['submit']))
    {
        //$error_message = check_required_user_update_fields($_POST);

        $UID = $_SESSION['SelectedUID'];
        $UserName = trim($_POST['username']);
        $Password = trim($_POST['password']);
        $Name = trim($_POST['name']);
        $Address = trim($_POST['address']);
        $City = trim($_POST['city']);
        $State = trim($_POST['state']);
        $Zip = trim($_POST['zip']);
        $Email = trim($_POST['email']);
        $AdminFlag = trim($_POST['adminFlag']);

        //if (empty($error_message))
            //{
                //MySqli Update Query
                $query = "UPDATE users ";
                $query .= "SET username='$UserName', password=sha1('$Password'), name='$Name', address='$Address', city='$City', ";
                $query .= "state='$State', zip='$Zip', email='$Email', adminFlag='$AdminFlag' ";
                $query .= "WHERE UID = {$_SESSION['SelectedUID']} LIMIT 1";

                if ($dbcn->query($query) === TRUE)
                    {
                        echo "Record updated successfully";
                    } else {
                        echo "Error: " . $query . "<br>" . $dbcn->error;
                    }
            //}
    }
//END UPDATE USER FORM PROCESSING

//USER LISTING PROCESSING
//query users for Listing
$query = "SELECT * ";
$query .= "FROM users ";
$query .= "ORDER BY name;";
$Users = $dbcn->query($query);
confirm_query($Users);
//END USER LISTING PROCESSING

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit User Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">

    <b>User Listing</b><br />

    <select OnChange="location.href=this.options[this.selectedIndex].value" name="user" size="1" style="font-size:11px;font-family:Arial;width:200px">
        <option selected="Selected" value="">Select User&nbsp;&nbsp;&nbsp;</option>\n"
        <?php

        // Fill User Listing Dropdown with query results
        while($UserList = $Users->fetch_assoc())
            {

                $DisplayName = trim($UserList["name"]);
                $UID = $UserList["uid"];

                // Don't add the Administrator default account to the User Listing
                if ($UID != "000000000001" and trim($DisplayName) <> "")
                    {
                        echo '<option value="' . $_SERVER['PHP_SELF'] . '?UID=' . $UID . '">' . $DisplayName . '</option>\n"' . chr(13), chr(9), chr(9), chr(9), chr(9);
                    }
            }
        ?>

    </select>
    <br /><br /><br />

    <a href="admin.php">Return to Admin Menu</a><br />
    <br />
</div>
<div id="page">
<?php
if ($_SESSION['SelectedUID'] != "")
    {

        $SelectedUID = "";

        //obtain User information from Query and assign to variables
        $query = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE uid = {$_SESSION['SelectedUID']} ";
        $query .= "LIMIT 1";

        $User_set = $dbcn->query($query);
        confirm_query($User_set);

        $User = $User_set->fetch_assoc();

        //convert special characters for safe use as HTML attributes.
        $UserName = htmlspecialchars($User['username']);
        $Password = htmlspecialchars($User['password']);
        $Name = htmlspecialchars($User['name']);
        $Address = htmlspecialchars($User['address']);
        $City = htmlspecialchars($User['city']);
        $State = htmlspecialchars($User['state']);
        $Zip = htmlspecialchars($User['zip']);
        $Email = htmlspecialchars($User['email']);
        $AdminFlag = htmlspecialchars($User['adminFlag']);

        $_SESSION['UserEdit'] = $UserName;
        echo "<h2>{$Name}</h2>" ;
        //echo "<h2>{$_SESSION['UserEdit']}</h2>" ;

    }
else
    {

        echo "<h2>Select User from Listing</h2>";

    }
?>
<form action="editUser.php" method="post">
    <fieldset>
        <legend>Edit User</legend>
        <ul>
            <li>
                <label for="username">User Name *</label>
                <input type="text" name="username" id="username" value="<?php echo htmlentities($UserName); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" value="<?php echo htmlentities($Password); ?>" />
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" value="<?php echo htmlentities($Name); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="address">Address *</label>
                <input type="text" name="address" id="address" value="<?php echo htmlentities($Address); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="city">City *</label>
                <input type="text" name="city" id="city" value="<?php echo htmlentities($City); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="state">State *</label>
                <input type="text" name="state" id="state" value="<?php echo htmlentities($State); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="zip">Zip Code *</label>
                <input type="text" name="zip" id="zip" value="<?php echo htmlentities($Zip); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="email">Email *</label>
                <input type="text" name="email" id="email" value="<?php echo htmlentities($Email); ?>" required />
            </li>
        </ul>
        <ul>
            <li>
                <label for="adminFlag">Admin Flag *</label>
                <input type="text" name="adminFlag" id="adminFlag" value="<?php echo htmlentities($AdminFlag); ?>" required />
            </li>
        </ul>

        <?php if ($_SESSION['SelectedUID'] != ""){ ?>
            </br>
            </br>
           <input type="submit" name="submit" value="Update User" style="height:1.90em; width:8em;" />
            </br>
            </br>


            <label for="deleteflag">Delete User?</label></br>
            <select name="deleteflag" size="1" style="width:3.9em;">
                <option selected='selected' value=0>No</option>\n"
                <option value=1>Yes</option>\n"
            </select>

            <form action="editUser.php" method="post">
            <input type="submit" name="delete" value="Delete User" style="height:1.90em; width:8em;" />

                </form>
        <?php } ?>

    </fieldset>

</form>
<?php if (!empty($message)) {echo "<b><p class=\"message\">" . $message . "</p></b>";} ?>
</div>
<?php
require ("footer.php");
?>
</body>
</html>