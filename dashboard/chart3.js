document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('lineChart1');
  
    // Fetch data from the PHP script
      fetch('/mis/dashboard/fetch_civil_status_data.php')
      .then(response => response.json())
      .then(data => {
        new Chart(ctx, {
          type: 'bar',  // Corrected chart type
          data: {
            labels: data.labels,
            datasets: [
              {
                label: 'Civil Status as of 2020',
                data: data.values,
                backgroundColor: 'rgba(41, 155, 191)',  // Corrected color format
                borderColor: 'rgba(41, 155, 191)',      // Corrected color format
                borderWidth: 1
              },
              {
                label: 'Civil Status as of 2015', // New dataset label
                data: [34, 23, 43, 34], // New dataset values
                backgroundColor: 'rgba(255, 0, 0)', // Red color
                borderColor: 'rgba(255, 0, 0)',     // Red color
                borderWidth: 1
              }
            ]
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
  