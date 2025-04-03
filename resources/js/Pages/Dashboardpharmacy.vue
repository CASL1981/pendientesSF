<template>
    <div class="dashboard">
      <h1>Dashboard de Solicitudes</h1>
      
      <!-- Gráfica Mensual -->
      <div class="chart-container">
        <MonthlyChart :categorias="monthlyCategorias" :series="monthlySeries" />
      </div>
      
      <!-- Gráfica Semanal -->
      <div class="chart-container">
        <WeeklyChart :categories="weeklyCategories" :series="weeklySeries" />
      </div>
      
      <!-- Gráfica Anual Radial -->
      <div class="chart-container">
        <YearlyChart :series="yearlySeries" :labels="yearlyLabels" />
      </div>
    </div>
  </template>
  
  <script>
  import MonthlyChart from '@/Components/Pharmacy/MonthlyChart.vue'
  import WeeklyChart from '@/Components/Pharmacy/WeeklyChart.vue'
  import YearlyChart from '@/Components/Pharmacy/YearlyChart.vue'
  
  export default {
    props: {
      monthlyCategorias: Array,
      monthlySeries: Array,
      weeklyCategories: Array,
      weeklySeries: Array,
      yearlySeries: Array,
      yearlyLabels: Array,
    },
    components: {
      MonthlyChart,
      WeeklyChart,
      YearlyChart
    }
  }
  </script>
  
  <style scoped>
  .chart-container {
    margin-bottom: 2rem;
  }
  </style>
  