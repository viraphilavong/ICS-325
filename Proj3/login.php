<?php
session_start();
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/16/2016
 * Time: 2:04 PM
 */
require ("header.php");

$file = fopen("testfile.txt", "r");
if (!$file) {
    print "The customer file is empty or missing";
    exit;
}

if(isset($_POST['Submit'])) {
    $uid = trim(htmlspecialchars(strip_tags($_POST['uid'])));
    $pword = trim(htmlspecialchars(strip_tags($_POST['pword'])));

    $uid = isset($_POST['uid']) ? $_POST['uid'] : '';
    $pword = isset($_POST['pword']) ? $_POST['pword'] : '';

    while (!feof($file)) {
        $customerInfo = fgetcsv($file, 0, "|", "\n");   // read
        $logins = array($customerInfo[0] => $customerInfo[1]);
        if (isset($logins[$uid]) && $logins[$uid] == $pword) {
            if($uid=='admin' && $pword=='passw0rd'){
                $_SESSION['access'] = 2;
                $_SESSION['uid'] = "admin";
                header("location:admin.php");
                exit;
            } else{
                $_SESSION['access'] = 1;
                $_SESSION['uid'] = $uid;
                header("location:index.php");
                exit;
            }            
        } else {
            $_SESSION['access'] = 0;
            $_SESSION['uid'] = "Guest";
            $msg="<span style='color:red'>Invalid Login Details</span>";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="left_col">
    <h3>Products</h3>
</div>
<form method="post" action="" name="Login_Form">
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
                <input type="text" name="uid" id="uid" <?php @$_SESSION['uid'] = $uid; ?>/>
                

            </li>
        </ul>

        <ul>
            <li>
                <label for="pword">Password </label>
                <input type="password" name="pword" id="pword"/>

            </li>
        </ul>

        <input type="submit" name="Submit" value="Login"/>
        <input type="hidden" id="submitted" name="submitted" value="TRUE" />
        <h3>If you're not registered, click <a href="registration.php">here</a>.</h3>
    </fieldset>

    <?php
    require ("footer.php");
    ?>
</body>
</html>