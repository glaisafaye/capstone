document.addEventListener('DOMContentLoaded', function() {
  const ctx = document.getElementById('lineChart'); // Change 'lineChart' to 'barChart'

  // Fetch data from the PHP script
  fetch('/mis/dashboard/fetch_population.php') // Correct the path to the PHP script
    .then(response => response.json())
    .then(data => {
      const population2020 = data.totalPopulation;
      const population2015 = 1486; // Use the total population value for 2015

      const percentageDifference = ((population2020 - population2015) / population2015) * 100;
      let changeDescription = '';

      if (percentageDifference > 0) {
        changeDescription = 'increase';
      } else if (percentageDifference < 0) {
        changeDescription = 'decrease';
      } else {
        changeDescription = 'stay the same';
      }

      new Chart(ctx, {
        type: 'bar', // Bar chart type
        data: {
          labels: ['Total Population'],
          datasets: [
            {
              label: 'Population as of 2023',
              data: [population2020],
              backgroundColor: 'rgba(41, 155, 191)',
              borderColor: 'rgba(41, 155, 191)',
              borderWidth: 1
            },
            {
              label: 'Population as of 2015',
              data: [population2015],
              backgroundColor: 'rgba(255, 0, 0)', // Red color
              borderColor: 'rgba(255, 0, 0)',     // Red color
              borderWidth: 1
            }
          ]
        },
        options: {
          responsive: true,
          plugins: {
            annotation: {
              annotations: [
                {
                  type: 'text',
                  position: 'center',
                  x: '50%',
                  y: '95%', // Adjust the y-position as needed
                  content: 'Population ' + changeDescription + ' compared to 2015'
                }
              ]
            }
          }
        }
      });
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
});
