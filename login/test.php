<?php

session_start();
session_destroy(); // Destroying All Sessions

    include ($_SERVER['DOCUMENT_ROOT']."/checkit/database/connect.php");

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
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
            /*
            $accountId = null;
            if (!$result) {
                echo 'Could not run query: ' . mysql_error();
                exit;
            }
            if (mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                    $accountId = $row["id"];

                }
            }
            */


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

      //  header("location: https://mail.google.com/mail/u/0/?tab=wm#trash");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>User Form for registration - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signup.css" rel="stylesheet" type="text/css">


<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootbox.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>


<div class="M1"   >
    <div class="container-fluid" ><br><br>
        <div  class="col-xs-1 col-md-1" style=" padding-left:10px">
            <br>
            <div style="text-align: left; ">
                <div class="container">
                   <div class="btn-group btn-group-vertical">
                       <!--
                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-user"></span>
                              <p>Profile</p>
                          </button>
                      </div>

                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-calendar"></span>
                              <p>Calendar</p>
                          </button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-globe"></span>
                              <p>Network</p>
                          </button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-picture"></span>
                              <p>Upload </p>
                          </button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-time"></span>
                              <p>Statistics</p>
                          </button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-bell"></span>
                              <p>Events</p>
                          </button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-nav">
                              <span class="glyphicon glyphicon-th"></span>
                              <p>ALL</p>
                          </button>
                      </div>
                      -->
                    </div>
                </div>
            </div>
        </div>

        <div  class="col-xs-4 col-md-6">

           <!--
           <form role="form" class="form-inline col-md-9 go-right" style="color: Green;background-color:#FAFAFF;border-radius:0px 22px 22px 22px;">
           -->
            <form action="" method="post" class="form-inline col-md-9 go-right" style="color: Green;background-color:#FAFAFF;border-radius:0px 22px 22px 22px;" id="myForm">
                <h2>Profile</h2>
                <p>Please update your profile for more security.</p>
                <div class="form-group">
                    <input id="Firstname" name="Firstname" value="<?=( isset( $_POST['Firstname'] ) ? $_POST['Firstname'] : '' )?>" type="text" class="form-control" required>
                    <label for="Firstname">First Name <span class="glyphicon glyphicon-user"> </span></label>
                </div>
                <div class="form-group">
                    <input id="Lastname" name="Lastname" value="<?=( isset( $_POST['Lastname'] ) ? $_POST['Lastname'] : '' )?>" type="text" class="form-control" required>
                    <label for="Lastname">Last Name <span class="glyphicon glyphicon-user"> </label>
                </div>
                <div class="form-group">
                    <input id="phone" name="phone" value="<?=( isset( $_POST['phone'] ) ? $_POST['phone'] : '' )?>" type="tel" class="form-control" required>
                    <label for="fphone">Phone Number <span class="glyphicon glyphicon-phone"></label>
                </div>
                <!--
                <div class="form-group">
                    <input id="Middlename" name="Middlename" type="text" class="form-control" placeholder="Middle Name">
                    <label for="Middlename">Middle Name <span class="glyphicon glyphicon-user"> </label>
                </div>
                -->
                <br>
                <br>
                <div class="form-group">
                    <input id="login" name="user" value="<?=( isset( $_POST['user'] ) ? $_POST['user'] : '' )?>" type="text" class="form-control" required>
                    <label for="login"> Login Name <span class="glyphicon glyphicon-user"></label>
                </div>


                <div class="form-group">
                    <input id="password" name="pass" value="<?=( isset( $_POST['pass'] ) ? $_POST['pass'] : '' )?>" type="password" class="form-control"  required>
                    <label for="sphone">Password <span class="glyphicon glyphicon-eye-open"></label>
                </div>
                <div class="form-group">
                    <input id="cPass" name="cPass" value="<?=( isset( $_POST['cPass'] ) ? $_POST['cPass'] : '' )?>" type="password" class="form-control"  required>
                    <label for="sphone">Confirm Password <span class="glyphicon glyphicon-eye-close"></label>
                </div>

                <br><br>
                <div class="form-group">
                    <select class="form-control" id="gender" name="gender" >


                        <option id="Male" Value="M" style="color:red" selected>Male</option>
                        <option id="FeMale" Value="FM"  style="color:green">Female</option>
                        <option id="NotInterested" Value="NI"  style="color:blue">Not interested</option>

                    </select>
                </div>

                <div class="form-group">
                    <input id="date" name="date" value="<?=( isset( $_POST['date'] ) ? $_POST['date'] : '' )?>" type="date" class="form-control">
                    <label for="date">DOB<span class="glyphicon glyphicon-calendar"></label>
                </div>
                <br><br>
                <div class="form-group">
                    <textarea id="message" name="description" class="form-control" style="width:400px;height:100px" >
                        <?=( isset( $_POST['description'] ) ? $_POST['description'] : '' )?>
                    </textarea>
                    <label for="message"><span class="glyphicon glyphicon-align-justify"></label>
                </div>
                <br><br>
                <div class="form-group">
                    <input id="Email1" name="mail" value="<?=( isset( $_POST['mail'] ) ? $_POST['mail'] : '' )?>" class="form-control" style="width:400px;" placeholder="Registered email" ></textarea>
                    <label for="Email1">Registered email <span class="glyphicon glyphicon-align-envelope"></label>
                </div>
                <br><br>
                <!--
                <div class="form-group">
                    <input id="Email2" name="phone" class="form-control" style="width:400px;" placeholder="Alternate email" ></textarea>
                    <label for="Email2">Alternate email <span class="glyphicon glyphicon-align-envelope"></label>
                </div>


                <br><br>
                <div class="form-group">
                    <input id="Vweb" name="phone" class="form-control" style="width:400px;" placeholder="Website" ></textarea>
                    <label for="Vweb">WebSite <span class="glyphicon glyphicon-align-envelope"></label>
                </div>

                <br>
                <br>
                -->
                <p1>Address</p1>
                <br>
                <div class="form-group">
                    <input id="Address" name="address" value="<?=( isset( $_POST['address'] ) ? $_POST['address'] : '' )?>" type="tel"  class="form-control" style="width:400px";  required>
                    <label for="Address">Flat NO/House No</label>
                </div>

                <br><br>
                <p1>Account Type</p1>
                <br>
                <div class="form-group">
                <select class="form-control" id="accountType" name="accountType" >

                    <option id="" Value="null" style="color:gray"  checked >Select Type</option>
                    <option id="" Value="Regular" style="color:#000000">Regular Account</option>
                    <option id="" Value="Business"  style="color:black">Business Account</option>

                </select>
                </div>



                <!--<span class="clearfix"></span>

               <div class="form-group">
                   <input id="LandMark" name="LandMark" type="text" class="form-control" placeHolder="Land Mark">
                   <label for="LandMark">Land Mark</label>
               </div>
               <br><br>
               <p3>(Enter Pincode/Area to pick your nearest location)<span class="glyphicon glyphicon-map-marker"></p3>
               <br><br>
               <div class="form-group" style="width: 600px" >
                   <input input id="autocomplete" name="LocationPicker" type="text" onFocus="geolocate()" style=" moz-border-radius: 22px;border-radius: 7px;"  >
                   <label for="LocationPicker">Location Picker</label>
               </div>
               <br><br>
               <div class="form-group">
                   <input id="route" name="route" type="tel" class="form-control"   required disabled="true">
                   <label for="route">Route/Locality</label>
               </div>
               <div class="form-group">
                   <input id="locality" name="locality" type="tel" class="form-control"   required disabled="true">
                   <label for="locality">City/Town</label>
               </div>
               <br>
               <div class="form-group">
                   <input id="administrative_area_level_2" name="administrative_area_level_2" type="tel" class="form-control"   required disabled="true">
                   <label for="administrative_area_level_2">District</label>
               </div>
               <div class="form-group">
                   <input id="administrative_area_level_1" name="administrative_area_level_1" type="tel" class="form-control"   required disabled="true">
                   <label for="administrative_area_level_1">State</label>
               </div>
               <br>
               <div class="form-group">
                   <input id="country" name="country" type="text" class="form-control"   required disabled="true">
                   <label for="country">Country</label>
               </div>
               <div class="form-group">
                   <input id="postal_code" name="postal_code" type="tel" class="form-control"   required disabled="true">
                   <label for="postal_code">Pin Code</label>
               </div>
                  -->
                <br><br>

                <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value=" signup ">
                <span><?php echo $error; ?></span>
                <!-- <button>
                    Save
                </button>
                -->
                <br>
                <br>
            </form>


        </div>
        <div  class="col-xs-1 col-md-1" id="Customer feed">
        </div>
    </div></div>



<script type="text/javascript">
    document.getElementById('gender').value = "<?php if ($_POST['gender'])  echo $_POST['gender']; else echo NI ?>";
</script>


<script src="../js/signup.js"></script>


</body>


</html>

