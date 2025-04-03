<template>
    <div>
      <apexchart type="bar" height="230" :options="chartOptions" :series="series"></apexchart>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      categories: { type: Array, required: true },
      series: { type: Array, required: true }
    },
    computed: {
      chartOptions() {
        return {
          chart: { stacked: true, toolbar: { show: false } },
          colors: ["#3a57e8", "#4bc7d2"],
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '28%',
              endingShape: 'rounded',
              borderRadius: 5,
            }
          },
          legend: { show: false },
          dataLabels: { enabled: false },
          stroke: { show: true, width: 2, colors: ['transparent'] },
          xaxis: {
            categories: this.categories,
            labels: { style: { colors: "#8A92A6" } }
          },
          yaxis: {
            labels: { style: { colors: "#8A92A6" } },
            title: { text: '' }
          },
          fill: { opacity: 1 },
          tooltip: {
            y: {
              formatter: val => "$ " + val + " thousands"
            }
          }
        }
      }
    }
  }
  </script>
  