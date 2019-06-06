<template>
  <section id="dashboard">
    <!--<search-dashboard></search-dashboard>-->
    <cascading-admin-card></cascading-admin-card>
    <!--<bar-chart></bar-chart>-->
    <!--<table-dashboard></table-dashboard>-->
    <chart-dashboard></chart-dashboard>
    <!--<google-map-dashboard></google-map-dashboard>-->
    <!--<admin-card></admin-card>-->
  </section>
</template>

<script>
import CascadingAdminCard from './CascadingAdminCard'
import BarChart from './BarChart'
import TableDashboard from './TableDashboard'
import ChartDashboard from './ChartDashboard'
import GoogleMapDashboard from './GoogleMapDashboard'
import AdminCard from './AdminCard'
import SearchDashboard from './SearchDashboard'

export default {
  name: 'Dashboard',
  components: {
    CascadingAdminCard,
    BarChart,
    TableDashboard,
    ChartDashboard,
    GoogleMapDashboard,
    AdminCard,
    SearchDashboard
  },
    data () {
      return {

      }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
