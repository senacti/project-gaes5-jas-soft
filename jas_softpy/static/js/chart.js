
document.addEventListener('DOMContentLoaded', function () {

    var dailyCtx = document.getElementById("dailyChart").getContext("2d");
    var dailyChartData = new Chart(dailyCtx, {
        type: "line",
        data: {
            labels: dailyChartLabels,
            datasets: [{
                label: 'Nivel de producción diario',
                data: dailyChartData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var monthlyCtx = document.getElementById("monthlyChart").getContext("2d");
    var monthlyChart = new Chart(monthlyCtx, {
        type: "pie",
        data: {
            labels: monthlyChartLabels,
            datasets: [{
                label: 'Nivel de producción mensual',
                data: monthlyChartData,
                backgroundColor: 'rgba(255, 99, 132,)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
