$(function()
{




    var bid = location.search.split('bid=')[1];

    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();

    var oneWeekAgo = new Date();
    oneWeekAgo.setDate(oneWeekAgo.getDate() -7);
    var sdate = oneWeekAgo.getMonth()+ 1 +'/' +oneWeekAgo.getDate()  +'/'+ oneWeekAgo.getFullYear();





    $('#startDate').datetimepicker({
        defaultDate: sdate,

        //disabledDates: [
        //moment("12/25/2013"),
        //new Date(2013, 11 - 1, 21),
        //"11/22/2013 00:53"
        minDate: new Date(currentYear - 1, currentMonth, currentDate)   ,
        maxDate: new Date(currentYear, currentMonth, currentDate)

        //]
    });

    var startTime = getstartTime($('#startDate').data("DateTimePicker").getDate().toString());


    function getstartTime(datefield){
        var startTime = datefield.substr(datefield.indexOf(' ')+1);
        var Smounth = startTime.substr(0,startTime.indexOf(' '));
        startTime = startTime.substr(startTime.indexOf(' ')+1);
        var Sday = startTime.substr(0,startTime.indexOf(' '));
        startTime = startTime.substr(startTime.indexOf(' ')+1);
        var Syear = startTime.substr(0,startTime.indexOf(' '));
        startTime = startTime.substr(startTime.indexOf(' ')+1);
        var Stime = startTime.substr(0,startTime.indexOf(' '));
        var Sgmt = startTime.substr(startTime.indexOf(' ')+4);
        startTime = Syear+'-'+Smounth+'-'+Sday+' '+Stime;
        return startTime;
    }

    setStatistics();

    function setStatistics(){
        $.get( "function/getStatisticsBusinesses.php?bid="+bid+"&startTime="+startTime, function( item )
        {
            item = JSON.parse(item);
            var grpLi='<div class="Groupmembers">';

            if(item.length == 0){
                grpLi = grpLi + '<h1> No Statistics </h1>';
            }

            var color = '';




            for(var i = 0 ; i < (item.length) ; i++){

                var value =item[i]['average']*20 ;

                switch (true) {
                    case (value < 34):
                        color = 'red';
                        break;
                    case (value <= 66):
                        color = 'orange'
                        break;
                    case (value <= 101):
                        color = 'green'
                        break;
                }

                var name = item[i]['displayName'] != '' ? item[i]['displayName'] : item[i]['feedName'];
                grpLi = grpLi +
                '<div class="col-xs-4 col-md-4">'+
                '<div class="c100 p'+value+' big '+color+'">'+
                '<span>'+parseFloat(value).toFixed(2)+'%</span>'+
                '<div class="slice">'+
                '<div class="bar"></div>'+
                '<div class="fill"></div>'+
                '</div>'+
                '</div>'+
                '<div style="text-align: center"><h3>'+name+'</h3></div>'+
                '</div>';

            }

            grpLi=grpLi+'</div>';
            $('#leftFeed').empty().append(grpLi);

        });


        $.get( "function/getStatisticsBusinessesMessages.php?bid="+bid+"&startTime="+startTime, function( item )
        {
            item = JSON.parse(item);
            var grpLi='<div class="Groupmembers">';
            if(item.length == 0){
                grpLi = grpLi + '<h1> No Comments </h1>';
            } else{
                grpLi = grpLi + '<h1> Comments </h1>';

            }


            for(var i = 0 ; i < (item.length) ; i++){



                grpLi = grpLi +
                '<div class="panel panel-default">'+
                '<div class="panel-heading">'+
                '<h3 class="panel-title">'+item[i]['userName']+' - '+item[i]['timeCre']+' </h3>'+
                '</div>'+
                '<div class="panel-body">'+
                ''+item[i]['message']+''+
                '</div>'+
                '</div>';

            }

            grpLi=grpLi+'</div>';
            $('#rightFeed').empty().append(grpLi);

        });
    }





    $( "#Changetime" ).click(function() {
        startTime = getstartTime($('#startDate').data("DateTimePicker").getDate().toString());
        setStatistics();
    });



 //   $('#startDate').datetimepicker();

/*
    $('#datetimepicker1').datetimepicker({
        language: 'pt-BR'
    });

*/

});








