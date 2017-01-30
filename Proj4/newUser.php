<?php
session_start();
require_once("connection.php");
echo date(" l, F j, Y");
require ("header.php");
require_once("functions.php");


//NEW USER FORM PROCESSING
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
        $query = "INSERT INTO users ";
        $query .= "(username, password, name, address, city, state, zip, email, adminFlag) ";
        $query .= "VALUES ('$UserName', sha1('$Password'), '$Name', '$Address', '$City', '$State', '$Zip', '$Email', '$AdminFlag') ";

    if ($dbcn->query($query) === TRUE)
        {
        echo "New record created successfully";
        } else {
        echo "Error: " . $query . "<br>" . $dbcn->error;
        }
    //}
    }
//END NEW USER FORM PROCESSING

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New User Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">

    <br /><br />

    <a href="admin.php">Return to Admin Menu</a><br />
    <br /><br />
</div>
<div id="page">

    <form action="newUser.php" method="post">
        <fieldset>
            <legend>New User</legend>
            <ul>
                <li>
                    <label for="username">User Name *</label>
                    <input type="text" name="username" id="username" value="<?php echo htmlentities($UserName); ?>" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="password">Password *</label>
                    <input type="password" name="password" id="password" value="<?php echo htmlentities($Password); ?>" required />
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

                <input type="submit" name="submit" value="Update User" style="height:1.90em; width:8em;" />

        </fieldset>
    </form>


    <?php if (!empty($message)) {echo "<b><p class=\"message\">" . $message . "</p></b>";} ?>
</div>
<?php
require ("footer.php");
?>
</body>
</html>