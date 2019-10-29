var chartColours = ['#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'];
var d1 = [[1, 3 ], [2, 6 ], [3, 9 ], [4, 12 ], [5, 15 ], [6, 18 ], [7, 21 ], [8, 15 ], [9, 18 ], [10, 21 ], [11, 24 ], [12, 27 ], [13, 30 ], [14, 33 ], [15, 24 ], [16, 27 ], [17, 30 ], [18, 33 ], [19, 36 ], [20, 39 ], [21, 42 ], [22, 45 ], [23, 36 ], [24, 39 ], [25, 42 ], [26, 45 ], [27, 38 ], [28, 51 ], [29, 55 ], [30, 60 ]];
/**
 * Megjeleníti a Jelentkezők grafikont
 * 
 * @param {json} chartData A grafikonok adatai
 */
function initQuizChart(chartData) {
    divElement = $('#quiz_chart');
    $(function() {
        //some data
        var d1 = [[1, 3 ], [2, 6 ], [3, 9 ], [4, 12 ], [5, 15 ], [6, 18 ], [7, 21 ], [8, 15 ], [9, 18 ], [10, 21 ], [11, 24 ], [12, 27 ], [13, 30 ], [14, 33 ], [15, 24 ], [16, 27 ], [17, 30 ], [18, 33 ], [19, 36 ], [20, 39 ], [21, 42 ], [22, 45 ], [23, 36 ], [24, 39 ], [25, 42 ], [26, 45 ], [27, 38 ], [28, 51 ], [29, 55 ], [30, 60 ]];
        var d2 = [[1, 5], [2,  4], [3, 4], [4, 5], [5, 4 ], [6, 4 ], [7, 5 ], [8, 5 ], [9, 6 ], [10, 6 ], [11, 6 ], [12, 2 ], [13, 3 ], [14, 4 ], [15, 4 ], [16, 4 ], [17, 5 ], [18, 5 ], [19, 2 ], [20, 2 ], [21, 3 ], [22, 3 ], [23, 3 ], [24, 2 ], [25, 4 ], [26, 4 ], [27, 5 ], [28, 2 ], [29, 2 ], [30, 3 ]];
        //define placeholder class
        var placeholder = $("#quiz_chart");
        //graph options
        var options = {
            grid: {
                show: true,
                aboveData: true,
                color: "#3f3f3f",
                labelMargin: 5,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: true,
                hoverable: true,
                autoHighlight: true,
                mouseActiveRadius: 20
            },
            series: {
                grow: {
                    active: false,
                    stepMode: "linear",
                    steps: 50,
                    stepDelay: true
                },
                lines: {
                    show: true,
                    fill: true,
                    lineWidth: 4,
                    steps: false
                },
                points: {
                    show: true,
                    radius: 5,
                    symbol: "circle",
                    fill: true,
                    borderColor: "#fff"
                }
            },
            legend: {
                position: "ne",
                margin: [0, -25],
                noColumns: 0,
                labelBoxBorderColor: null,
                labelFormatter: function(label, series) {
                    // just add some space to labes
                    return label + '&nbsp;&nbsp;';
                }
            },
            yaxis: {min: 0},
            xaxis: {ticks: 11, tickDecimals: 0},
            colors: chartColours,
            shadowSize: 1,
            tooltip: true, //activate tooltip
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: -30,
                    y: -50
                }
            }
        };
        $.plot(placeholder, chartData, options);
        /*
        $.plot(placeholder, [
            {
                label: "Visits",
                data: d1,
                lines: {fillColor: "#f2f7f9"},
                points: {fillColor: "#88bbc8"}
            },
            {
                label: "Unique Visits",
                data: d2,
                lines: {fillColor: "#fff8f2"},
                points: {fillColor: "#ed7a53"}
            }

        ], options);
        */

    });
}

initQuizChart(chartData);123
