<?php
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/5/2016
 * Time: 1:52 PM
 */
require ("header.php");

$nameErr = $emailErr = $commentsErr = "";
$errors = 0;
$successMessage = $noSuccessMessage = "";

if(isset($_POST['submit'])) { // Checking null values in message.

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
    $birthday = htmlspecialchars(strip_tags($_POST["birthday"]));
    $comments = htmlspecialchars(strip_tags($_POST["comments"]));
    $date = date('H:i, jS F Y');


    if (empty($_POST["name"])){
        $nameErr = "Name is required";
        $errors = 1;
    }
    elseif (!ctype_alpha($_POST["name"])) {
        $nameErr = "Letters only";
        $errors = 1;

    }
    else {
        $name = test_input($_POST["name"]);
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email is not valid";
        $errors = 1;
    }

    if (empty($_POST["comments"])){
        $commentsErr = "Comments are required";
        $errors = 1;
    }
    else {
        $comments = test_input($_POST["comments"]);
    }
    
    if ($errors == 0){
        // if no errors
        $successMessage = "Form Submitted successfully...";
        //create output string
        $output = "\"$date\"|\"$uid\"|\"$pword\"|\"$name\"|\"$address\"|\"$city\"|\"$state\"|\"$zcode\"|\"$email\"|\"$gend\"|\"$birthday\"|\"$comments\"\n";
        //open and read file and append with new data
        $myfile = fopen('testfile.txt', 'a+') or die('Unable to open file!');
        fwrite($myfile, $output);
        fclose($myfile);
    }
    else {
        $noSuccessMessage = "Please make the corrections and submit again";
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
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<form onsubmit="return validateForm()" method="post"
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">>
    <fieldset>
        <legend>Registration</legend>
        <p>Please fill all the mandatory fields that are denoted with an * and select <strong>Submit</strong></p>
        <div style="background-color: green"><?php echo $successMessage;?></div>
        <div style="background-color: red"><?php echo $noSuccessMessage;?></div>
        <ul>
            <li>
                <label for="uid">User ID *</label>
                <input type="text" name="uid" id="uid" onblur="validateUid(name)" />
                <span id="uidError" style="display: none;">You can only use alphabetic characters and numbers</span>
            </li>
        </ul>

        <ul>
            <li>
                <label for="pword">Password *</label>
                <input type="password" name="pword" id="pword" onblur="validatePassword(name)" />
                <span id="pwordError" style="display: none;">You can only use alphabetic characters and numbers</span>
            </li>
        </ul>

        <ul>
            <li>
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" value="" placeholder="John Smith" onblur="validateName(name)" />
                <span id="nameError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span>
                <div style="background-color: red"><?php echo $nameErr;?></div>
            </li>
        </ul>

        <ul>
            <li>
                <label for="address">Address *</label>
                <input type="text" name="address" id="address" value="" placeholder="123 Oak ST" onblur="validateAddress(name)" />
                <span id="addressError" style="display: none;">You can only use alphabetic characters, numbers, hyphens and apostrophes</span>
            </li>
        </ul>

        <ul>
            <li>
                <label for="city">City *</label>
                <input type="text" name="city" id="city" value="" placeholder="Metropolis" onblur="validateCity(name)" />
                <span id="cityError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span>
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
            </li>
        </ul>

        <ul>
            <li>
                <label for="zcode">Zipcode *</label>
                <input type="text" name="zcode" id="zcode" value="" placeholder="54321" onblur="validateZcode(name)" />
                <span id="zcodeError" style="display: none;">You can only use numbers</span>
            </li>
        </ul>

        <ul>
            <li>
                <label for="email">Email *</label>
                <input type="text" name="email" id="email" value="" placeholder="jsmith@live.com" onblur="validateEmail(value)" />
                <span id="emailError" style="display: none;">You must enter a valid email address</span>
                <div style="background-color: red"><?php echo $emailErr;?></div>
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


        <ul>
            <li>
                <label for="birthday">Date of Birth</label>
                <input type="date" name="birthday" id="birthday" min="1916-01-01" value="1998-05-23" max="2016-12-31" required>
                <span>(16+ years only)</span>
            </li>
        </ul>
        <ul>
            <li>
                <label for="comments">Comments</label>
                <textarea id="comments" name="comments"></textarea>
                <div style="background-color: red"><?php echo $commentsErr;?></div>
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
        <input type="submit" id="submit" name="submit" value="Submit" />
    </fieldset>
</form>
<?php
require("footer.php");
?>
</body>
</html>

