$(function()
{


    var regex = /[?&]([^=#]+)=([^&#]*)/g,
        url =  location.search,
        params = {},
        match;
    while(match = regex.exec(url)) {
        params[match[1]] = match[2];
    }



        var bid = params['bid'];
        var btype = params['btype'];




    $.get( "function/getBusinessDetails.php?bid="+bid, function( item )
    {
        item = JSON.parse(item);

        for(var i = 0 ; i < (item.length) ; i++){

            var PhotoURL= 'image/businessProfile/' + item[i]['PhotoURL'];
            $('#backgroundDiv').css("background-image", "url("+PhotoURL+")");
            $('#nameb').text(item[i]['Name']);
            $('#descriptionb').text(item[i]['Description']);
            $('#countryb').text(item[i]['Country']);
            $('#cityb').text(item[i]['City']);
            $('#streetb').text(item[i]['Street'] + ' ' + item[i]['HouseNumber']);
            //$('#houseb').text(item[i]['HouseNumber']);
            $('#phoneb').text(item[i]['Phone']);
            $('#mailb').text(item[i]['Mail']);

            var grpLi = '';
            if(btype == 'Restaurant')
            {
                if(item[i]['TypeName'] != null){
                    grpLi=grpLi+
                        '<h3 class="post-subtitle">'+
                        'סוג:' + ' ' + item[i]['TypeName']+
                        '</h3>';
                }

                if(item[i]['TypeName'] != null){
                    grpLi=grpLi+
                        '<h3 class="post-subtitle">'+
                        'תפריט:' + ' ' + item[i]['MenuName']+
                        '</h3>';
                }


                if(item[i]['KosherName'] != null){
                    grpLi=grpLi+
                        '<h3 class="post-subtitle">'+
                        'כשרות:' + ' ' +item[i]['KosherName']+
                        '</h3>';
                }



            }
            else if(btype == 'Fashion')
            {
                grpLi=grpLi+
                    '<h3 class="post-subtitle">'+
                    'סוג:' + ' ' + item[i]['CategoryName']+
                    '</h3>';


                grpLi=grpLi+
                    '<h3 class="post-subtitle">'+
                    'מתאים ל:' + ' ' + item[i]['GenderName']+
                    '</h3>';

                grpLi=grpLi+
                    '<h3 class="post-subtitle">'+
                    'גילאים:' + ' ' + item[i]['AgesName']+
                    '</h3>';


            }
            $('#description').empty().append(grpLi);
        }
    }); 
});