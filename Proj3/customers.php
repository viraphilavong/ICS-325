<p align = "right"><a href = "logout.php">Logout</button></a></p>
<?php
session_start();
if(@$_SESSION['access'] != 2) {
    header("location:notAdmin.php");
    exit;
}
/**
 * Created by PhpStorm.
 * User: AlexPhilavong
 * Date: 6/15/2016
 * Time: 1:11 AM
 */

require ("header.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Current Customers</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h3>Current Customers</h3>
<h4>Username | Name | Address | Email</h4>
<?php
$filePointer = fopen("testfile.txt", "r");
if (!$filePointer)
{
    print "The customer file is empty or missing";
    exit;
}

while(!feof($filePointer))
{
    $customerInfo = fgetcsv($filePointer, 0, "|", "\n");   // read
    if($customerInfo!="")
    {
        print "$customerInfo[0] , $customerInfo[2] , $customerInfo[3] , $customerInfo[7]<br />";
    }   // end if   
    //1 = username
    //3 = name
    //4 = address
    //8 = email

}  // end while
?>

<?php
require("footer.php");
?>

</body>
</html>
