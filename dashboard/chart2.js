document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('doughnut'); // Change 'lineChart' to 'barChart'
  
    // Fetch data from the PHP script
    fetch('/mis/dashboard/fetch_household.php') // Correct the path to the PHP script
      .then(response => response.json())
      .then(data => {
        new Chart(ctx, {
          type: 'bar', // Bar chart type
          data: {
            labels: ['Total Population'],
            datasets: [
              {
                label: 'Population as of 2023',
                data: [data.totalPopulation], // Use the total population value
                backgroundColor: 'rgba(41, 155, 191)',
                borderColor: 'rgba(41, 155, 191)',
                borderWidth: 1
              },
              {
                label: 'Population as of 2015',
                data: [320], // Use the total population value
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
                  return dataset.label + ': ' + dataset.data[0]; // Display the total population value in the tooltip
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
  