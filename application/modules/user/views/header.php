
<?= link_tag('assets/css/layout.css'); ?>
<?= link_tag('assets/css/fontawesome-4.6.3.min.css'); ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="bgded overlay" style="background-image:url('<?= base_url('assets/img/main.jpg');?>');"> 
<div class="wrapper row1" >
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="<?= base_url('web'); ?>">EMS</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="<?= base_url('web'); ?>">Home</a></li>

          
          <li><a href="<?= base_url('web/about'); ?>">About</a></li>
          <li><a href="<?= base_url('user'); ?>">Login</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
</div>
