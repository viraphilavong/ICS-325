<?php
/**
 * Created by PhpStorm.
 * User: AlexPhilavong
 * Date: 7/23/2016
 * Time: 11:13 AM
 */
require_once("sessions.php");
require_once("connection.php");

require_once("functions.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Users</title>
<script language="javascript" src="ajax.js"></script>
    <script language="JavaScript">
        function edit_field(id){

            var user_id='user_'+id; // To read the present mark from div
            var data_user='data_user'+ id;  // To assign id value to text box

            var name_id='name_'+id;
            var data_name='data_name'+ id;

            var password_id='password_'+id;
            var data_password='data_password'+ id;

            var address_id='address_'+id;
            var data_address='data_address'+ id;

            var city_id='city_'+id;
            var data_city='data_city'+ id;

            var state_id='state_'+id;
            var data_state='data_state'+ id;

            var zip_id='zip_'+id;
            var data_zip='data_zip'+ id;

            var email_id='email_'+id;
            var data_email='data_email'+ id;

            var adminFlag_id='adminFlag_'+id;
            var data_adminFlag='data_adminFlag'+ id;

            var sid='s'+id;
            var user=document.getElementById(user_id).innerHTML; // Read the present mark
            document.getElementById(user_id).innerHTML = "<input type=text id='" +data_user + "' value='"+ user + "'>"; // Display text input

            var name=document.getElementById(name_id).innerHTML; // Read the present name
            document.getElementById(name_id).innerHTML = "<input type=text id='" +data_name+ "' value='"+name+ "'>"; //

            var password=document.getElementById(password_id).innerHTML; // Read the present class
            document.getElementById(password_id).innerHTML = "<input type=text id='" +data_password+ "' value='"+password+ "' >"; //

            var address=document.getElementById(address_id).innerHTML; // Read the present mark
            document.getElementById(address_id).innerHTML = "<input type=text id='" +data_address + "' value='"+ address + "'>"; // Display text input

            var city=document.getElementById(city_id).innerHTML; // Read the present mark
            document.getElementById(city_id).innerHTML = "<input type=text id='" +data_city + "' value='"+ city + "'>"; // Display text input

            var state=document.getElementById(state_id).innerHTML; // Read the present mark
            document.getElementById(state_id).innerHTML = "<input type=text id='" +data_state + "' value='"+ state + "'>"; // Display text input

            var zip=document.getElementById(zip_id).innerHTML; // Read the present mark
            document.getElementById(zip_id).innerHTML = "<input type=text id='" +data_zip + "' value='"+ zip + "'>"; // Display text input

            var email=document.getElementById(email_id).innerHTML; // Read the present mark
            document.getElementById(email_id).innerHTML = "<input type=text id='" +data_email + "' value='"+ email + "'>"; // Display text input

            var adminFlag=document.getElementById(adminFlag_id).innerHTML; // Read the present mark
            document.getElementById(adminFlag_id).innerHTML = "<input type=text id='" +data_adminFlag + "' value='"+ adminFlag + "'>"; // Display text input


            document.getElementById(sid).innerHTML = '<input type=button value=Update onclick=ajax(' + id + ');>'; // Add different color to background
        } // end of function
    </script>
</head>

<body>
<?php
$count="SELECT username,password,name,address,city,state,zip,email,adminFlag FROM users";

$i=1;

echo "<table class='t1' width='1000'>
    <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Email</th>
        <th>AdminFlag</th>
        <th>Edit</th>
        
    </tr>";

    foreach ($dbcn->query($count) as $row) {
    $m=$i; // To manage row style using css file.
    @$user_id='user_' . $row['id'];  // Div tag to manage Mark data
    @$password_id='password_' . $row['id'];
    @$name_id='name_' . $row['id'];
    @$address_id='address_' . $row['id'];
    @$city_id='city_' . $row['id'];
    @$state_id='state_' . $row['id'];
    @$zip_id='zip_' . $row['id'];
    @$email_id='email_' . $row['id'];
    @$adminFlag_id='adminFlag_' . $row['id'];

    @$sid='s' . $row['id'];
    echo "<tr class='r$m' height=50>"; 
        echo "
                                    <td><div id=$name_id >$row[name]</div></td>
                                    <td><div id=$user_id>$row[username]</div></td>
                                    <td><div id=$password_id >$row[password]</div></td>
                                    <td><div id=$address_id>$row[address]</div></td>
                                    <td><div id=$city_id>$row[city]</div></td>
                                    <td><div id=$state_id>$row[state]</div></td>
                                    <td><div id=$zip_id>$row[zip]</div></td>
                                    <td><div id=$email_id>$row[email]</div></td>
                                    <td><div id=$adminFlag_id>$row[adminFlag]</div></td>
                                    <td><div id=$sid><input type=button value='Edit' onclick=edit_field($row[id])></div></td>
         ";
    echo "</tr>";
    //echo "<tr><td><div id=$hid STYLE=\"width:240px;display:none;position: absolute;z-index:1;text-align: center;border-width: 2px;border-color:#ffff00;\"></div></td></tr>";
    $i=$i+1;  // To manage row style
    }
    echo "</table>";
?>
<?php require ("footer.php"); ?>
</body>
</html>
