

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let data = $.ajax({
    type: 'POST',
    url: './charts/compare/subscription',
    data: {
        'date':'month'
    },
    dataType: 'json'
})
// var flotChart1Data = [];
// $("#revenue > button").on('click', function(e){
//     $("#revenue  button").removeClass('btn-primary').addClass('btn-outline-primary');
//     $(this).addClass('btn-primary text-white');

//     let flotChart1Data = [];
//     let numBer = 0;



//     let data = $.ajax({
//         type: 'POST',
//         url: './charts/compare/subscription',
//         data: {
//             'date':e.currentTarget.dataset.when
//         },
//         dataType: 'json'
//     })
//     data.done(function(e){
//         e.data.forEach(item => {
//             flotChart1Data.push(xAxisLabel(e,numBer,item))
//             numBer++;
//         })

//         compare(flotChart1Data);
//         // console.log(flotChart1Data)
//     });





// });
if(data){
    let flotChart1Data = [], data1 = [];
    let numBer = 0;
    data.done(function(e){
        e.data1.forEach(item => {
            flotChart1Data.push(xAxisLabel(e,numBer,item))
            numBer++;
        })

        e.data2.forEach(item => {
            data1.push(xAxisLabel(e,numBer,item))
            numBer++;
        })


        compare(flotChart1Data,data1);
        // console.log(flotChart1Data)
    });
}

function xAxisLabel(e,$i,$item){
    arr = new Array;
    if(e.type == "week"){
        arr.push(getDays($i),$item);
    }
    if(e.type == "today"){
        arr.push(getHours($i),$item);
    }
    if(e.type == "month"){
        arr  = {'label':getMonths($i),'data':$item};
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


function compare(data1,data2){
    console.log(data1)
     // Apex Line chart start
  var options = {
    chart: {
      height: 350,
      type: "line",
      parentHeightOffset: 0
    },
    colors: ["#f77eb9", "#7ee5e5","#4d8af0"],
    grid: {
      borderColor: "rgba(77, 138, 240, .1)",
      padding: {
        bottom: -6
      }
    },
    series: [
      {
        name: "Active plan",
        data: data1.data,
        color: "#fff"
      },
      {
        name: "Expired plan",
        data: [12, 42, 68, 33]
      },
    ],
    xaxis: {
      type: "datetime",
      categories: ["2015", "2016", "2017", "2018"]
    },
    markers: {
      size: 0
    },
    stroke: {
      width: 3,
      curve: "smooth",
      lineCap: "round"
    },
    legend: {
      show: true,
      position: "top",
      horizontalAlign: 'left',
      containerMargin: {
        top: 30
      }
    },
    responsive: [
      {
        breakpoint: 500,
        options: {
          legend: {
            fontSize: "11px"
          }
        }
      }
    ]
  };
  var apexLineChart = new ApexCharts(document.querySelector("#apexLine"), options);
  apexLineChart.render();
  // Apex Line chart end
}
