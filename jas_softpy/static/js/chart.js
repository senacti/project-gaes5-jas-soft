document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById("myChart").getContext("2d");

    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Nivel de producción diario',
                data: chartData,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});