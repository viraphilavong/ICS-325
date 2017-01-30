<?php
session_start();
require_once("connection.php");
include ("header.php");
require_once("functions.php");

if (!$_SESSION["loggedIn"]) {

    $errors[] = 'You must login to place an order.';
    $_SESSION['errors'] = $errors;
    redirect_to("login.php");

}

$uidErr=$pwordErr=$nameErr=$addressErr=$cityErr=$stateErr=$zcodeErr=$emailErr= "";
$errors= 0;
$successMessage=$noSuccessMessage= "";

// Checking null values in message.
if(isset($_POST['submit']))
{
    //create short variable names and strip special characters
    $name = htmlspecialchars(strip_tags($_POST["name"]));
    $address = htmlspecialchars(strip_tags($_POST["address"]));
    $city = htmlspecialchars(strip_tags($_POST["city"]));
    $state = htmlspecialchars(strip_tags($_POST["state"]));
    $zcode = htmlspecialchars(strip_tags($_POST["zcode"]));
    $email = htmlspecialchars(strip_tags($_POST["email"]));

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
        redirect_to("confirmation.php");
        // if no errors
        //$query = "INSERT INTO users ";
        //$query .= "(username, password, name, address, city, state, zip, email) ";
        //$query .= "VALUES ('$uid', sha1('$pword'), '$name', '$address', '$city', '$state', '$zcode', '$email') ";

        //if ($dbcn->query($query) === TRUE) {
        //    echo "New record created successfully";
        //} else {
        //    echo "Error: " . $query . "<br>" . $dbcn->error;
        //}

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
    <title>Billing Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<!-- START OF LEFT COLUMN -->
<div id="left_col">
    <h3>Products</h3>

    <?php
    //query of the category table
    $query = "SELECT * FROM category ";
    $result = $dbcn->query($query);
    //uses results of the query to fill the product line and links
    while($row = $result->fetch_assoc())
    {
        echo "<a href=".$row['category'] . ".php" . ">" .$row['category'] . "</a><br>";
    }
    ?>

    <!--Used to view individual orders-->
    <?php if ($_SESSION["loggedIn"]){ ?>
        <br />
        <a href="view_my_orders.php">View My Orders</a><br />
        <br />
    <?php } ?>

    <!--Used to allow only admin users to return to admin page-->
    <?php if (@$_SESSION['adminFlag'] == 1) { ?>
        <br />
        <a href="admin.php">Admin Menu</a><br />
        <br />
    <?php } ?>

</div>
<!-- END OF LEFT COLUMN -->
<div id="main">
    <br />
    <form action="<? $_SERVER['PHP_SELF'] ?>"  name="myForm" method="post">
        <fieldset>
        <table border="0" cellspacing="0">
            <legend>Purchase Review</legend>
            <br />
            <tr>
                <td width="200" class="nvtxt">Item Description</td>
                <td width="200" class="nvtxt">Item Price</td>
                <td width="200" class="nvtxt">Quantity</td>
                <td width="200" class="nvtxt">Item Total</td>
            </tr>
            <?php
            foreach($_SESSION['myCart'] AS $temp)
            {
                $itmTot = $temp["qty"] * $temp["price"];
            ?>
                <tr>
                    <td><?= $temp["item"] ?></td>
                    <td><?= $temp["price"] ?></td>
                    <td><?= $temp["qty"] ?></td>
                    <td><?= $itmTot ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td class="nvtxt">Total Items</td>
                <td class="nvtxt">Total Price</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;</td>
                <td><?= $_SESSION['myToti'] ?></td>
                <td><?= $_SESSION['myTotp'] ?></td>
            </tr>
            <tr class="trColor"><td colspan="4">&nbsp;</td></tr>
        </table border="0" padding="0" cellspacing="0">
        </fieldset>
        <fieldset>
            <legend>Credit Card Information</legend>
        <table>
            <tr>
                <td>
                    <label for="ccard">Pick your card type:</label>
                </td>
                <td>
                    <select id="ccard" name="ccard" size="1" >
                            <option value="Visa"> Visa </option>
                            <option value="Master"> Master  </option>
                            <option value="Amex">  American Express </option>
                            <option value="Other"> Other </option>
                    </select>
                </td>
                <td>
                    <label for="other"  >Other card name: </label>
                </td>
                <td>
                    <input type="text" id="other" name="other" value="Other" size="20" maxlength="20">
                </td>
            <tr>
                <td>
                    <label for="cardnumber" >Credit Card Number: </label>
                </td>
                <td>
                    <input type="text" id="cardnumber" name="cardnumber" size="40" value="">
                </td>
                <td>
                    <label for="expdate" >Expiration Date: </label>
                </td>
                <td>
                    <input type="text" id="expdate" name="expdate" size="20" value="mm/yy">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" >Name as it appears on card: </label>
                </td>
                <td>
                    <input type="text" name="name" id="name" value="<?php echo htmlentities($_SESSION['name']); ?>" size="40" maxlength="40" >
                 </td>
            </tr>
            <tr>
                <td>
                    <label for="address" >Billing Address: </label>
                </td>
                <td>
                    <input type="text" id="address" name="address" value="<?php echo htmlentities($_SESSION['address']); ?>" size="40" maxlength="40">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="city" > City: </label>
                </td>
                <td>
                    <input type="text" id="city" name="city" value="<?php echo htmlentities($_SESSION['city']); ?>" size="40" maxlength="40">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="state">State:</label>
                </td>
                <td>
                    <select name="state" id="state">
                            <option value="Al">Alabama (AL)</option>
                            <option value="MN"> Alaska (AK)</option>
                            <option value="AZ">	Arizona (AZ)</option>
                            <option value="AR">	Arkansas (AR)</option>
                            <option value="CA">	California (CA)</option>
                            <option value="CO">	Colorado (CO)</option>
                            <option value="CT">	Connecticut (CT)</option>
                            <option value="DE">	Delaware (DE)</option>
                            <option value="FL">	Florida (FL)</option>
                            <option value="GA">	Georgia (GA)</option>
                            <option value="HI">	Hawaii (HI)</option>
                            <option value="ID">	Idaho (ID)</option>
                            <option value="IL">	Illinois (IL)</option>
                            <option value="IN">	Indiana (IN)</option>
                            <option value="IA">	Iowa (IA)</option>
                            <option value="KS">	Kansas (KS)</option>
                            <option value="KY">	Kentucky (KY)</option>
                            <option value="LA">	Louisiana (LA)</option>
                            <option value="ME">	Maine (ME)</option>
                            <option value="MD">	Maryland (MD)</option>
                            <option value="MA">	Massachusetts (MA)</option>
                            <option value="MI">	Michigan (MI)</option>
                            <option value="MN">	Minnesota (MN)</option>
                            <option value="MS">	Mississippi (MS)</option>
                            <option value="MO">	Missouri (MO)</option>
                            <option value="MT">	Montana (MT)</option>
                            <option value="NE">	Nebraska (NE)</option>
                            <option value="NV">	Nevada (NV)</option>
                            <option value="NH">	New Hampshire (NH)</option>
                            <option value="NJ">	New Jersey (NJ)</option>
                            <option value="NM">	New Mexico (NM)</option>
                            <option value="NY">	New York (NY)</option>
                            <option value="NC">	North Carolina (NC)</option>
                            <option value="ND">	North Dakota (ND)</option>
                            <option value="OH">	Ohio (OH)</option>
                            <option value="OK">	Oklahoma (OK)</option>
                            <option value="OR">	Oregon (OR)</option>
                            <option value="PA">	Pennsylvania (PA)</option>
                            <option value="RI">	Rhode Island (RI)</option>
                            <option value="SC">	South Carolina (SC)</option>
                            <option value="SD">	South Dakota (SD)</option>
                            <option value="TN">	Tennessee (TN)</option>
                            <option value="TX">	Texas (TX)</option>
                            <option value="UT">	Utah (UT)</option>
                            <option value="VT">	Vermont (VT)</option>
                            <option value="VA">	Virginia (VA)</option>
                            <option value="WA">	Washington (WA)</option>
                            <option value="WV">	West Virginia (WV)</option>
                            <option value="WI">	Wisconsin (WI)</option>
                            <option value="WY">	Wyoming (WY)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="zcode" > Zip/Code: </label>
                </td>
                <td>
                    <input type="text" id="zcode" name="zcode" value="<?php echo htmlentities($_SESSION['zip']); ?>" size="40" maxlength="65">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone" > Phone: </label>
                </td>
                <td>
                    <input type="text" id="phone" name="phone" value="" size="40" maxlength="65">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email" > Email: </label>
                </td>
                <td>
                    <input type="text" id="email" name="email" value="<?php echo htmlentities($_SESSION['email']); ?>" size="40" maxlength="65">
                </td>
            </tr>
            <tr>
                <td>
<!--                    <span class="comment">Comment/Question:</span>-->
                    <label for="comment" > Comment/Question: </label>
                </td>
                <td>
                    <textarea id="comment" name="comment" cols="40" rows="3" style="none"></textarea>
                </td>
            </tr>
        </table>
            <div>
                <input type="submit" id="submit" name="submit" value="Submit" />
            </div>
    </form>
</div>
<?php
    require("footer.php");
?>
</body>
</html>

