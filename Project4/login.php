<?php
require_once("sessions.php");
require_once("connection.php");
require ("header.php");

function redirect_to( $location = NULL )
    {
        if ($location != NULL)
            {
                header("Location: {$location}");
                exit;
            }
    }

if (isset($_POST['submit']))
    {
        $uid = trim(htmlspecialchars(strip_tags($_POST['uid'])));
        $pword = trim(htmlspecialchars(strip_tags($_POST['pword'])));

        //echo command used to see if this is working and get values
        echo $uid; echo $pword; echo sha1('$pword');

        $query = "SELECT name, address, city, state, zip, email, adminFlag FROM users ";
        $query .= "WHERE username='$uid' AND password=sha1('$pword');";
        $result = $dbcn->query( $query );

        if(!$result)
            {
                echo( "<p>Unable to query database at this time.</p>" );
                exit();
            }

        //echo command used to see if this is working
        echo "i got here";

        $numRows = $result->num_rows;
        if($numRows > 0)
            {
                $row = $result->fetch_assoc();

                $_SESSION["name"] = $row["name"];
                $_SESSION["address"] = $row["address"];
                $_SESSION["city"] = $row["city"];
                $_SESSION["state"] = $row["state"];
                $_SESSION["zip"] = $row["zip"];
                $_SESSION["adminFlag"] = $row["adminFlag"];
                $_SESSION["loggedIn"] = "in";

                //echo command used to see if this is working
                echo $_SESSION["name"];
                echo $_SESSION["adminFlag"];

                if ($_SESSION["adminFlag"] == 1)
                    {
                        echo $_SESSION["name"];
                        echo $_SESSION["adminFlag"];
                        redirect_to("admin.php");
                    } else {
    
                        redirect_to("index.php");
                    }


                echo "<h2>Welcome " . $_SESSION["name"] . "</h2>";
            } else {
                echo "<h2>User name or password is incorrect</h2>";
                echo "<h3>Please Try Again</h3>";
            }
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body onload="document.myForm.uid.focus();">
    <form action="<? $_SERVER['PHP_SELF'] ?>"  name="myForm" method="post">
        <fieldset>
            <legend>Login</legend>
            <p>Please enter your USER ID and PASSWORD</p>
            <?php if(isset($msg)){?>
                <u1>
                    <?php echo $msg;?>
                </u1>
            <?php } ?>
            <ul>
                <li>
                    <label for="uid">User ID </label>
                    <input type="text" name="uid" id="uid" required />

                </li>
            </ul>

            <ul>
                <li>
                    <label for="pword">Password </label>
                    <input type="password" name="pword" id="pword" required />

                </li>
            </ul>

            <input type="submit" name="submit" value="Enter" />
            <h3>If you're not registered, click <a href="registration.php">here</a>.</h3>
         </fieldset>
    </form>
</body>

<?php require ("footer.php"); ?>

</html>