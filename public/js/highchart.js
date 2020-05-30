function initializeHighChart(graphData) {


    chart = Highcharts.chart('highchartDiv', {

        title: {
            text: "Stock History Chart for "+ graphData.data.name
        },

        yAxis: {
            title: {
                text: 'Stock Price'
            }
        },

        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%e / %b'
            },
            title: {
                text: 'Date'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    rotation: 0
                },
                pointStart: Date.UTC(graphData.startdate.year, graphData.startdate.month, graphData.startdate.day),
                pointInterval: 24 * 3600 * 1000, // one day
                type: 'datetime',
            }
        },

        series: graphData.data,

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
}
