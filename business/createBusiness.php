<?php


//$errors = 'Error1: ' . '<br/>' .PHP_EOL;
//$errors  .= 'Error2: ' . '<br>';
$errors = '';

include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");
session_start();// Starting Session

$name = $_POST['name'];
$country= $_POST['country'];
$city= $_POST['city'];
$street= $_POST['street'];
$houseNumber= $_POST['house'];
$phone= $_POST['phone'];
$mail= $_POST['mail'];
$description= $_POST['description'];
$lon= $_POST['long'];
$lat= $_POST['lat'];
$BusinessType= $_POST['BusinessType'];
$time = new DateTime();
$datephp = $time->format('Y-m-d H:i:s');

$login_user = $_SESSION['login_user'];

$userIdQuery = "select id from Users where LoginName='$login_user'";

$result = mysql_query($userIdQuery);
$userId =  mysql_result($result, 0);


if($name == ''){
    $errors = "Error1: Name Required".PHP_EOL;
}
if($BusinessType == -1){
    $errors.= "Error2: Business Type Required".PHP_EOL;
}

if(isset($_FILES['image'])){

    if ( 0 < $_FILES['image']['error'] ) {
        $errors.= 'Error: ' . $_FILES['image']['error'];

    }
    else {

        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors.="please choose a JPEG or PNG or png file.";
        }
        if($file_size > 2097152){
            $errors.='File size must be excately 2 MB';
        }

    }

}

if($errors == ''){
    $sql = "INSERT INTO Business ".
        "(Id,TimeCreated,TimeUpdated,State,Name,Country,City,Street,HouseNumber,Phone,Mail, Description,refOwnerId,Lon,Lat,PhotoURL,refType) ".
        "VALUES ".
        "(NULL,'$datephp','$datephp',1,'$name','$country','$city','$street','$houseNumber','$phone','$mail','$description','$userId','$lon','$lat',NULL,$BusinessType)";
    mysql_query( $sql);
    if(isset($_FILES['image'])){
        $name_img = "businessProfile-userid-".$userId."-business-".mysql_insert_id().".jpg";

        move_uploaded_file($file_tmp,"../image/businessProfile/".$name_img);
    }
    $sql = "update Business set PhotoURL = '".$name_img."' where id = ".mysql_insert_id();
    mysql_query( $sql);
    die("Successfully");

}
else{
    die($errors);
}


//  die($sql);
//


/*
$query = mysql_query("select * from Users where LoginName='$username'");
$rows = mysql_num_rows($query);

if ($rows > 0) {
    $error = "There is already a LoginName";
}
else if ($_POST['pass'] != $_POST['cPass']) {
    $error = "Passwords must be the same";
}
else if ($_POST['accountType'] == 'null'){

    $error = "Account type mustn't be blanked";
}
else
{

    // Define $username and $password
    $fname=$_POST['Firstname'];
    $lname=$_POST['Lastname'];
    $phone=$_POST['phone'];
    $mail=$_POST['mail'];
    $desc = $_POST['description'];
    $gender = $_POST['gender'];
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $cpassword=$_POST['cPass'];
    $fullname=$fname .' ' .$lname;
    $account = $_POST['accountType'];

    $address =$_POST['address'];
    $prepAddr = str_replace(' ','+',$address);
    $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
    $output= json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;
    //   die($address);

    $typeQuery = "select id from AccountType where state = 1 and name = '$account' ORDER BY id DESC LIMIT 1";

    $result = mysql_query($typeQuery);
    //die(mysql_result($result, 0));
    $accountId =  mysql_result($result, 0);



    $query  = "insert into Users(State,FullName,FirstName,LastName,PhoneNum,EmailAddress,Gender,Description,LoginName,Password,LatCoordinate,LongCoordinate,Address,refTypeAccountId)
                              values (1,'$fullname','$fname','$lname','$phone','$mail','$gender','$desc','$username','$password','$latitude','$longitude','$address','$accountId')";

    mysql_query($query);
    session_start(); // Starting Session
    $_SESSION['login_user']=$username; // Initializing Session
    $_SESSION['accountTypeName'] = $account;
    if($account == 'Regular'){
        header("location: ../map.php");
    }
    if($account == 'Business'){
        header("location: ../business/businessmap.php");
    }






}
*/

?>



