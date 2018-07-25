<?php include('user_header.php');?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
<style type="text/css">

  body{
    background-color: #eeeeee;
  }
</style>
    <div class="main-panel" >
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Monthly Attendance Record</a>
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
 
          <div class="row">
            
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <p class="card-title" style="font-size: 1.125rem; line-height: 1.4em; font-weight: 300; font-family: "Roboto", "Helvetica", "Arial", sans-serif;">Attendance record of month</p>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                  
                   <div class="row">
                      

  <div class=" col-md-6 col-sm-12  pull-right-lg" style="border:0px solid; ">
    
    <div class="col-md-12" style="padding:0px;">

      
        <table class="table table-bordered table-style table-responsive" style="border-radius: 10px;">
          <thead>
          <tr>
            <th colspan="2"><a href="<?= base_url('dashboard/get_monthly_attendance/'.$user_id.'/'.$prev) ?>"><i class="material-icons">keyboard_arrow_left</i></a></th>
            <th colspan="3"><b> <?php echo $html_title; ?></b></th>
            <th colspan="2"><a href="<?= base_url('dashboard/get_monthly_attendance/'.$user_id.'/'.$next) ?>"><i class="material-icons">keyboard_arrow_right</i></a></th>
          </tr>
          <tr class="self-calendar-th">
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
          </thead>
          <tbody class="self-calendar-tbody">
          <?php
            foreach ($weeks as $week) {
              echo $week;
            };
          ?>
          </tbody>
        </table>

    </div>
  </div>

            <div class="col-md-6">
              <div class="card card-profile">
                  <div class="card-avatar" style="margin-top: -32px;"> 
                    <a href="#pablo">
                    <img class="img" src="<?= base_url('assets/img/user/'.$img_link) ?>" />
                    </a>
                  </div>
                  <div class="card-body">
                  <h4 class="card-title"><?= $employee_name ?></h4>
                  <div class=" row col-md-12">
                      <div class="col-md-6">
                        <p class="card-description">Employee id - <b><?= $employee_id ?></b></p>
                      </div>
                      <div class="col-md-6">
                        <p class="card-description">Joining Date - <b><?= $joining_date ?></b></p>
                      </div>

                  </div>
                  <div class="col-md-12">
                        <p class="card-description">Designation - <b><?= $designation ?></b></p>
                  </div>
                      <div class="col-md-12">
                        <p class="card-description">Team /Department - <b><?= $team_name ?></b></p>
                      </div>
                  <div class=" row col-md-12">
                      <div class="col-md-6">
                        <p class="card-description">Present - <b><?= $present_days ?> days</b></p>
                      </div>
                      <div class="col-md-6">
                        <p class="card-description">Absent - <b><?= $absent_days ?> days</b></p>
                      </div>

                  </div>

                  </div>
              </div>

            </div>

              </div>
            <div class="card">
                  <div class="card-body">
                    <div class="row col-md-12">
                    <div class="col-md-6">
                        <p class="card-description"><button class="btn self-calendar-btn">Day</button>  Attendance Record for this date is not available</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-description"><button class="btn btn-danger self-calendar-btn">Day</button>  Employee was Absent on the specified day</p>
                    </div>
                  </div>
                  <div class="row col-md-12">
                    <div class="col-md-6">
                        <p class="card-description"><button class="btn btn-success self-calendar-btn">Day</button>  Employee was Present on the specfied day</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-description"><button class="btn btn-info self-calendar-btn">Day</button>  Official holiday / Sunday</p>
                    </div>
                  </div>
                  <div class="row col-md-12">
                    <div class="col-md-6">
                        <p class="card-description"><button class="btn btn-warning self-calendar-btn">Day</button>  Employee on Aprroved Leave</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-description"><button class="btn btn-primary self-calendar-btn">Day</button>  Today</p>
                    </div>
                  </div>

                  </div>
              </div>

            </div>
          </div>
           
           <div class="col-lg-12">
            <div class="card">
              <div class="card-header card-header-success self-card-small-header" >
                    <h4 class="card-title" style="font-size: 1.125rem; line-height: 1.4em; font-weight: 300; font-family: "Roboto", "Helvetica", "Arial", sans-serif;">Working Hours Record of Month</h4>
                  </div>
                  <div class="card-body self-card-body">
                    <div id="chartcontainer"></div>
                  </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>

  
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
      
    var chart = Highcharts.chart('chartcontainer', {

        title: {
            text: "Working Hours per day"
        },

        subtitle: {
            text: 'Showing record of 1 month'
        },

        yAxis:{
           title: {
                text: 'Hours'
            },
            min: 0,
            max: 12,
            tickInterval: 1
        },

        xAxis: {
            categories: [<?
                for($i=1;$i<=$day_count;$i++){
                  $day = $i > 9 ? $i : "0".$i;
                  echo "'".$attendance_record[$day]['day']." ".$attendance_record[$day]['display_date']."'";
                  if($i==$day_count){
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
                for($i=1;$i<=$day_count;$i++){
                  $day = $i > 9 ? $i : "0".$i;
                  echo $attendance_record[$day]['time'];
                  if($i==$day_count){
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