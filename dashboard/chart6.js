document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('barchart');
  
    // Fetch data from the PHP script (replace with your server-side code)
    fetch('/mis/dashboard/fetch_employment_data.php') // Change the URL to your PHP script
      .then(response => response.json())
      .then(data => {
        // Assuming data is an object with 'unemployed' and 'employed' properties
        const unemployedData = data.unemployed; // Replace with your actual data retrieval
        const employedData = data.employed;     // Replace with your actual data retrieval

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Unemployed', 'Employed'],
            datasets: [
              {
                label: 'Employment Ratio',
                data: [unemployedData, employedData],
                backgroundColor: ['rgba(255, 0, 0)', 'rgba(41, 155, 191)'],
                borderColor: ['rgba(255, 0, 0)', 'rgba(41, 155, 191)'],
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
                  var currentValue = dataset.data[tooltipItem.index];
                  var total = dataset.data.reduce((previousValue, currentValue) => previousValue + currentValue, 0);
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
