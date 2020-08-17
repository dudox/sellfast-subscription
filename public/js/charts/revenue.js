

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
data = $.ajax({
    type: 'POST',
    url: './control/charts/revenue',
    data: {
        'date':'month'
    },
    dataType: 'json'
})
var flotChart1Data = [];
$("#revenue > button").on('click', function(e){
    $("#revenue  button").removeClass('btn-primary').addClass('btn-outline-primary');
    $(this).addClass('btn-primary text-white');

    let flotChart1Data = [];
    let numBer = 0;



    let data = $.ajax({
        type: 'POST',
        url: './control/charts/revenue',
        data: {
            'date':e.currentTarget.dataset.when
        },
        dataType: 'json'
    })
    data.done(function(e){
        e.data.forEach(item => {
            flotChart1Data.push(xAxisLabel(e,numBer,item))
            numBer++;
        })

        revenue(flotChart1Data);
        // console.log(flotChart1Data)
    });





});
if(data){
    let flotChart1Data = [];
    let numBer = 0;
    data.done(function(e){
        e.data.forEach(item => {
            flotChart1Data.push(xAxisLabel(e,numBer,item))
            numBer++;
        })

        revenue(flotChart1Data);
        // console.log(flotChart1Data)
    });
}

function xAxisLabel(e,$i,$item){
    let arr = [];
    if(e.type == "week"){
        arr.push(getDays($i),$item);
    }
    if(e.type == "today"){
        arr.push(getHours($i),$item);
    }
    if(e.type == "month"){
        arr.push(getMonths($i),$item);
    }
    console.log(arr)
    return arr;

}

function getDays($i){
    return ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"][$i] || '';
}

function getHours($i){
    return [0,"1am","2am","3am","4am","5am","6am","7am","8am","9am","10am","11am","12:00","1pm","2pm","3pm","4pm","5pm","6pm","7pm","8pm","9pm","10pm","11pm"][$i] || '';
}

function getMonths($i){
    return ["","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"][$i] || '';
}

var gridLineColor = 'rgba(77, 138, 240, .1)';

  var colors = {
    primary:         "#727cf5",
    secondary:       "#7987a1",
    success:         "#42b72a",
    info:            "#68afff",
    warning:         "#fbbc06",
    danger:          "#ff3366",
    light:           "#ececec",
    dark:            "#282f3a",
    muted:           "#686868"
  }

function revenue(data){

    if ($('#flotChart1').length) {
        $.plot('#flotChart1', [{
            data:data,
            color: '#727cf5'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: 'transparent'
                },
            },
            grid: {
                borderColor: 'transparent',
                borderWidth: 1,
                labelMargin: 0,
                aboveData: false,
                hoverable: true
            },

            yaxis: {
                show: true,
                color: 'rgba(0,0,0,0.06)',
                tickFormatter: function(val, axis) {
                    return  "NGN "+val;
                },
                min:0,
                tickColor: gridLineColor,
                font: {
                    size: 11,
                    weight: '600',
                    color: colors.muted
                },

            },
            xaxis: {
                show: true,
                color: 'rgba(0,0,0,0.1)',
                mode: "categories",


                font: {
                    size: 11,
                    color: colors.muted
                },
                reserveSpace: false
            },
            tooltip: true,
            tooltipOpts: {
                content:  function(label, xval, yval, flotItem) {
                    return "Incoming Transactions"  + '<br/>x:' + xval +'<br/>'+ ' y: NGN ' + yval;
                 },
                defaultTheme: false
            },
        });


    }


}
