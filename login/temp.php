<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form in PHP with Session</title>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet" type="text/css">


    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<div id="main">


    <div class="container">
        <div  class="col-xs-4 col-md-6">

            <form role="form" class="form-inline col-md-9 go-right" style="color: Green;background-color:#FAFAFF;border-radius:0px 22px 22px 22px;">
                <h2>Profile</h2>
                <p>Please update your profile for more security.</p>
                <div class="form-group">
                    <input id="Firstname" name="Firstname" type="text" class="form-control" required>
                    <label for="Firstname">First Name <span class="glyphicon glyphicon-user"> </span></label>
                </div>
                <div class="form-group">
                    <input id="Lastname" name="Lastname" type="text" class="form-control" required>
                    <label for="Lastname">Last Name <span class="glyphicon glyphicon-user"> </label>
                </div>
                <div class="form-group">
                    <input id="Middlename" name="Middlename" type="text" class="form-control" placeholder="Middle Name">
                    <label for="Middlename">Middle Name <span class="glyphicon glyphicon-user"> </label>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <input id="phone" name="phone" type="tel" class="form-control" required>
                    <label for="fphone">Primary Phone <span class="glyphicon glyphicon-phone"></label>
                </div>
                <div class="form-group">
                    <input id="password" name="phone" type="tel" class="form-control" placeholder="secondary phone">
                    <label for="sphone">Secondary Phone <span class="glyphicon glyphicon-phone"></label>
                </div>
                <br><br>
                <div class="form-group">
                    <select class="form-control">
                        <option id="Male" Value="M" style="color:red" selected>Male</option>
                        <option id="FeMale" Value="FM"  style="color:green">Female</option>
                        <option id="NotInterested" Value="NI"  style="color:blue">Not interested</option>
                    </select>
                </div>

                <div class="form-group">
                    <input id="date" name="date" type="date" class="form-control">
                    <label for="date">DOB<span class="glyphicon glyphicon-calendar"></label>
                </div>
                <br><br>
                <div class="form-group">
                    <textarea id="message" name="phone" class="form-control" style="width:400px;height:100px" placeholder="Short Description" ></textarea>
                    <label for="message">Short Description <span class="glyphicon glyphicon-align-justify"></label>
                </div>
                <br><br>
                <div class="form-group">
                    <input id="Email1" name="phone" class="form-control" style="width:400px;" placeholder="Registered email" ></textarea>
                    <label for="Email1">Registered email <span class="glyphicon glyphicon-align-envelope"></label>
                </div>
                <br><br>
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
                <p1>Address</p1>
                <br>
                <div class="form-group">
                    <input id="Address" name="Address" type="tel" class="form-control"   required>
                    <label for="Address">Flat NO/House No</label>
                </div>
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

                <br><br>
                <button>
                    Save
                </button>
                <br>
                <br>
            </form>


        </div>
        <div  class="col-xs-1 col-md-1" id="Customer feed">
        </div>
    </div></div>

</div>


</div>


</body>
</html>


<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete"></script>
    <script src="../js/signup.js"></script>


<script type="text/javascript">
    var activeEl = 2;
    $(function() {
        var items = $('.btn-nav');
        $( items[activeEl] ).addClass('active');
        $( ".btn-nav" ).click(function() {
            $( items[activeEl] ).removeClass('active');
            $( this ).addClass('active');
            activeEl = $( ".btn-nav" ).index( this );
        });
    });
</script>