
let data = $.ajax({
    type: 'POST',
    url: './control/charts/active/subscription',
    dataType: 'json'
});

data.done(function(e){
    flotChart1Data = [];
    e.forEach($item => {
        flotChart1Data.push($item);
    })
    console.log(flotChart1Data)
    if($('#monthly-sales-chart').length) {
        var monthlySalesChart = document.getElementById('monthly-sales-chart').getContext('2d');
        new Chart(monthlySalesChart, {
            type: 'bar',
            data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Active Users',
                data: flotChart1Data,
                backgroundColor: colors.primary
            }]
            },
            options: {
            maintainAspectRatio: false,
            legend: {
                display: false,
                labels: {
                    display: false
                }
            },
            scales: {
                xAxes: [{
                display: true,
                barPercentage: .3,
                categoryPercentage: .6,
                gridLines: {
                    display: false
                },
                ticks: {
                    fontColor: '#8392a5',
                    fontSize: 10
                }
                }],
                yAxes: [{
                gridLines: {
                    color: gridLineColor
                },
                ticks: {
                    fontColor: '#8392a5',
                    fontSize: 10
                }
                }]
            }
            }
        }
        );
    }
})
