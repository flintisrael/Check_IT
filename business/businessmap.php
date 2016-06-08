<?php
/*
  Main page to business users
  All businesses of the current user load on map by businessmap.js file
 */
include ($_SERVER['DOCUMENT_ROOT']."/checkit/login/session.php");
?>

<!DOCTYPE html>
<!-- jQuery -->
<html lang="en">

<head>

    <script src="../js/jquery.js"></script>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2utj97_zw9uvYkmIKQ8UhW1T9Bi9NIaY">
    </script>
    <script src="../js/bootstrap-filestyle.js"></script>
    <script src="../js/bootstrap-filestyle.min.js"></script>
    <script src="../js/Business/BusinessMap.js"></script>
    <script src="../js/bootbox.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script src="../js/Business/Business.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Check IT</title>

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
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
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
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
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
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
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

                    <li class="active">
                        <a href="businessmap.php"><i class="fa fa-fw fa-map-marker"></i> My Map</a>
                    </li>
                    <li>
                        <a href="businessPage.php?bid=0"><i class="fa fa-fw fa-folder-open"></i> Add New Business</a>
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
                    <li class="graybackround">
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

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="row">
                            <div style="width: 100%;height: 100%; float: left;text-align: center;">
                                <div id="businessmap" style="width:100%;height:610px;text-align: center "></div>
                             </div>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <div class="modal fade" id="createBusiness" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Create New Business</h4>
                </div>
                <form class="contact" action="createBusiness.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <div  style="width: 100%;float: left;padding-top: 20px">
                                        <div style="width: 10%">
                                            <label style="float: left;padding-right: 10px; padding-top: 6px;">Name</label>
                                        </div>
                                        <input type="text" id="name" name="name" class="input-sm col-lg-4" placeholder="Business Name" style="padding-left: 2px;width: 80%;float: left"/>

                                    </div>

                                    <div  style="width: 100%;float: left;padding-top: 20px">
                                        <div style="width: 10%">
                                            <label style="float: left;padding-right: 10px; padding-top: 6px;">Phone</label>
                                        </div>
                                        <input type="text" id="phone" name="phone" class="input-sm col-lg-4" placeholder="Phone Number" style="padding-left: 2px;width: 34%;float: left"/>

                                        <div>
                                            <label style="float: left;padding-right: 10px; padding-left: 20px; padding-top: 6px;">Mail</label>
                                        </div>
                                        <input type="text" id="mail" name="mail" class="input-sm col-lg-4" placeholder="Mail Address" style="padding-left: 2px;width: 34%;float: left"/>

                                    </div>


                                    <div  style="width: 100%;float: left;padding-top: 20px">
                                        <div style="width: 10%">
                                            <label style="float: left;padding-right: 10px; padding-top: 6px;">Country</label>
                                        </div>
                                        <input type="text" id="country" name="country" class="input-sm col-lg-4 address" placeholder="Country Name" style="padding-left: 2px;width: 30;float: left"/>

                                        <div>
                                            <label style="float: left;padding-right: 10px; padding-left: 20px; padding-top: 6px;">City</label>
                                        </div>
                                        <input type="text" id="city" name="city" class="input-sm col-lg-4 address" placeholder="City Name" style="padding-left: 2px;width: 33%;float: left"/>
                                    </div>

                                    <div  style="width: 100%;float: left;padding-top: 20px">
                                        <div>
                                            <label style="float: left;padding-right: 10px; padding-top: 6px;">Street</label>
                                        </div>
                                        <input type="text" id="street" name="street" class="input-sm col-lg-4 address" placeholder="Street Name" style="padding-left: 2px;width: 45%;float: left"/>

                                        <div>
                                            <label style="float: left;padding-right: 10px; padding-left: 20px; padding-top: 6px;">Number</label>
                                        </div>
                                        <input type="text" id="house" name="house" class="input-sm col-lg-4 address" placeholder="House Number" style="padding-left: 2px;width: 19%;float: left"/>
                                    </div>
                                    <div  style="width: 50%;float: left;padding-top: 20px">
                                        <div>
                                            <label style="width: 50%;float: left">profile business image</label>
                                        </div>
                                        <input type="file" name="image" id="image" class="filestyle" style="width: 50%;float: left" data-input="false" data-buttonName="btn btn-primaryt">
                                        <span><?php echo $error; ?></span>
                                    </div>



                                    <div  style="width: 50%;float: left;padding-top: 20px">
                                        <div>
                                            <label style="width: 50%;float: left">Business Type</label>
                                        </div>
                                        <?php

                                        $query = "SELECT TypeName,Id FROM BusinessType where state = 1 ";
                                        $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                        ?>
                                        <select class="form-control" style="width: 50%;float: left" id="BusinessType">
                                            <?php
                                            echo "<option value=-1>select</option>";
                                            while ($row = mysql_fetch_array($result))
                                            {
                                                echo "<option value=".$row['Id'].">".$row['TypeName']."</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <input type="hidden" id="lat" name="lat" value="">
                                    <input type="hidden" id="long" name="long" value="">

                                    <div  style="width: 50%;float: left;clear: both;padding-top: 6px; padding-top: 20px;">
                                        <div style="width: 100%;float: left;padding-top: 2px;clear: both">
                                            <div>
                                                <label style="float: left;padding-right: 10px; padding-top: 6px;">Description</label>
                                            </div>
                                            <textarea id="description" style="width: 100%;height: 100px;" value="Describe yourself here..."/>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div style="width: 50%;float: left;text-align: center;padding-top: 2px;">
                                        <img src="http://maps.googleapis.com/maps/api/staticmap?center=40.702147,-74.015794&zoom=16&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&size=200x200&sensor=false" alt="..." class="img-circle" id="mapBusinessLocation" style="visibility: hidden">
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addBusiness">Add Business</button>
                </div>
            </div>
        </div>
    </div>






</body>


</html>
