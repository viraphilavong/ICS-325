<?php
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/5/2016
 * Time: 1:52 PM
 */
$uidErr = $pwordErr = $nameErr = $addressErr = $cityErr = $stateErr = $zcodeErr = $emailErr = $gendErr = $birthdayErr = $commentsErr = $termsErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    $valid = true;
    if (empty($_POST["uid"])) {
        $uidErr = "Missing";
        $valid = false;
        $code = 1;
    }

    elseif (empty($_POST["pword"])) {
        $pwordErr = "Missing";
        $valid = false;
        $code = 2;
    }

    elseif (empty($_POST["name"])) {
        $nameErr = "Missing";
        $valid = false;
        $code = 3;
    }

    elseif (empty($_POST["address"])) {
        $adressErr = "Missing";
        $valid = false;
        $code = 4;
    }

    elseif (empty($_POST["city"])) {
        $cityErr = "Missing";
        $valid = false;
        $code = 5;
    }

    elseif (empty($_POST["state"])) {
        $stateErr = "Missing";
        $valid = false;
        $code = 6;
    }

    elseif (empty($_POST["zcode"])) {
        $zcodeErr = "Missing";
        $valid = false;
        $code = 7;
    }
    
    elseif (empty($_POST["email"])) {
        $emailErr = "Missing";
        $valid = false;
        $code = 8;
    }
    elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email";
        $valid = false;
        $code = 8;
    }

    elseif (empty($_POST["gend"])) {
        $gendErr = "Missing";
        $valid = false;
        $code = 9;
    }

    elseif (empty($_POST["birthday"])) {
        $birthdayErr = "Missing";
        $valid = false;
        $code = 10;
    }

    elseif (empty($_POST["terms"])) {
        $termsErr = "Missing";
        $valid = false;
        $code = 11;
    }
    else{
        $uid = test_input($_POST["uid"]);
        $pword = test_input($_POST["pword"]);
        $name = test_input($_POST["name"]);
        $adress = test_input($_POST["address"]);
        $city = test_input($_POST["city"]);
        $state = test_input($_POST["state"]);
        $zcode = test_input($_POST["zcode"]);
        $email = test_input($_POST["email"]);
        $gend = test_input($_POST["gend"]);
        $birthday = test_input($_POST["birthday"]);
        $terms = test_input($_POST["terms"]);
        header('Location: http://localhost/Website/processform.php');
        exit();
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <script src="validate.js"></script>
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
<form onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>,processform.php" method="post">
    <fieldset>
        <legend>Registration</legend>
        <p>Please fill all the mandatory fields that are denoted with an * and select <strong>Submit</strong></p>
        <ul>
            <li>
                <label for="uid">User ID *</label>
                <input type="text" name="uid" id="uid" onblur="validateUid(name)" />
                <span id="uidError" style="display: none;">You can only use alphabetic characters and numbers</span>
                <div class="error"><?php if(isset($code) && $code == 1){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="pword">Password *</label>
                <input type="password" name="pword" id="pword" onblur="validatePassword(name)" />
                <span id="pwordError" style="display: none;">You can only use alphabetic characters and numbers</span>
                <div class="error"><?php if(isset($code) && $code == 2){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" value="" placeholder="John Smith" onblur="validateName(name)" />
                <span id="nameError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span>
                <div class="error"><?php if(isset($code) && $code == 3){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="address">Address *</label>
                <input type="text" name="address" id="address" value="" placeholder="123 Oak ST" onblur="validateAddress(name)" />
                <span id="addressError" style="display: none;">You can only use alphabetic characters, numbers, hyphens and apostrophes</span>
                <div class="error"><?php if(isset($code) && $code == 4){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="city">City *</label>
                <input type="text" name="city" id="city" value="" placeholder="Metropolis" onblur="validateCity(name)" />
                <span id="cityError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span>
                <div class="error"><?php if(isset($code) && $code == 5){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="state">State *</label>
                <select name="state" id="state" onblur="validateSelect(name)">
                    <option value="">States</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Wisconsin">Wisconsin</option>
                </select>
                <span class="validateError" id="stateError" style="display: none;">You must select your state of residence.</span>
                <div class="error"><?php if(isset($code) && $code == 6){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="zcode">Zipcode *</label>
                <input type="text" name="zcode" id="zcode" value="" placeholder="54321" onblur="validateZcode(name)" />
                <span id="zcodeError" style="display: none;">You can only use numbers</span>
                <div class="error"><?php if(isset($code) && $code == 7){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="email">Email *</label>
                <input type="text" name="email" id="email" value="" placeholder="jsmith@live.com" onblur="validateEmail(value)" />
                <span id="emailError" style="display: none;">You must enter a valid email address</span>
                <div class="error"><?php if(isset($code) && $code == 8){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>

        <label for="hand">Gender:</label>
        <ul>
            <li>
                <input type="radio" name="gend" id="female" value="Female" onblur="validateRadio(id)" />
                <label for="female">Female</label>
            </li>
            <li>
                <input type="radio" name="gend" id="male" value="Male" onblur="validateRadio(id)" />
                <label for="male">Male</label>
            </li>
        </ul>
        <span class="validateError" id="gendError" style="display: none;">Please, make a selection.</span>
        <div class="error"> <?php if(isset($code) && $code == 9){echo 'Missing/Invalid';}?></div>


        <ul>
            <li>
                <label for="birthday">Date of Birth</label>
                <input type="date" name="birthday" id="birthday" min="1916-01-01" value="1998-05-23" max="2016-12-31" required>
                <span>(16+ years only)</span>
                <div class="error"><?php if(isset($code) && $code == 10){echo 'Missing/Invalid';}?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="comments">Comments</label>
                <textarea id="comments" name="comments"></textarea>
            </li>
        </ul>
        <label for="terms">Terms and Conditions *</label>
        <ul>
            <li>
                <input type="checkbox" name="terms" id="accept" value="accept" onblur="validateCheckbox(id)" />
                <label for="accept">Accept our <a href="termsAndConditions.php">Terms and Conditions</a></label>
            </li>
        </ul>

        <span class="validateError" id="termsError" style="display: none;">You need to accept our terms and conditions</span>
        <div class="error"><?php if(isset($code) && $code == 11){echo 'Missing/Invalid';}?></div>

        <input type="submit" id="submit" name="submit" value="Submit" />
    </fieldset>
</form>
<div id="footer">
    <p>Webmasters : Alexander Philavong, Martin Austin, & Wanny Hoang </p>
</div>
</body>
</html>

