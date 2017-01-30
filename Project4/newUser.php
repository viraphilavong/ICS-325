<?php
require_once("sessions.php");
require_once("connection.php");
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

<div id="page">

    <form action="newUser.php" method="post">
        <fieldset>
            <legend>New User</legend>
            <ul>
                <li>
                    <label for="username">User Name *</label>
                    <input type="text" name="username" id="username" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="password">Password *</label>
                    <input type="password" name="password" id="password" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="address">Address *</label>
                    <input type="text" name="address" id="address" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="city">City *</label>
                    <input type="text" name="city" id="city" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="state">State *</label>
                    <select name="state" id="state" required >
                        <option value=""></option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="IA">Iowa</option>
                        <option value="MN">Minnesota</option>
                        <option value="SC">South Carolina</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                    </select>
                </li>
            </ul>
            <ul>
                <li>
                    <label for="zip">Zip Code *</label>
                    <input type="text" name="zip" id="zip" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="email">Email *</label>
                    <input type="text" name="email" id="email" value="" required />
                </li>
            </ul>
            <ul>
                <li>
                    <label for="adminFlag">Admin Flag *</label>
                    <input type="text" name="adminFlag" id="adminFlag" value="" required />
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