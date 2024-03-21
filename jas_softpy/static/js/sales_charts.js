
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById('salesChart').getContext('2d');
    
    var data = {
        labels: salesChartLabels,
        datasets: [{
            label: 'Ventas por fecha',
            data: salesChartData,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };
    
    var options = {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day'
                },
                title: {
                    display: true,
                    text: 'Fecha'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Ventas'
                }
            }
        }
    };

    var salesChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
});
