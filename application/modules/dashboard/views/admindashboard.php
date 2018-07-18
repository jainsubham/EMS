<?php include('adminpannel.php') ;?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header card-header-success self-card-small-header" >
                    <h4 class="card-title">Attendance record of past 7 days</h4>
                  </div>
                  <div class="card-body self-card-body">
                    <div id="chartcontainer"></div>
                  </div>
                </div>
            </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/jquery.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min.js?v=2.1.0')?>" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
 <script>
      
    var chart = Highcharts.chart('chartcontainer', {

        title: {
            text: "Employee's presence record per day"
        },

        subtitle: {
            text: 'Showing record of 1 week'
        },

        yAxis:{
           title: {
                text: 'Employee`s Present'
            }
        },

        xAxis: {
            categories: [<?
                for($i=6;$i>=0;$i--){
                  echo "'".$attendance_record[$i]['day']." ".$attendance_record[$i]['display_date']."'";
                  if($i==0){
                    break ;
                  }else{
                    echo ",";
                  }
                }
              ?>]
        },

        series: [{
            type: 'column',
            name: "Employee's",
            colorByPoint: true,
            data: [<?
                for($i=6;$i>=0;$i--){
                  echo $attendance_record[$i]['employees_present'];
                  if($i==0){
                    break ;
                  }else{
                    echo ",";
                  }
                }
              ?>],
            showInLegend: false
        }]

    });
</script>
</body>

</html>
