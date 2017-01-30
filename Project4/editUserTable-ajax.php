<?Php
$id=$_POST['id'];
$user=$_POST['user'];
$name=$_POST['name'];
$password=$_POST['password'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$email=$_POST['email'];
$adminFlag=$_POST['adminFlag'];

$message=''; //
$status='success';              // Set the flag
//sleep(2); // if you want any time delay to be added

//// Data validation starts ///
if(!is_numeric($zip)){ // checking data
    $message= "Data Error";
    $status='Failed';
}

if(!is_numeric($id)){  // checking data
    $message= "Data Error";
    $status='Failed';
}

if($zip > 99999 or $mark < 10000 ){
    $message= "Zip should be between 10000 & 99999";
    $status='Failed';
}
//// Data Validation ends /////
if($status<>'Failed'){  // Update the table now

//$message="update student set mark=$mark, name
    require "connection.php"; // MySQL connection string
    $count=$dbcn->prepare("update users set username=:user,name=:name,password=:password,address=:address,city=:city,state=:state,zip=:zip,email=:email,adminFlag=:admingFlag  WHERE id=:id");

    $count->bindParam(":id",$id,PDO::PARAM_INT,3);

    if($count->execute()){
        $no=$count->rowCount();
        $message= " $no  Record updated<br>";
    }else{
        $message = print_r($dbcn->errorInfo());
        $message .= ' database error...';
        $status='Failed';
    }


}else{

}// end of if else if status is success
$a = array('id'=>$id,'user'=>$user,'name'=>$name,'password'=>sha1($password),'address'=>$address,'city'=>$city,'state'=>$state,'zip'=>zip,'email'=>$email,'adminFlag'=>$adminFlag);
$a = array('data'=>$a,'value'=>array("status"=>"$status","message"=>"$message"));
echo json_encode($a);
?>