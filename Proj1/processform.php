<?php
//create short variable names and strip special characters
$uid = htmlspecialchars(strip_tags($_POST["uid"]));
$pword = htmlspecialchars(strip_tags($_POST["pword"]));
$name = htmlspecialchars(strip_tags($_POST["name"]));
$address = htmlspecialchars(strip_tags($_POST["address"]));
$city = htmlspecialchars(strip_tags($_POST["city"]));
$state = htmlspecialchars(strip_tags($_POST["state"]));
$zcode = htmlspecialchars(strip_tags($_POST["zcode"]));
$email = htmlspecialchars(strip_tags($_POST["email"]));
$gend = htmlspecialchars(strip_tags($_POST["gend"]));
$comments = htmlspecialchars(strip_tags($_POST["comments"]));
$date = date('H:i, jS F Y');
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Process Registration</title>
    <script src="../_js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Style1.css"/>
    <script>
        function getDate()
        {
            var now = new Date();
            var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
            var monNames = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
            document.write(dayNames[now.getDay()] + " " + monNames[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear()) + " , ";
        }
    </script>
</head>
<body>
<div id="header">
    <h1>The Shirt Shop</h1>
    <p align = "right"><script>getDate();</script></p>
</div>
<div id="wrap">
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="adult.php">Adult</a></li>
        <li><a href="children.php">Children</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="index.php">Register</a></li>
        <li><a href="customers.php">Customers</a></li>
    </ul>
</div>
<div id="left_col">
</div>
<?PHP
//copy data into output string
$output = $date.' , '.$uid.' , '.$pword.' , '.$name.' , '.$address.' , '.$city.' , '.$state.' , '.$zcode.' , '.$email
            .' , '.$gend.' , '.$comments."\n";
echo $output;

//$output = "\"$date\",\"$name\",\"$address\",\"$city\",\"$state\",\"$zcode\",\"$email\",\"$gend\",\"comments\"\n\";
//echo $output;

//open and read file and append with new data
try {
    if (!($myfile = @fopen("testfile.txt", 'a+')))
        throw new fileOpenException("Unable to open file!");
    if (!(fwrite($myfile, $output, strlen($output))))
        throw new fileWriteException("Could not write to file");
    fclose($myfile);
}
catch (fileOpenException $foe) {
    echo 'Could not be opened.';
    echo $foe;
}
catch (Exception $e) {
    echo 'Errors, Try again';
}
?>

<h1>You are now registered!</h1>

<h2>Feedback submitted</h2>

<h3>Current Customers</h3>
<?php
$filePointer = fopen("testfile.txt", "r");
if (!$filePointer)
    {
        print "The customer file is empty or missing";
        exit;
    }

while(!feof($filePointer))
    {
        $customerInfo = fgetcsv($filePointer, 0, ",", "\n");   // read
        if($customerInfo!="")
            {
                print "$customerInfo[0],$customerInfo[1],$customerInfo[3],$customerInfo[4],$customerInfo[5],$customerInfo[7] <br />";
            }  // end if
    }  // end while
?>
<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
</html>