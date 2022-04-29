const ctx1 = document.getElementById('chart1').getContext('2d');
const myChart1 = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: xCData,
    datasets: [{
      label: 'Graph of number of created users in last 7 days',
      data: yCData,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(32, 205, 54, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 155, 0.2)',
        'rgba(85, 283, 86, 0.2)',
        'rgba(13, 145, 153, 0.2)'

      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(32, 205, 54, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 155, 1)',
        'rgba(85, 283, 86, 1)',
        'rgba(13, 145, 153, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {

  }
});
const ctx2 = document.getElementById('chart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
  type: 'pie',
  data: {
    labels: xDData,
    datasets: [{
      data: yDData,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(32, 205, 54, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 155, 0.2)',
        'rgba(85, 283, 86, 0.2)',
        'rgba(13, 145, 153, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(32, 205, 54, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 155, 1)',
        'rgba(85, 283, 86, 1)',
        'rgba(13, 145, 153, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    plugins: {
      title: {
        display: true,
        text: 'Graph of number of deleted users in last 7 days'
      }
    }
  }
});

