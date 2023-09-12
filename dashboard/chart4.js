document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('doughnut1');
  
    // Fetch data from the PHP script
    fetch('/mis/dashboard/fetch_zone.php')
        .then(response => response.json())
        .then(data => {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'By Zone',
                        data: data.values,
                        backgroundColor: [
                            'rgba(41,155,991)',
                            'rgba(400,162,235,1)',
                            'rgba(255,206,86,1)',
                            'rgba(120,46,139,1)',
                            'rgba(300,100,800)'
                        ],
                        borderColor: [
                            'rgba(41,155,991)',
                            'rgba(400,162,235,1)',
                            'rgba(255,206,86,1)',
                            'rgba(120,46,139,1)',
                            'rgba(300,100,800)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = ((currentValue / total) * 100).toFixed(2) + '%';
                                return data.labels[tooltipItem.index] + ': ' + percentage;
                            }
                        }
                    }                    
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
  });