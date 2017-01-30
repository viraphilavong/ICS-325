<?php
function check_required_user_new_fields($field_check, $password_flag) {

    $fieldError = "";

    if ($_POST[username] == "") {									// Validate Username Exists

        $fieldError = "Username Missing";

    } elseif ( strlen(trim($_POST[username])) < 6){					// Validate Username is correct length

        $fieldError = "Username must be 6 characters.";

    } elseif ($_POST[password] == "") {								// Validate Password Exists

        $fieldError = "Password Missing";

    } elseif (strlen(trim($_POST[password])) < 6) {					// Validate Password is correct length

        $fieldError = "Password must be 6 characters or more.";

    } elseif ($_POST[fname] == "") {								// Validate First Name Exists

        $fieldError = "First Name Missing";

    } elseif ($_POST[lname] == "") {								// Validate Last Name Exists

        $fieldError = "Last Name Missing";
    }
    return $fieldError;
}

function check_required_user_update_fields($field_check, $password_flag) {

    $fieldError = "";

    if ($_SESSION['SelectedUID'] == "") {							// Validate a user has been selected for update

        $fieldError = "User not selected";

    } elseif ($_POST[username] == "") {								// Validate Username Exists

        $fieldError = "Username Missing";

    } elseif ( strlen(trim($_POST[username])) < 6){					// Validate Username is correct length

        $fieldError = "Username must be 6 characters.";

    } elseif ($_POST[fname] == "") {								// Validate First Name Exists

        $fieldError = "First Name Missing";

    } elseif ($_POST[lname] == "") {								// Validate Last Name Exists

        $fieldError = "Last Name Missing";

    } elseif ($_POST[password] == "") {								// Validate Password Exists

        if ($password_flag != 0){
            $fieldError = "Password Missing";
        }

    } elseif (strlen(trim($_POST[password])) < 6) {					// Validate Password is correct length

        if ($password_flag != 0){
            $fieldError = "Password must be 6 characters or more.";
        }
    }
    return $fieldError;
}

// Change Password
function check_required_user_changepw_fields($field_check, $CurrentPW) {

    $fieldError = "";

    if ($_SESSION['SelectedUID'] == "") {							// Validate a user has been selected for update

        $fieldError = "Invalid Unique Identifier";

    } elseif ($_POST[currentpassword] == "") {						// Validate Current Password

        $fieldError = "Current Password Missing";

    } elseif (md5($_POST[currentpassword]) != $CurrentPW) { 		// Validate Current Passwords Match

        $fieldError = "Current Password does not match existing Password.";

    } elseif ($_POST[newpassword] == "") {							// Validate New Password

        $fieldError = "New Password Missing";

    } elseif (strlen(trim($_POST[newpassword])) < 6) {				// Validate New Password is correct length

        $fieldError = "New Password must be 6 characters or more.";

    } elseif ($_POST[newpassword] != $_POST[verifynewpassword]) { 	// Validate New Passwords Match

        $fieldError = "New Passwords do not match.";

    }

    return $fieldError;

}


function check_required_fields($required_array) {
    $field_errors = array();
    foreach($required_array as $fieldname) {
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0)) {
            $field_errors[] = $fieldname;
        }
    }
    return $field_errors;
}

function check_max_field_lengths($field_length_array) {
    $field_errors = array();
    foreach($field_length_array as $fieldname => $maxlength ) {
        if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) { $field_errors[] = $fieldname; }
    }
    return $field_errors;
}

function display_errors($error_array) {
    echo "<p class=\"errors\">";
    echo "Please review the following fields:<br />";
    foreach($error_array as $error) {
        echo " - " . $error . "<br />";
    }
    echo "</p>";
}

?>