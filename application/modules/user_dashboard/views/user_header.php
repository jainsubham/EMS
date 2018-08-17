<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png');  ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
  <!-- CSS Files -->
  <?= link_tag('assets/css/custom.css') ?>
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0'); ?>" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url('assets/img/sidebar-1.jpg') ?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          User Dashboard
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href='<?= base_url('user_dashboard'); ?>'>
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('profile'); ?>">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user_dashboard/attendance/'.date('Y-m',time())); ?>">
              <i class="material-icons">content_paste</i>
              <p>Attendance</p>
            </a>
          </li>
          <!--Dropdown primary-->
          <div class=" nav-item dropdown" >
            <li  id="dropdownMenu1"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <a href="#" class="nav-link">
              <i class="material-icons">speaker_notes</i>
              <p>Leave</p>
              </a>
            </li>
            <div class="dropdown-menu dropdown-primary">
               <a class="nav-link" href="<?= base_url('user_dashboard/leave') ?>">Leave Status</a>
               <a class="nav-link" href="<?= base_url('user_dashboard/leave_balance') ?>">Leave Balance</a>
               <a class="nav-link" href="<?= base_url('user_dashboard/apply_leave') ?>">Leave Request</a>
               <a class="nav-link" href="<?= base_url('user_dashboard/team_leave') ?>">Team Request</a>

            </div>
          </div>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user_dashboard/announcement'); ?>">
              <i class="material-icons">announcement</i>
              <p>Announcements</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user_dashboard/organization'); ?>">
              <i class="material-icons">store_mall_directory</i>
              <p>Organization Structure</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user_dashboard/employee_directory'); ?>">
              <i class="material-icons">group</i>
              <p>Employee Directory</p>
            </a>
          </li> 
          <?php if($this->session->userdata('switched')) {?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user_dashboard/switch_admin'); ?>">
              <i class="material-icons">group</i>
              <p>Switch As Admin</p>
            </a>
          </li>
        <?php } ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user/logout'); ?>">
              <i class="material-icons">power_settings_new</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html>
