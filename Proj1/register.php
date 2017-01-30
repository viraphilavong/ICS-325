<!DOCTYPE html>
<?php
/**
Registration form
**/
$fnameErr = $lnameErr = $dateErr = $emailErr = $usernameErr = $genderErr = $passwordErr = $agreeErr = "";
$fname = $lname = $date = $email = $uid = $gend = $pword = $agree = "";
$animal = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "Missing";
    }
    else {
        $fname = $_POST["fname"];
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Missing";
    }
    else {
        $lname = $_POST["lname"];
    }
    if (empty($_POST["address"])) {
        $addrErr = "Missing";
    }
    else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"]))  {
        $emailErr = "Missing";
    }
    else {
        $email = $_POST["email"];
    }

    if (!isset($_POST["howMany"])) {
        $howManyErr = "You must select 1 option";
    }
    else {
        $howMany = $_POST["howMany"];
    }

    if (empty($_POST["favFruit"])) {
        $favFruitErr = "You must select 1 or more";
    }
    else {
        $favFruit = $_POST["favFruit"];
    }
}

?>

<html>
<head>
    <meta charset="UTF-8">
	<title>Registration</title>
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
<form onsubmit="return validateForm()" action="processform.php" method="post">
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
        <li><a href="register.php">Register</a></li>
    </ul>
</div>
<div id="left_col">

</div>

<form id='register' onsubmit="return validateForm()" action='processform.php.php' method='post'
    accept-charset='UTF-8'>

<fieldset >
<legend>Register</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

* Required Field *
<br>

<label for='firstname' >Your First Name*: </label>
<input type='text' name='fname' id='fname' value='Ex. John' maxlength="50" />
<br>

<label for='lastname' >Your Last Name*: </label>
<input type='text' name='lname' id='lname' value='Ex. Smith' maxlength="50" />
<br>

<label for='date' >Birth date*: </label>
<input type='text' name='date' id='date' value='(mm/dd/yy)' maxlength="50" />
<br>

<label for='email' >Email Address*:</label>
<input type='text' name='email' id='email' value='johnsmith@live.com' maxlength="50" />
 <br>

<label for='uid' >UserName*:</label>
<input type='text' name='uid' id='uid' value='' maxlength="50" />
 <br>

<label for='pword' >Password*:</label>
<input type='password' name='pword' id='pword' maxlength="50" />
<br>

    <br>
    <label for='gend' >Gender*:</label>
    <input type="radio" name="gend" value="female">Female
    <input type="radio" name="gend" value="male">Male
    <br>
    <br>

<select size="1" id="animal" name="animal">
  <option value="none">--Select One Animal--</option>
  <option value="Cat">Cat</option>
  <option value="Dog">Dog</option>
  <option value="Cow">Cow</option>
</select>
<br>

<textarea readonly>
By agreeing you understand that your info is at risk and that we are
not liable. You agree to this site's terms and that we may do whatever
we please with the submission of this information.
</textarea>
<br>

<input type="checkbox" name="agree" value="agree">I agree<br>

<input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>
<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
</html>
