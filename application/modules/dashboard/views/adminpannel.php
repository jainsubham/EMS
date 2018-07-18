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
  <!-- CSS Files -->
  <?= link_tag('assets/css/material-dashboard.css?v=2.1.0'); ?>
  <?= link_tag('assets/css/custom.css'); ?>

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
          Admin Dashboard
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href='<?= base_url('dashboard'); ?>'>
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('profile'); ?>">
              <i class="material-icons">person</i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/attendance'); ?>">
              <i class="material-icons">content_paste</i>
              <p>Attendance</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/announcement'); ?>">
              <i class="material-icons">library_books</i>
              <p>Announcement</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/leave'); ?>">
              <i class="material-icons">library_books</i>
              <p>Leaves</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/invite'); ?>">
              <i class="material-icons">bubble_chart</i>
              <p>Invite Employees</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/organization'); ?>">
              <i class="material-icons">location_ons</i>
              <p>Organization Structure</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/EmpDetails'); ?>">
              <i class="material-icons">person</i>
              <p>Employees</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/designations'); ?>">
              <i class="material-icons">person</i>
              <p>Designations</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/teams'); ?>">
              <i class="material-icons">person</i>
              <p>Teams / Departments</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('dashboard/switch_user'); ?>">
              <i class="material-icons">person</i>
              <p>switch as user</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('user/logout'); ?>">
              <i class="material-icons">person</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>