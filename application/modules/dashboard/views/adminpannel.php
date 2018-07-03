<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Admin Dashboard
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href='admindashboard'>
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('profile/adminprofile'); ?>">
              <i class="material-icons">person</i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="attendance">
              <i class="material-icons">content_paste</i>
              <p>Today Attendance</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="announcement">
              <i class="material-icons">library_books</i>
              <p>Announcement</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="invite_emp">
              <i class="material-icons">bubble_chart</i>
              <p>Invite Employees</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="organization">
              <i class="material-icons">location_ons</i>
              <p>Organization Structure</p>
            </a>
        </ul>
      </div>
    </div>