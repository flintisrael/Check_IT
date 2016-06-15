<?php
include ($_SERVER['DOCUMENT_ROOT']."/checkit/login/session.php");
    $bid = $_GET['bid'];
    $btype = $_GET['btype'];
date_default_timezone_set("Asia/Jerusalem");

if (isset($_POST['addfeedback'])) {

    $commit = $_POST['comment'];



    $login_user = $_SESSION['login_user'];
    $userIdQuery = "select id from Users where LoginName='$login_user'";
    $result = mysql_query($userIdQuery);
    $userId =  mysql_result($result, 0);

    $commentTypeIdQuery = "select id from FeedType where Name='comment'";
    $result = mysql_query($userIdQuery);
    $commentTypeId =  mysql_result($result, 0);
    $sql ='';
    $temp12 = '';
    $time = new DateTime();

    $datephp = $time->format('Y-m-d H:i:s');




    foreach (array_keys($_POST) as $field)
    {
        $tempfield = $_POST[$field];

        if($tempfield != '' && $tempfield != '0' ){

            $sql = "insert into Feeds (Id,TimeCreated, TimeUpdated, Description, refUserId, refBusinessId, refFeedTypeId , State)
                select null , '$datephp', '$datephp', '$tempfield' , $userId ,$bid ,id , 1
                from FeedType where Name='$field';";
            //die($sql);
            mysql_query($sql);
        }
    }
  //die($sql);
/*

    if($commit != ''){

        $sql .= "insert into Feeds (Id,TimeCreated, TimeUpdated, Description, refUserId, refBusinessId, refFeedTypeId , State)
            values (null,CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$commit',$userId , $bid , $commentTypeId, 1 )";
    }
*/
    //INSERT INTO user (id, name, username, opted_in)
    //SELECT id, name, username, opted_in
  //FROM user LEFT JOIN user_permission AS userPerm ON user.id = userPerm.user_id


    echo "<script>
    alert('Thank you for your cooperation');
    window.location.href='map.php';

    </script>";



   // header("location: map.php");

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

    <title>Check IT - Feed</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!--  <script src="js/star-rating.js"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/star-rating.min.js"></script>
    <script src="js/feeds.js"></script>

    <!-- <link href="css/star-rating.css" rel="stylesheet"> -->
    <link href="css/star-rating.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="BusinessRealtimeDetails.php">Check IT</a>
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
                            <a href="#" onClick="bootbox.alert('Page Under Construction')"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#" onClick="bootbox.alert('Page Under Construction')"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#" onClick="bootbox.alert('Page Under Construction')"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li>
                        <a href="map.php"><i class="fa fa-fw fa-map-marker"></i> My Map</a>
                    </li>
                    <li class="graybackround">
                        <a class="disabled"><i class="fa fa-fw fa-filter"></i> Filter Businesses</a>
                    </li>
                    <li class="active">
                        <a class="disabled"><i class="fa fa-fw fa-tachometer"></i> Business Statistics</a>
                    </li>
                    <li class="graybackround">
                        <a class="disabled"><i class="fa fa-fw fa-desktop"></i> Business Details</a>
                    </li>
                    <li class="graybackround">
                        <a class="disabled"><i class="fa fa-fw fa-pencil-square-o"></i> Write Review</a>
                    </li>
                    <li>
                        <a href="#" onClick="bootbox.alert('Page Under Construction')"><i class="fa fa-fw fa-users"></i> Find Friends</a>
                    </li>
                    <li>
                        <a href="#" onClick="bootbox.alert('Page Under Construction')"><i class="fa fa-fw fa-list-ul"></i> Forum</a>
                    </li>
                    <li>
                        <a href="https://github.com/flintisrael/Check-IT/wiki"><i class="fa fa-fw fa-github"></i> About Us</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin-left:270px">
                            Business Feedback

                    </div>
                </div>
                <!-- /.row -->
                <form role="form" method="post">
                <div class="row">
                    <div class="col-lg-6">

                        <h3 class="page-header">
                            General Feedback
                        </h3>
                        <?php

                        $query = "SELECT Name,displayName FROM FeedType where refBusinessTypeId = 0 and typeValue = 'float'";
                        $result = mysql_query($query) or die(mysql_error()."[".$query."]");


                        while ($row = mysql_fetch_array($result))
                        {
                            $lable = '';
                            if($row['displayName']){
                                $lable =  $row['displayName'];
                            }
                            else{
                                $lable =  $row['Name'];
                            }
                            echo "<div class="."form-group global feedback"." typeb="."global".">".
                                "<label>$lable</label>".
                                "<input type="."text"." id=".$row['Name']." name=".$row['Name']." class="."rating rating-loading"." value="."0"." data-size="."xs"." title=".">".
                            "</div>";

                        }
                        ?>
                        <!--
                            <div class="form-group global feedback" typeb="global">
                                <label>Parking Nearby</label>
                                <input type="text" id="parkingGlobal" name="parkingGlobal" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group global feedback" typeb="global">
                                <label>Courtesy</label>
                                <input type="text" id="courtesyGlobal" name="courtesyGlobal" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group global feedback" typeb="global">
                                <label>General Atmosphere</label>
                                <input type="text" id="atmosphereGlobal" name="atmosphereGlobal" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group global feedback" typeb="global">
                                <label>Service</label>
                                <input type="text" id="serviceGlobal" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group global feedback" typeb="global">
                                <label>Payment Value</label>
                                <input type="text" id="payValGlobal" name="payValGlobal" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group global feedback" typeb="global">
                                <label>Customer's Experience</label>
                                <input type="text" id="experienceGlobal" name="experienceGlobal" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                        -->




<!---------------------------------------------------------------------------------------------------------------
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
                                        <input type="radio"  id="optionsRadios1" value="option1" checked>Radio 1
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio"  id="optionsRadios2" value="option2">Radio 2
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" id="optionsRadios3" value="option3">Radio 3
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Inline Radio Buttons</label>
                                <label class="radio-inline">
                                    <input type="radio"  id="optionsRadiosInline1" value="option1" checked>1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio"  id="optionsRadiosInline2" value="option2">2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="optionsRadiosInline3" value="option3">3
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

                            <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value=" signup ">
                                -->




                    </div>

                    <div class="col-lg-6">

                        <h3 class="page-header">
                            Categorized Feedback
                        </h3>
                        <?php

                      //  $query = "SELECT Name,displayName FROM FeedType where refBusinessTypeId = 0 and typeValue = 'float'";
                        $query = "SELECT FT.Name, FT.displayName
                                   FROM
                                FeedType FT
                                INNER Join
                                 BusinessType BT on BT.id = FT.refBusinessTypeId
                                WHERE
                              FT.typeValue = 'float' AND BT.TypeName = '$btype'";
                        $result = mysql_query($query) or die(mysql_error()."[".$query."]");


                        while ($row = mysql_fetch_array($result))
                        {
                            $lable = '';
                            if($row['displayName']){
                                $lable =  $row['displayName'];
                            }
                            else{
                                $lable =  $row['Name'];
                            }
                            echo "<div class="."form-group global feedback"." typeb=".$btype.">".
                                "<label>$lable</label>".
                                "<input type="."text"." id=".$row['Name']." name=".$row['Name']." class="."rating rating-loading"." value="."0"." data-size="."xs"." title=".">".
                                "</div>";

                        }
                        ?>
                        <!--
                            <div class="form-group Restaurant feedback" typeb="Restaurant" >
                                <label>Density</label>
                                <input type="text" id="densityRest" name="densityRest"  class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group Restaurant feedback" typeb="Restaurant">
                                <label>Food Quality</label>
                                <input type="text" id="foodQualityRest" name="foodQualityRest" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group Fashion feedback" typeb="Fashion">
                                <label>Density</label>
                                <input type="text" id="densityFash" name="densityFash" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group Fashion feedback" typeb="Fashion">
                                <label>Clothes Quality</label>
                                <input type="text" id="clotheQualFash" name="clotheQualFash" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group Fashion feedback" typeb="Fashion">
                                <label>Clothes Range</label>
                                <input type="text" id="rangeFash" name="rangeFash" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group Fashion feedback"  typeb="Fashion">
                                <label>Clothes Store</label>
                                <input type="text" id="storeFash" name="storeFash" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>

                            <div class="form-group Fashion feedback" typeb="Fashion">
                                <label>Clothes Sales</label>
                                <input type="text" id="salesFash" name="salesFash" class="rating rating-loading" value="0" data-size="xs" title="">
                            </div>
                         -->
                            <!---
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

                        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/feeds.php#forms">Bootstrap's Form Documentation</a>.</p>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
            <div class="form-group feedback" typeb="global" style="margin-left: 250px  ; width: 400px">
                <label style="margin-left: 155px">Comment</label>
                <textarea class="form-control" rows="3" name="comment" placeholder="                                Your Feedback"></textarea>
                <p class="help-block">For Example: Nice sales now</p>
            </div>


            <button type="submit" name="addfeedback" class="btn btn-default" style="margin-left: 325px; margin-top: 10px; margin-bottom: 15px">Rate Business</button>
            <button type="reset" class="btn btn-default" style="margin-top: 10px; margin-left: 5px; margin-bottom: 15px" >Reset Rating</button>
            </form>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.js"></script>

</body>



</html>
