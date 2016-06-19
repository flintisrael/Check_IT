<?php
//include('login/login.php'); // Includes Login Script

include ($_SERVER['DOCUMENT_ROOT']."/checkit/login/login.php");

if(isset($_SESSION['login_user'])){
    if($_SESSION['accountTypeName'] == 'Regular'){
        header("location: map.php");
    }
    if($_SESSION['accountTypeName'] == 'Business'){
        header("location: business/businessmap.php");
    }

   // echo getcwd() . "\n";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login To Check IT</title>

    <!--
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/iconmoreinfo.css" rel="stylesheet" type="text/css">

    <style>
        #googlemaps {
        height: 100%;
        width: 100%;
        position:absolute;
        top: 0;
        left: 0;
        z-index: 0; /* Set z-index to 0 as it will be on a layer below the contact form */
        }
    </style>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>

<div id="googlemaps"></div>
<div id="main">


        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please sign in</h3>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="user name" name="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                        </label>
                                        <a href="login/test.php" class="pull-right need-help">Create an account  </a><span class="clearfix"></span>
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value=" Login ">
                                    <span><?php echo $error; ?></span>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

<script type="text/javascript">
    /*
    $(document).ready(function(){
        $(document).mousemove(function(e){
            TweenLite.to($('body'),
                .5,
                { css:
                {
                    backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
                }
                });
        });
    });
    */
</script>

<!-- Include the Google Maps API library - required for embedding maps -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">

    // The latitude and longitude of your business / place

    var lat = 31.7;
    var long = 35.21953;

    var position = [lat, long];
   
    var latmoreinfo = (lat - 3.0);
    var longmoreinfow = (long - 2);



    function showGoogleMaps() {

        var latLng = new google.maps.LatLng(position[0], position[1]);

        var mapOptions = {
            zoom: 9, // initialize zoom level - the max value is 21
            streetViewControl: false, // hide the yellow Street View pegman
            scaleControl: true, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: latLng
        };

        map = new google.maps.Map(document.getElementById('googlemaps'),
            mapOptions);

        // InfoWindow content
        var content = '<div id="iw-container">' +
            '<div class="iw-title">Welcome to CheckIT</div>' +
            '<div class="iw-content">' +
            '<img src="image/icon/check-it.png" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
            '<p>CheckITis the best way to find great local businesses. People use CheckIT to search for everything from the tastiest burger in the city to the most renowned cardiologist.</p>' +
            '<br>'+
            '<p>Sign up and get updated with everything going on around you!'+
            '<br>'+
            '<p>What will you uncover in your neighborhood?!'+
            '</div>' +
            '<div class="iw-bottom-gradient"></div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content:content
            // Assign a maximum value for the width of the infowindow allows
            // greater control over the various content elements

        });

        var IconURL = 'image/icon/check-it.png';

        var testtitle = '<font color="green">This is some text!</font> another text';

        // *
        // START INFOWINDOW CUSTOMIZE.
        // The google.maps.event.addListener() event expects
        // the creation of the infowindow HTML structure 'domready'
        // and before the opening of the infowindow, defined styles are applied.
        // *
        google.maps.event.addListener(infowindow, 'domready', function() {

            // Reference to the DIV that wraps the bottom of infowindow
            var iwOuter = $('.gm-style-iw');

            /* Since this div is in a position prior to .gm-div style-iw.
             * We use jQuery and create a iwBackground variable,
             * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
             */
            var iwBackground = iwOuter.prev();

            // Removes background shadow DIV
            iwBackground.children(':nth-child(2)').css({'display' : 'none'});

            // Removes white background DIV
            iwBackground.children(':nth-child(4)').css({'display' : 'none'});

            // Moves the infowindow 115px to the right.
            iwOuter.parent().parent().css({left: '115px'});

            // Moves the shadow of the arrow 76px to the left margin.
            iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

            // Moves the arrow 76px to the left margin.
            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

            // Changes the desired tail shadow color.
            iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

            // Reference to the div that groups the close button elements.
            var iwCloseBtn = iwOuter.next();

            // Apply the desired effect to the close button
            iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

            // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
            if($('.iw-content').height() < 140){
                $('.iw-bottom-gradient').css({display: 'none'});
            }

            // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
            iwCloseBtn.mouseout(function(){
                $(this).css({opacity: '1'});
            });
        });

        latmoreinfo = (lat - 3.0);
        longmoreinfow = (long - 2);


        infowindow.setPosition({latmoreinfo, longmoreinfow});
        infowindow.open(map);

        if(navigator.geolocation) {
            browserSupportFlag = true;
            navigator.geolocation.getCurrentPosition(function(position) {

                lat = position.coords.latitude;
                long = position.coords.longitude;

                latmoreinfo = (lat - 3.0);
                longmoreinfow = (long - 2);


                infowindow.setPosition({latmoreinfo, longmoreinfow});
              ///  infowindow.open(map);


                var initialLocation = new google.maps.LatLng(lat,long);
                map.setCenter(initialLocation);
            }, function() {
                handleNoGeolocation(browserSupportFlag);
            });
        }
        // Browser doesn't support Geolocation
        else {

            browserSupportFlag = false;
            handleNoGeolocation(browserSupportFlag);
        }

        function handleNoGeolocation(errorFlag) {
            var initialLocation;

            var israel = new google.maps.LatLng(lat, long);
            latmoreinfo = (lat - 3.0);
            longmoreinfow = (long - 2);

            infowindow.setPosition({latmoreinfo, longmoreinfow});
        //    infowindow.open(map);


            if (errorFlag == true) {
                initialLocation = israel;
            } else {
                initialLocation = israel;
            }
            var styles = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"color":"#e3b141"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#e0a64b"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"color":"#0e0d0a"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#d1b995"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#12120f"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"lightness":"-77"},{"gamma":"4.48"},{"saturation":"24"},{"weight":"0.65"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"lightness":29},{"weight":0.2}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#f6b044"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#4f4e49"},{"weight":"0.36"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#c4ac87"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"color":"#262307"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#a4875a"},{"lightness":16},{"weight":"0.16"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#deb483"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0f252e"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#080808"},{"gamma":"3.14"},{"weight":"1.07"}]}];
              //  var styles = [{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"off"}]}];
                map.setOptions({styles: styles});
                map.setCenter(initialLocation);
        }


    }

    google.maps.event.addDomListener(window, 'load', showGoogleMaps);
</script>
</body>
</html>