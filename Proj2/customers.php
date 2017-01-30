<?php
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
    <title>Registration Form</title>
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
        print "$customerInfo[1] , $customerInfo[3] , $customerInfo[4] , $customerInfo[8]<br />";
    }  // end if
}  // end while
?>

<?php
require("footer.php");
?>

</body>
</html>
