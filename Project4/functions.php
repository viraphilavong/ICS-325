<?php
//functions for Web Site
function redirect_to( $location = NULL )
    {
        if ($location != NULL)
        {
            header("Location: {$location}");
            exit;
        }
    }

function confirm_query($result_set)
    {
        if (!$result_set)
            {
                die("Database query failed: " );
            }
    }

function confirm_delete_query($result_set)
    {
        if (!$result_set)
            {
                $rError = "True";
                return $rError;
            }
    }

function check_required_user_update_fields($field_check)
    {
        $fieldError = "";

        if ($_SESSION['SelectedUID'] == "") {						// Validate a user has been selected for update

            $fieldError = "User not selected";

        } elseif ($_POST[username] == "") {							// Validate Username Exists

            $fieldError = "Username Missing";

        } elseif ( strlen(trim($_POST[username])) < 6){				// Validate Username is correct length

            $fieldError = "Username must be 6 characters.";

        } elseif ($_POST[password] == "") {							// Validate Password Exists

            $fieldError = "Password missing.";

        } elseif ($_POST[name] == "") {								// Validate Name Exists

            $fieldError = "Name Missing";

        } elseif ($_POST[address] == "") {							// Validate Address Exists

            $fieldError = "Address Missing";

        } elseif ($_POST[city] == "") {								// Validate City Exists

            $fieldError = "City Missing";

        } elseif ($_POST[state] == "") {							// Validate State Exists

            $fieldError = "State Missing";

        } elseif ($_POST[zip] == "") {								// Validate Zip Code Exists

            $fieldError = "Zip Code Missing";

        } elseif ($_POST[email] == "") {							// Validate Email Exists

            $fieldError = "Email Missing";

        } elseif ($_POST[adminFlag] == "") {						// Validate Admin Flag Exists

            $fieldError = "Admin Flag Missing";
        }

        return $fieldError;
    }

?>