<template>
    <div>
      <apexchart type="radialBar" height="230" :options="chartOptions" :series="series"></apexchart>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      series: { type: Array, required: true },
      labels: { type: Array, required: true }
    },
    computed: {
      chartOptions() {
        return {
          colors: ["#4bc7d2", "#3a57e8"],
          plotOptions: {
            radialBar: {
              hollow: { margin: 10, size: "50%" },
              track: { margin: 10, strokeWidth: '50%' },
              dataLabels: { show: false }
            }
          },
          labels: this.labels,
        }
      }
    }
  }
  </script>
  