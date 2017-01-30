<?php

$dbcn = new mysqli("localhost","root","root","ics325labs");

if(mysqli_connect_errno()) {
    echo "<p>Error creating database connection: </p>";
    exit;
}

?>

