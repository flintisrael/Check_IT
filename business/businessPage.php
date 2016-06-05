<?php
//include('login/session.php');
include ($_SERVER['DOCUMENT_ROOT']."/checkit/login/session.php");
$bid = $_GET['bid'];
session_start();// Starting Session

if (isset($_POST['submit'])) {


    $errors = '';

    $login_user = $_SESSION['login_user'];
    $userIdQuery = "select id from Users where LoginName='$login_user'";
    $result = mysql_query($userIdQuery);
    $userId =  mysql_result($result, 0);


    $name = $_POST['Name'];
    $country= $_POST['Country'];
    $city= $_POST['City'];
    $street= $_POST['Street'];
    $houseNumber= $_POST['HouseNumber'];
    $phone= $_POST['Phone'];
    $mail= $_POST['Mail'];
    $description= $_POST['Description'];
    $lon= $_POST['Lon'];
    $lat= $_POST['Lat'];
    $BusinessType= $_POST['refType'];
    $Kosher= $_POST['Kosher'];
    $Gender= $_POST['Gender'];
    $Menu= $_POST['Menu'];
    $Type= $_POST['Type'];
    $Ages= $_POST['Ages'];
    $Category= $_POST['Category'];
    $facebookURL= $_POST['facebookURL'];



    $time = new DateTime();
    $datephp = $time->format('Y-m-d H:i:s');

    if($name == ''){
        $errors = "Name is Required. </br>".PHP_EOL;
    }
    if($BusinessType == -1){
        $errors.= PHP_EOL."Business Type is Required.</br>".PHP_EOL;
    }


   // if(isset($_FILES['image'])){
    if($_FILES['image']['name']){


        if ( 0 < $_FILES['image']['error'] ) {
           // die('teat3');
            $errors.= 'Error: ' . $_FILES['image']['error'];
        }
        else {
            //die('teat4');
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors.="please choose a JPEG or PNG or png file. </br>";
            }
            if($file_size > 2097152){
                $errors.='File size must be excately 2 MB .</br>';
            }

        }

    }
    //die('test');
    if($errors == ''){
  //      die('test');
        $sql= '';
        if($bid > 0){

            $sql .= "update Business set".
                 " TimeUpdated = '$datephp'".
                 " ,Name = '$name' ".
                 " ,Country = '$country'".
                 " ,City =  '$city' " .
                " ,Street = '$street'".
                " ,HouseNumber = '$houseNumber'".
                " ,Phone = '$phone' ".
                " ,Mail = '$mail' ".
                " ,Description = '$description'".
                " ,Lon = '$lon'".
                " ,Lat = '$lat'".
                " ,refType = '$BusinessType'".
                " ,Kosher = '$Kosher'".
                " ,Gender = '$Gender'".
                " ,Menu = '$Menu'".
                " ,Type = '$Type'".
                " ,Ages = '$Ages'".
                " ,Category = '$Category'".
                " ,facebookURL = '$facebookURL'".
                "  Where ID = $bid";


                mysql_query( $sql);

        }
        else if($bid == 0){
            $sql .= "INSERT INTO Business ".
                "(Id,TimeCreated,TimeUpdated,State,Name,Country,City,Street,HouseNumber,Phone,Mail, Description,refOwnerId,Lon,Lat,PhotoURL,refType,Kosher,Gender,Menu,Type,Ages,Category,facebookURL) ".
                "VALUES ".
                "(NULL,'$datephp','$datephp',1,'$name','$country','$city','$street','$houseNumber','$phone','$mail','$description','$userId','$lon','$lat',NULL,$BusinessType,$Kosher,$Gender,$Menu,$Type,$Ages,$Category,'$facebookURL')";
                mysql_query( $sql);
            $bid = mysql_insert_id();
        }
        //

       // if(isset($_FILES['image'])){
        if($_FILES['image']['name']){
            $name_img = "businessProfile-userid-".$userId."-business-".$bid."-".rand(0,10000000000000).".jpg";
            move_uploaded_file($file_tmp,"../image/businessProfile/".$name_img);
            $sql = "update Business set PhotoURL = '".$name_img."' where id = $bid";
            mysql_query( $sql);
        }


        header("location: businessmap.php");


    }
    else{
    // die($errors);

    }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="businessmap.php">Check IT</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ' '.$login_session; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="businessmap.php"><i class="fa fa-fw fa-map-marker"></i> My Map</a>
                    </li>
                    <li  <?php if($bid == 0) { ?> class="active" <?php } ?> >
                        <a href="businessPage.php?bid=0"><i class="fa fa-fw fa-folder-open"></i> Add New
                            Business</a>
                    </li>


                    <li class="graybackround">
                        <a class="disabled"><i class="fa fa-fw fa-dashboard"></i> Business Statistics</a>
                    </li>
                    <!--
                    <li>
                        <a href="#" data-toggle="modal" data-target="#createBusiness" class="">Add Business</a>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Add Business</a>
                    </li>
                    -->
                    <li <?php if($bid > 0) { ?> class="active" <?php }else{ ?> class="graybackround" <?php } ?>>
                        <a class="disabled"><i class="fa fa-fw fa-edit"></i> Edit Business Details</a>
                    </li>

                    <li>
                        <a href="generalstatistics.php"><i class="fa fa-fw fa-desktop"></i> General Statistics</a>
                    </li>
                    <li>
                        <a href="https://github.com/flintisrael/Check-IT/wiki"><i class="fa fa-fw fa-github"></i> About Us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <form role="form" method="post" enctype="multipart/form-data">

            <div class="container-fluid">

                <!-- General Input -->
                <div class="row inputfield" typeb="General">

                <div class="col-lg-12">
                    <h3>Business Details</h3>
                </div>
                <div class="col-lg-12">
                   <label style="color: #ff0000"><?php echo $errors ?></label>
                </div>
                    <div class="col-lg-12">
                        <div class="col-xs-6 col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" name="Name" class="form-control" placeholder="Business Name" />
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" id="phone" name="Phone" class="form-control" placeholder="Phone Number" />
                            </div>
                        </div>


                        <div class="col-xs-6 col-md-4">
                            <div class="form-group">
                                <label>Profile Business Image</label>


                                <input type="file" name="image" id="image" class="filestyle" style="float: left" data-input="false" data-buttonName="btn btn-primaryt">

                                <span><?php echo $error; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <label>Mail</label>
                                <input type="text" id="mail" name="Mail" class="form-control" placeholder="Mail Address"/>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <label>Business Type</label>

                                <?php

                                $query = "SELECT TypeName,Id FROM BusinessType where state = 1 ";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control"  id="BusinessType" name="refType" placeholder="Business Type"/>
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['TypeName']."</option>";
                                    }
                                    ?>
                                </select>

                            </div>


                        </div>
                    </div>
                    <div class="col-lg-12">

                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" id="country" name="Country" class="form-control address" placeholder="Country Name"/>
                            </div>
                        </div>

                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" id="city" name="City" class="form-control address" placeholder="City Name"/>
                            </div>
                        </div>

                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <label>Street</label>
                                <input type="text" id="street" name="Street" class="form-control address" placeholder="Street Name"/>
                            </div>
                        </div>

                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <label>House Number</label>
                                <input type="text" id="house" name="HouseNumber" class="form-control address" placeholder="House Number"/>
                            </div>
                        </div>



                    <div class="col-lg-12">




                        <div  style="width: 50%;float: left;clear: both;padding-top: 6px; padding-top: 20px;">
                            <div style="width: 100%;float: left;padding-top: 2px;clear: both">

                                    <div class="form-group">
                                        <label>Description</label>

                                        <textarea id="description" name="Description" style="width: 100%;height: 100px;" class="form-control" value="Describe yourself here..."/>
                                        </textarea>

                                    </div>
                            </div>
                        </div>

                        <div style="width: 50%;float: left;text-align: center;padding-top: 30px;">
                            <img src="http://maps.googleapis.com/maps/api/staticmap?center=40.702147,-74.015794&zoom=16&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&size=200x200&sensor=false" alt="..." class="img-circle" id="mapBusinessLocation" style="visibility: hidden">
                        </div>
                        <input type="hidden" id="lat" name="Lat" value="">
                        <input type="hidden" id="long" name="Lon" value="">
                    </div>
                    <div class="col-lg-12">
                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" id="facebookURL" name="facebookURL" class="form-control" placeholder="Facebook URL"/>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.row -->

                </div>

                <div class="row inputfield" typeb="Restaurant">

                    <div class="col-lg-12" style="padding-top: 35px">
                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label>Restaurant Type</label>

                                <!--
                                <select class="form-control" id="Kosher">
                                    <option value=-1>select</option>
                                    <option value=1>Asian Fusion</option>
                                    <option value=2>Breakfast & Brunch</option>
                                    <option value=3>Burgers</option>
                                    <option value=4>Cafes</option>
                                    <option value=5>French</option>
                                    <option value=6>Italian</option>
                                    <option value=7>Mexican</option>
                                    <option value=8>Pizza</option>
                                    <option value=9>Sandwiches</option>
                                    <option value=10>Seafood</option>
                                    <option value=11>Breakfast & Brunch</option>
                                    <option value=12>Sushi Bars</option>
                                     </select>-->
                                <?php

                                $query = "select DisplayName as Name,Id FROM GenericOptionTypes where state = 1 and refEntityid = 1 and FieldName = 'Type'";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control" id="Type" name="Type">
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['Name']."</option>";
                                    }
                                    ?>
                                </select>


                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label>Menu Type</label>
                                <!--
                                <select class="form-control" id="Kosher">
                                    <option value=-1>select</option>
                                    <option value=1>Diary</option>
                                    <option value=2>Meaty</option>
                                    <option value=3>Both</option>

                                </select>
                                !-->
                                <?php

                                $query = "select DisplayName as Name,Id FROM GenericOptionTypes where state = 1 and refEntityid = 1 and FieldName = 'Menu'";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control" id="Menu" name="Menu">
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['Name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label>Kosher</label>
                                <?php

                                $query = "SELECT DisplayName as Name,Id FROM GenericOptionTypes where state = 1 and refEntityid = 1 and FieldName = 'Kosher'";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control" id="Kosher" name="Kosher">
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['Name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row inputfield" typeb="Fashion">
                    <div class="col-lg-12" style="padding-top: 35px">

                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <?php

                                $query = "select DisplayName as Name,Id FROM GenericOptionTypes where state = 1 and refEntityid = 1 and FieldName = 'Gender'";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control" id="Gender" name="Gender">
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['Name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label>Ages</label>
                                <!--
                                <select class="form-control" id="Kosher">
                                    <option value=-1>select</option>
                                    <option value=1>Adults</option>
                                    <option value=2>Children</option>
                                    <option value=3>Babies</option>
                                    <option value=4>All</option>


                                </select>-->

                                <?php

                                $query = "select DisplayName as Name,Id FROM GenericOptionTypes where state = 1 and refEntityid = 1 and FieldName = 'Ages'";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control" id="Ages" name="Ages">
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['Name']."</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <!--
                                <select class="form-control" id="Kosher">
                                    <option value=-1>select</option>
                                    <option value=1>Shopping</option>
                                    <option value=2>Accessories</option>
                                    <option value=3>Shoe Stores</option>
                                    <option value=4>Sporting Goods</option>
                                    <option value=5>Sports Wear</option>
                                    <option value=6>Used, Vintage & Consignment</option>
                                    <option value=7>Lingerie</option>

                                </select>
                                -->

                                <?php

                                $query = "SELECT DisplayName as Name,Id FROM GenericOptionTypes where state = 1 and refEntityid = 1 and FieldName = 'Category'";
                                $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                ?>
                                <select class="form-control" id="Category" name="Category">
                                    <?php
                                    echo "<option value=-1>select</option>";
                                    while ($row = mysql_fetch_array($result))
                                    {
                                        echo "<option value=".$row['Id'].">".$row['Name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>






                <div class="row">
                    <div class="col-lg-6">



                            <!---
                            <div class="form-group">
                                <label>Text Input</label>
                                <input class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>

                            <div class="form-group">
                                <label>Text Input with Placeholder</label>
                                <input class="form-control" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label>Static Control</label>
                                <p class="form-control-static">email@example.com</p>
                            </div>

                            <div class="form-group">
                                <label>File input</label>
                                <input type="file">
                            </div>

                            <div class="form-group">
                                <label>Text area</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Checkboxes</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Checkbox 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Checkbox 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Checkbox 3
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Inline Checkboxes</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox">1
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox">2
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox">3
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Radio Buttons</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Inline Radio Buttons</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Selects</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Multiple Selects</label>
                                <select multiple class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            --->

                            <br><br><br><br>
                            <input class="btn btn-default" name="submit" type="submit" value="Submit Button" onclick="return confirm('Are you sure you want to do that?');">
                            <button type="reset" class="btn btn-default">Reset Button</button>

                            <br><br><br><br>


                    </div>

                    <!--
                    <div class="col-lg-6">
                        <h1>Disabled Form States</h1>

                        <form role="form">

                            <fieldset disabled>

                                <div class="form-group">
                                    <label for="disabledSelect">Disabled input</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-control">
                                        <option>Disabled select</option>
                                    </select>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Disabled Checkbox
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary">Disabled Button</button>

                            </fieldset>

                        </form>

                        <h1>Form Validation</h1>

                        <form role="form">

                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Input with success</label>
                                <input type="text" class="form-control" id="inputSuccess">
                            </div>

                            <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">Input with warning</label>
                                <input type="text" class="form-control" id="inputWarning">
                            </div>

                            <div class="form-group has-error">
                                <label class="control-label" for="inputError">Input with error</label>
                                <input type="text" class="form-control" id="inputError">
                            </div>

                        </form>

                        <h1>Input Groups</h1>

                        <form role="form">

                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                                <input type="text" class="form-control" placeholder="Font Awesome Icon">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>

                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                            </div>

                        </form>

                        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-filestyle.js"></script>
    <script src="../js/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="../js/Business/businessPage.js"></script>


</body>

</html>
