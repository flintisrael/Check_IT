<?php
//include('login/session.php');
include ($_SERVER['DOCUMENT_ROOT']."/checkit/login/session.php");
?>
<!DOCTYPE html>
<!-- jQuery -->
<html lang="en">

<head>

    <script src="js/jquery.js"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2utj97_zw9uvYkmIKQ8UhW1T9Bi9NIaY">
    </script>

    <script src="js/map.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootbox.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slider_range.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Check IT</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href = "css/slider_range.css" rel = "stylesheet"  >
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
                <a class="navbar-brand" href="map.php">Check IT  </a>
                <a class="navbar-brand" ></a>
                <a class="navbar-brand" ></a>
                <a class="navbar-brand" ></a>
                <a class="navbar-brand" ></a>
                <a class="navbar-brand" ></a>
                <a class="navbar-brand" ></a>
                <a class="navbar-brand" ></a>

                <a href="#" class="navbar-brand" style="color: rgb(204, 104, 34);margin-left: -133px;" data-toggle="modal" data-target="#changeLocation" id="loc_change">Change Location</a>
                <a class="navbar-brand" id="MyLocation">No location found</a>


                <ul class="nav navbar-nav">
                    <!--
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>
                    -->

<!--
                    <li><h4 style="padding-top: 6px;"><a href="#" data-toggle="modal" data-target="#changeLocation" id="loc_change" style="color: rgb(204, 104, 34);">Change Location</a></h4></li>
-->


                </ul>

                <!--<a class="navbar-brand" id="MyLocation">No location found</a>-->
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
                                        <img class="media-object " src="http://placehold.it/50x50" alt="">
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
                            <a href="#" data-toggle="modal" data-target="#filter">Businesses Filter</a>
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
                    <li class="active">
                        <a href="map.php"><i class="fa fa-fw fa-map-marker"></i> My Map</a>
                    </li>
                    <?php if ($login_session == 'admin'){ ?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Excel reports <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="excel/reports/Signup-Rate.xlsm"><img border="0" alt="W3Schools" src="image/icon/excel.jpg" width="20" height="20"> Signup Rate</a>
                                </li>
                                <li>
                                    <a href="excel/reports/Signup-Rate-By-Month.xlsm"><img border="0" alt="W3Schools" src="image/icon/excel.jpg" width="20" height="20"> Signup Rate By Month</a>
                                </li>
                                <li>
                                    <a href="excel/reports/User-Activity-By-Day-Of-Week.xlsm"><img border="0" alt="W3Schools" src="image/icon/excel.jpg" width="20" height="20"> User Activity By Day Of Week</a>
                                </li>
                                <li>
                                    <a href="excel/reports/Bussiness-Adding-vs.-Users-Signup.xlsm"><img border="0" alt="W3Schools" src="image/icon/excel.jpg" width="20" height="20"> Bussiness Adding vs. Users Signup</a>
                                </li>
                                <li>
                                    <a href="excel/reports/Users-Activity-By-Distance-From-Center%20.xlsm"><img border="0" alt="W3Schools" src="image/icon/excel.jpg" width="20" height="20"> Users Activity By Distance From Center</a>
                                </li>
                                <li>
                                    <a href="excel/reports/Users-activity-by-Business-Type.xlsm"><img border="0" alt="W3Schools" src="image/icon/excel.jpg" width="20" height="20"> Users activity by Business Type</a>
                                </li>
                            </ul>
                        </li>
                    <?php }
                    ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#filter" ><i class="fa fa-fw fa-filter"></i> Filter Businesses</a>
                    </li>
                    <li class="graybackround">
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
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="row">
                            <div style="width: 100%;height: 100%; float: left;text-align: center;">
                                <div id="maptest" style="width:100%;height:610px;text-align: center "></div>
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
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Search For Businesses</h4>
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
                                            <input type="text" id="namefilter" name="name" class="input-sm col-lg-4" placeholder="Business Name" style="padding-left: 2px;width: 80%;float: left"/>

                                        </div>

                                        <div  style="width: 100%;float: left;padding-top: 20px">
                                            <div style="width: 10%">
                                                <label style="float: left;padding-right: 10px; padding-top: 6px;">City</label>
                                            </div>
                                            <input type="text" id="cityfilter" name="cityfilter" class="input-sm col-lg-4" placeholder="City Name" style="padding-left: 2px;width: 40%%;float: left"/>

                                            <div>
                                                <label style="float: left;padding-right: 10px; padding-left: 20px; padding-top: 6px;">Street</label>
                                            </div>
                                            <input type="text" id="streetfilter" name="streetfilter" class="input-sm col-lg-4" placeholder="Street Name" style="padding-left: 2px;width: 33%;float: left"/>
                                        </div>

                                        <div  style="width: 100%;float: left;padding-top: 20px">
                                            <div class="checkbox" style="width: 30%;float: left;">
                                                <label>
                                                    <input type="checkbox" id="rangeCheckbox">range filter
                                                </label>
                                            </div>
                                            <div class="range" id="rangefilterpar" style="width: 70%;float: left;margin-left: -63px;margin-top: 8px;">
                                                <input type="range" id="rangefilter" disabled="false" name="range" step="0.1" min="1" max="100" value="50" onchange="range.value=value">
                                                <output id="range">50</output>
                                            </div>
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
<!--
                                        </div>
                                        <div  style="width: 50%;float: left;padding-top: 20px">
                                            <input id="jim" name="jim" type="range" min=1 max=100 value=1>
                                            <output1 for="jim">1</output1>

                                        </div>
                                        -->


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="filterSearch">search</button>
                    </div>
            </div>
        </div>
    </div>

</div>
    <!-- Modal Location Change --->
        <div class="modal fade" id="changeLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Change Your Location</h4>
                    </div>
                    <form class="contact"  enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div  style="width: 100%;float: left;padding-top: 20px">
                                                <div style="width: 30%">
                                                    <label style="float: left;padding-right: 10px; padding-top: 6px;">Insert Location</label>
                                                </div>
                                                <input type="text" id="locationName" name="name" class="input-sm col-lg-4" placeholder="New Location" style="padding-left: 2px;width: 70%;float: left"/>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="changeLoc">change</button>
                        </div>
                </div>
            </div>
        </div>




    </div>

</body>


</html>
