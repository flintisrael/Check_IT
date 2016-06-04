$(function()
{
    var bid = location.search.split('bid=')[1];

    $( "#BusinessType" ).change(function() {
        var BusinessType = $('#BusinessType').find(":selected").text();
        $( ".inputfield" ).each(function( index ) {
            var className = $(this).attr('typeb');
            // alert(className);
            if(className != 'General' && BusinessType != className){
                $(this).hide();
            }
            else{
                $(this).show();
            }
        });

    });

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

    if(bid != 0){
        $.get( "../function/getBusinessById.php?bid="+bid, function( item )
        {
            item = JSON.parse(item);

            for(var i = 0 ; i < (item.length) ; i++){

                $.each(item[i], function(obj, values) {

                    console.log(obj, values);

                    $( "[name="+obj+"]").val(""+values+"");

                });

                //$( "input[name*='name']").val();

            }

            $( "#BusinessType" ).change();

        });
    }


    $( "#BusinessType" ).change();
});


