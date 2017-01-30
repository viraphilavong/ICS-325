<?php
require_once("connection.php");
/**
 * Created by PhpStorm.
 * User: marty
 * Date: 6/5/2016
 * Time: 1:52 PM
 */
require ("header.php");

$uidErr=$pwordErr=$nameErr=$addressErr=$cityErr=$stateErr=$zcodeErr=$emailErr=$acceptErr= "";
$errors= 0;
$successMessage=$noSuccessMessage= "";

// Checking null values in message.
if(isset($_POST['submit']))
    {
        //create short variable names and strip special characters
        $uid = trim(htmlspecialchars(strip_tags($_POST["uid"])));
        $pword = sha1(htmlspecialchars(strip_tags($_POST["pword"])));
        $name = htmlspecialchars(strip_tags($_POST["name"]));
        $address = htmlspecialchars(strip_tags($_POST["address"]));
        $city = htmlspecialchars(strip_tags($_POST["city"]));
        $state = htmlspecialchars(strip_tags($_POST["state"]));
        $zcode = htmlspecialchars(strip_tags($_POST["zcode"]));
        $email = htmlspecialchars(strip_tags($_POST["email"]));

        //uid validation
        if (empty($_POST["uid"]))
            {
                $uidErr = "UID is required";
                $errors = 1;
            } else {
                $uid = test_input($_POST["uid"]);
            }
        //password validation
        if (empty($_POST["pword"]))
            {
                $pwordErr = "Password is required";
                $errors = 1;
            } else {
                $pword = test_input($_POST["pword"]);
            }
        //name validation
        if (empty($_POST["name"]))
            {
                $nameErr = "Name is required";
                $errors = 1;
            } else {
                $name = test_input($_POST["name"]);
            }
        //address validation
        if (empty($_POST["address"]))
            {
                $addressErr = "Address is required";
                $errors = 1;
            } else {
                $address = test_input($_POST["address"]);
            }
        //city validation
        if (empty($_POST["city"]))
            {
                $cityErr = "City is required";
                $errors = 1;
            } else {
                $city = test_input($_POST["city"]);
            }
        //state validation
        if (empty($_POST["state"]))
            {
                $stateErr = "State is required";
                $errors = 1;
            } else {
                $state = test_input($_POST["state"]);
            }
        //zip code validation
        if(!preg_match("/^[0-9]{5}$/", $zcode))
            {
                $zcodeErr = "The ZIP code must be a 5-digit number.";
            } else {
                $zcode = test_input($_POST["zcode"]);
            }
        //email validation
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Email is not valid";
                $errors = 1;
            }

        if($errors == 0)
            {
                // if no errors
                $query = "INSERT INTO users ";
                $query .= "(username, password, name, address, city, state, zip, email) ";
                $query .= "VALUES ('$uid', sha1('$pword'), '$name', '$address', '$city', '$state', '$zcode', '$email') ";

                if ($dbcn->query($query) === TRUE) {
                    echo "New record created successfully";
                    $uid=$pword=$name=$address=$city=$state=$zcode=$email="";       
                    //sets the fields back to blank on refresh                    
                } else {
                    echo "Error: " . $query . "<br>" . $dbcn->error;
                }

            }
            else {
                $noSuccessMessage = "Please reenter the information with the corrections noted and submit again";
            }
    }

function test_input($data)
    {
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
      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <fieldset>
        <legend>Registration</legend>
        <p>Please fill all the mandatory fields that are denoted with an * and select <strong>Submit</strong></p>
        <div style="background-color: green"><?php echo $successMessage;?></div>
        <div style="background-color: red"><?php echo $noSuccessMessage;?></div>
        <ul>
            <li>
                <label for="uid">User ID *</label>
                <input type="text" name="uid" id="uid" value="<?php if(isset($_POST['submit'])) { echo htmlentities($uid);  } ?>" required />
                <span id="uidError" style="display: none;">You can only use alphabetic characters and numbers</span>
                <div style="background-color: red"><?php echo $uidErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="pword">Password *</label>
                <input type="password" name="pword" id="pword" value="" required />
                <span id="pwordError" style="display: none;">You can only use alphabetic characters and numbers</span>
                <div style="background-color: red"><?php echo $pwordErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" value="<?php if(isset($_POST['submit'])) {  echo htmlentities($name); } ?>" required />
                <span id="nameError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span>
                <div style="background-color: red"><?php echo $nameErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="address">Address *</label>
                <input type="text" name="address" id="address" value="<?php if(isset($_POST['submit'])) { echo htmlentities($address); } ?>" required />
                <span id="addressError" style="display: none;">You can only use alphabetic characters, numbers, hyphens and apostrophes</span>
                <div style="background-color: red"><?php echo $addressErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="city">City *</label>
                <input type="text" name="city" id="city" value="<?php if(isset($_POST['submit'])) { echo htmlentities($city); } ?>" required />
                <span id="cityError" style="display: none;">You can only use alphabetic characters, hyphens and apostrophes</span>
                <div style="background-color: red"><?php echo $cityErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="state">State *</label>
                <select name="state" id="state" required >
                    <option value=""><?php if(isset($_POST['submit'])) { htmlentities($state); } ?></option>
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
                <span class="validateError" id="stateError" style="display: none;">You must select your state of residence.</span>
                <div style="background-color: red"><?php echo $stateErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="zcode">Zipcode *</label>
                <input type="text" name="zcode" id="zcode" value="<?php if(isset($_POST['submit'])) {  echo htmlentities($zcode);  }?>" required/>
                <span id="zcodeError" style="display: none;">You can only use numbers</span>
                <div style="background-color: red"><?php echo $zcodeErr;?></div>
            </li>
        </ul>
        <ul>
            <li>
                <label for="email">Email *</label>
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['submit'])) {  echo htmlentities($email); } ?>" required />
                <span id="emailError" style="display: none;">You must enter a valid email address</span>
                <div style="background-color: red"><?php echo $emailErr;?></div>
            </li>
        </ul>
        <label for="terms">Terms and Conditions *</label>
        <ul>
            <li>
                <input type="checkbox" name="terms" id="accept" value="accept" onblur="validateCheckbox(id)" required/>
                <label for="accept">Accept our <a href="termsAndConditions.php">Terms and Conditions</a></label>
            </li>
        </ul>
        <span class="validateError" id="termsError" style="display: none;">You need to accept our terms and conditions</span>
        <div style="background-color: red"><?php echo $acceptErr;?></div>
        <input type="submit" id="submit" name="submit" value="Submit" />
    </fieldset>
</form>
<?php require("footer.php"); ?>
</body>
</html>

