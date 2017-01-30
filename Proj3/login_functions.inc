<?php

function absolute_url ($page = 'index.php') {
	$url = 'http://' .
$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	return $url;
}

function check_login($uid = '', $pword = '')
{

    $file = fopen("testfile.txt", "r");
    if (!$file) {
        print "The customer file is empty or missing";
        exit;
    }

    while (!feof($file)) {
        $logins = array();
        $errors = array();

        $customerInfo = fgetcsv($file, 0, "|", "\n");   // read
        $logins[] = array($customerInfo[1] => $customerInfo[2]);

        if (empty($uid)) {
            $errors[] = 'Enter User ID';
        }
        if (empty($pword)) {
            $errors[] = 'You forgot to enter password';
        }
        if (empty($errors)) {
            if($logins[$uid] && $logins[$pword]){
                return array(true, $errors);
            } else {
                $errors[] = 'User ID and Password do not match.';
            }
        }
        return array(false, $errors);
    }  // end while

    
}
?>