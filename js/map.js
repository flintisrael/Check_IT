


$(function()
{
    var map;
    var marker;
    var item;
    var markers = [];
    var pos;
    var center;
    var loc;
    var circle;
    var infoWindow;
    var mylocfulladd;
    var IconURLloca = 'image/icon/home.png';
    var iconloc = {
        url: IconURLloca,
        // This marker is 20 pixels wide by 32 pixels high.
        size: new google.maps.Size(24, 29),
        // The origin for this image is (0, 0).
        origin: new google.maps.Point(0, 0),
        // The anchor for this image is the base of the flagpole at (0, 32).
        anchor: new google.maps.Point(10, 29)
    };

    $( "#changeLoc" ).click(function() {
        var locationName = $('#locationName').val();
        if(locationName != ''){
            var newGeocoder = new google.maps.Geocoder();

            newGeocoder.geocode({address: locationName}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    var newlat = results[0].geometry.location.lat();
                    var newlng = results[0].geometry.location.lng();


                    pos = {
                        lat: newlat,
                        lng: newlng
                    };

                    var geocoder  = new google.maps.Geocoder();             // create a geocoder object
                    var loc2  = new google.maps.LatLng(newlat, newlng);    // turn coordinates into an object
                    geocoder.geocode({'latLng': loc2}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            mylocfulladd =  results[0]['formatted_address'];
                            $('#MyLocation').text(mylocfulladd);
                        }
                    });


                    infoWindow.setPosition(pos);
                    infoWindow.setContent('.המיקום שלי');
                    map.setCenter(pos);
                    circle.setRadius(null);
                    circle = new google.maps.Circle({
                        center:  map.getCenter(),
                        map: map,
                        radius: 10000,          // IN METERS.
                        fillColor: '#FF6600',
                        fillOpacity: 0.3,
                        strokeColor: "#FFF",
                        strokeWeight: 1         // DON'T SHOW CIRCLE BORDER.
                    });

                    var latlng = new google.maps.LatLng(pos);
                    center.setPosition(latlng);

                    google.maps.event.trigger(map, 'resize');

                }
            })


        }
    });

    $( "#filterSearch" ).click(function() {

        var categoryid = $('#BusinessType').val();
        var r = $('#range').val();
        var radser = r*1000;
        var namefilter = $('#namefilter').val();
        var cityfilter = $('#cityfilter').val();
        var streetfilter = $('#streetfilter').val();
        var rangeCheckbox = $('#rangeCheckbox').is(":checked");

        if(rangeCheckbox == true){
            circle.setRadius(radser);
        }
        else{
            circle.setRadius(null);
        }




        for (i = 0; i < markers.length; i++) {
            marker = markers[i];


            var d = google.maps.geometry.spherical.computeDistanceBetween (center['position'], marker['position']) / 1000;
            // If is same category or category not picked
            if (
                    (marker.categoryid == categoryid || categoryid == -1)
                    &&
                    (rangeCheckbox == false || r > d)
                    &&
                    (namefilter == '' || marker.name.indexOf(namefilter) > -1)
                    &&
                    (cityfilter == '' || marker.city.indexOf(cityfilter) > -1)
                    &&
                    (streetfilter == '' || marker.street.indexOf(streetfilter) > -1)
                ) {
                marker.setVisible(true);
            }
            // Categories don't match
            else {
                marker.setVisible(false);
            }
        }


    });
    $('#rangeCheckbox').change(function() {
        if($('#rangeCheckbox').is(":checked") == true) {
            $("#rangefilter").attr("disabled", false);
            $("#rangefilterpar" ).addClass( 'range-primary' );



        }
        else{
            $( "#rangefilterpar" ).removeClass( 'range-primary' );
            $("#rangefilter").attr("disabled", true);
        }
    });

    $('input[type=range]').on('input', function () {
        range.value = $(this).val();

    });



    function initialize()
    {

            var myLatlng =  {lat : 31.8,lng: 35.17};
            loc = new google.maps.LatLng(myLatlng);

            var mapProp = {
                //center:new google.maps.LatLng(32.0878802,34.7955294),
                center: myLatlng,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };


            map = new google.maps.Map(document.getElementById("maptest"),mapProp);


            infoWindow = new google.maps.InfoWindow({map: map});


        function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            alert("Latitude : " + latitude + " Longitude: " + longitude);
        }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    loc = new google.maps.LatLng(position.coords.latitude ,  position.coords.longitude);
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var geocoder2  = new google.maps.Geocoder();             // create a geocoder object
                   // var loc  = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);    // turn coordinates into an object
                    geocoder2.geocode({'latLng': loc}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            mylocfulladd =  results[0]['formatted_address'];
                            $('#MyLocation').text(mylocfulladd);
                        }
                    });
                    infoWindow.setPosition(pos);
                    infoWindow.setContent('.המיקום שלי');
                    map.setCenter(pos);

                    circle = new google.maps.Circle({
                        center:  map.getCenter(),
                        map: map,
                        radius: 10000,          // IN METERS.
                        fillColor: '#FF6600',
                        fillOpacity: 0.3,
                        strokeColor: "#FFF",
                        strokeWeight: 1         // DON'T SHOW CIRCLE BORDER.
                    });




                    center =  new google.maps.Marker({
                        position: map.getCenter(),
                        map: map,
                        title: 'My Location',
                        icon: iconloc
                    });

                    center.addListener('click', function() {
                        infowindow.open(map, center);
                    });

                    center.setMap(map);

                }, function() {

                    handleLocationError(true, infoWindow, map.getCenter());
                }, {maximumAge:0, timeout:10000});
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow,map.getCenter() );
            }


            $.get( "function/getallbusinesses.php", function( item )
            {
                item = JSON.parse(item);

                for(var i = 0 ; i < (item.length) ; i++){

                    addMarker(item[i]);
                }
            });
            /*
            center =  new google.maps.Marker({
                position: map.getCenter(),
                map: map,
                icon: icon

            });

            center.setMap(map);
            */
        }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'אשנה הגדרות אפשר מיקום במכשיר' :
            'Error: Your browser doesn\'t support geolocation.');

    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function addMarker(mark){
        var lat = mark['Lat'];
        var lng = mark['Lon'];
        if(lat == null || lng == null || lat == 0 || lng == 0) return;
        var p = new google.maps.LatLng(lat,lng);
        var idbusiness = mark['bid'];
        var PhotoURL = mark['PhotoURL'];
        PhotoURL = 'image/businessProfile/'+PhotoURL;
        var description = mark['Description'];
        var participantsSring = '';

        var City = mark['City'];
        var Country = mark['Country'];
        var HouseNumber = mark['HouseNumber'];
        var Mail= mark['Mail'];
        var Name= mark['Name'];
        var Phone = mark['Phone'];
        var Street = mark['Street'];
        var category  = mark['TypeName'];
        var categoryid = mark['refType'];
        var IconURL = mark['IconURL'];
        IconURL = 'image/icon/'+IconURL;

        var contentString =
            '<div id="content" style="width: 150px;background-color: rgba(53, 126, 189, 0.07);">'+
                '<div class="row">'+
                    '<div class="col-lg-12 text-center">'+

            '<h3 style="color:#DF7401;margin-top: 1px;"><a href="businessDetails.php?bid='+idbusiness+'&btype='+category+'" >'+Name.toString()+'</a></h3>'+

                                '<img src="'+PhotoURL+'"style="width: 150px;height:100px">'+


                    '</div>'+

                '</div>'+
                '<div class="row">'+
                    '<div class="col-lg-12 text-center">'+

                            '<div class="panel-body">'+
                                '<b style="color:#0404B4">' +
                                'description  :  '+
                                '</b>' +
                                description+
                            '</div>'+

                    '</div>'+
                '</div>'+

            '<div class="col-lg-12 text-center">'+

            '<b style="color:#0404B4">' +
            'City  :  '+
            '</b>' +
            City+
            '</div>'+


            '<div class="col-lg-12 text-center">'+

            '<b style="color:#0404B4">' +
            'Street  :  '+
            '</b>' +
            Street+
            '</div>'+


            '<div class="col-lg-12 text-center">'+

            '<b style="color:#0404B4">' +
            'House Number  :  '+
            '</b>' +
            HouseNumber+
            '</div>'+


            '<div class="col-lg-12 text-center">'+

            '<b style="color:#0404B4">' +
            'Phone  :  '+
            '</b>' +
            Phone+
            '</div>'+


            '<div class="col-lg-12 text-center">'+

            '<b style="color:#0404B4">' +
            'Mail  :  '+
            '</b>' +
            Mail+
            '</div>'+
            '<div><a href="feeds.php?bid='+idbusiness+'&btype='+category+'" >Add Feedback</a> </div>' +
            '<div><a href="BusinessRealtimeDetails.php?bid='+idbusiness+'&btype='+category+'" >Feedbacks Stats</a> </div>' +
            '</br>' +
            participantsSring+
        '</div>'+
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,maxWidth: 350
        });

        var icon = {
            url: IconURL,
            // This marker is 20 pixels wide by 32 pixels high.
            size: new google.maps.Size(32, 32),
            // The origin for this image is (0, 0).
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(0, 32)
        };



        var  marker =  new google.maps.Marker({
            position: p,
            map: map,
            title: Name,
            icon: icon,
            category: category,
            categoryid : categoryid,
            name : Name,
            city : City,
            street : Street

        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        markers.push(marker);
        marker.setMap(map);


    }

});
