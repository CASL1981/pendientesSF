<template>
    <div>
      <apexchart type="area" height="245" :options="chartOptions" :series="series"></apexchart>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      categorias: { type: Array, required: true },
      series: { type: Array, required: true }
    },
    computed: {
      chartOptions() {
        return {
          chart: {
            fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
            toolbar: { show: false },
            sparkline: { enabled: false }
          },
          colors: ["#3a57e8", "#4bc7d2"],
          dataLabels: { enabled: false },
          stroke: { curve: 'smooth', width: 3 },
          yaxis: {
            labels: {
              style: { colors: "#8A92A6" },
              offsetX: -5,
            }
          },
          legend: { show: false },
          xaxis: {
            categories: this.categorias,
            labels: { style: { colors: "#8A92A6" } },
            lines: { show: false }
          },
          grid: { show: false },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'dark',
              type: "vertical",
              shadeIntensity: 0,
              inverseColors: true,
              opacityFrom: .4,
              opacityTo: .1,
              stops: [0, 50, 80],
              colors: ["#3a57e8", "#4bc7d2"]
            }
          },
          tooltip: { enabled: true }
        }
      }
    }
  }
  </script>