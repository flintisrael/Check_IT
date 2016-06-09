$(function()
{

    var map;
    var marker;
    var item;
    var markers = [];

    /**
     * The function initialize the map of business User
     * add marks with details of each business on map
     * Locate the map by the user location.
     */
    function initialize()
    {
        $.get( "getbusinesses.php", function( item )
        {
            item = JSON.parse(item);

            for(var i = 0 ; i < (item.length) ; i++){

                addMarker(item[i]);

            }

        });

        var myLatlng =  {lat : 31.8,lng: 35.17};


        var mapProp = {
            //center:new google.maps.LatLng(32.0878802,34.7955294),
            center: myLatlng,
            zoom:10,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };


        map = new google.maps.Map(document.getElementById("businessmap"),mapProp);


        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                // debugger;
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };


                infoWindow.setPosition(pos);
                infoWindow.setContent('.המיקום שלי');
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            //alert('Browser doesnt support Geolocation');
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    /**
     * put default location
     * @browserHasGeolocation boolean
     * @infoWindow put window on location
     * @pos default location
     */
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'שנה הגדרות אפשר מיקום במכשיר' :
            'Error: Your browser doesn\'t support geolocation.');

    }
    google.maps.event.addDomListener(window, 'load', initialize);

    /**
     * the function get details about business and put marker on map
     * @item {business} all the details of database
     */
    function addMarker(item){

        var lat = item['Lat'];
        var lng = item['Lon'];

        if(lat == null || lng == null || lat == 0 || lng == 0) return;
        var myLatlng = new google.maps.LatLng(lat,lng);

        var bId = item['Id'];

        var description = 'תיאור';
        var participantsSring = '';
        var name = item['Name'];
        var PhotoURL = item['PhotoURL'];
        PhotoURL = '../image/businessProfile/'+PhotoURL;


        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h4 id="firstHeading" class="firstHeading" style="color:#DF7401"><a href="businessPage.php?bid='+bId+' " target="_blank">'+name.toString()+'</a></h4>'+
            '<div id="bodyContent">'+
            '</br>' +

            '<img src="'+PhotoURL+'"style="width: 150px;height:100px">'+
            '<div><a href="businessStaticsPage.php?bid='+bId+' " target="_blank" >Feedbacks Stats</a> </div>' +


            '</div>'+
            participantsSring
        '</div>'+
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,maxWidth: 350
        });

        var  marker =  new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: name
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        markers.push(marker);
        marker.setMap(map);

    }

});

