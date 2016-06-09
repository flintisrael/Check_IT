$(function()
{
    var bid = location.search.split('bid=')[1];


    /**
     * the function get event if BusinessType field change
     * the function hide the all of not relevant fields and show the relevant Fields
     * @BusinessType change event
     */
    $( "#BusinessType" ).change(function() {
        var BusinessType = $('#BusinessType').find(":selected").text();
        $( ".inputfield" ).each(function( index ) {
            var className = $(this).attr('typeb');

            if(className != 'General' && BusinessType != className){
                $(this).hide();
            }
            else{
                $(this).show();
            }
        });

    });
    /**
     * The function get event if address fields focus out (change address).
     * The function get from google API location of address and change location of map
     * @.address class of all address fields
     * @return new location on map
     */
    $( ".address" ).focusout(function() {

        var city  = $('#city').val();
        var country = $('#country').val();
        var street = $('#street').val()  ;
        var houseNum = $('#house').val();
        var address =  city + " " + country + " " + street + " " + houseNum;

        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({address: address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {


                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
                $('#lat').val(lat);
                $('#long').val(lng);
                document.getElementById("mapBusinessLocation").src="http://maps.googleapis.com/maps/api/staticmap?center="+lat+","+lng+"&zoom=16&maptype=roadmap&markers=color:blue%7Clabel:S%7C"+lat+","+lng+"&size=200x200&sensor=false&language=iw";
                document.getElementById('mapBusinessLocation').style.visibility='visible';

            }
        })

    });

    /**
     * If business id different of zero this is existing business.
     * get from the database all the data about specific business and fill all the fields
     */
    if(bid != 0){
        $.get( "../function/getBusinessById.php?bid="+bid, function( item )
        {
            item = JSON.parse(item);

            for(var i = 0 ; i < (item.length) ; i++){

                $.each(item[i], function(obj, values) {

                    console.log(obj, values);

                    $( "[name="+obj+"]").val(""+values+"");

                });

            }

            $( "#BusinessType" ).change();

        });
    }

    //action to show relevant fields by type call $( "#BusinessType" ).change() function
    $( "#BusinessType" ).change();
});


