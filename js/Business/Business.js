/**
 * Created by NOAM on 07/02/16.
 */
$(function()
{

    // old page
    $( "#addBusiness" ).click(function() {




        var namea = $('#name').val();
        var city  = $('#city').val();
        var country = $('#country').val();
        var street = $('#street').val()  ;
        var houseNum = $('#house').val();
        var phone = $('#phone').val();
        var mail = $('#mail').val();
        var description = $('#description').val();
        var lat = $('#lat').val();
        var lon = $('#long').val();
        var BusinessType = $('#BusinessType').val();
        var file_data = $('#image').prop('files')[0];
        var form_data = new FormData();
        form_data.append('image', file_data);
        form_data.append('name', namea);
        form_data.append('city', city);
        form_data.append('country', country);
        form_data.append('street', street);
        form_data.append('house', houseNum);
        form_data.append('phone', phone);
        form_data.append('mail', mail);
        form_data.append('description', description);
        form_data.append('lat', lat);
        form_data.append('long', lon);
        form_data.append('BusinessType', BusinessType);
        


        $.ajax({
            url: 'createBusiness.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response){
                //alert(php_script_response); // display response from the PHP script, if any
                bootbox.alert(php_script_response);
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


});