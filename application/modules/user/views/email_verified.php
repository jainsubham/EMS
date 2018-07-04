<!DOCTYPE html>
<html>
<head>
	<title>Email  Verified</title>
	<? include('css_head.php'); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url('');?>">EMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('');?>">Home <span class="sr-only">(current)</span></a>
      </li>
     
 
    </ul>
    <ul>
    <li class="nav-item nav-link">
      <a href="<?= base_url('user/login'); ?>">Log In</a> 
    
</li>
</ul>
  </div>
</nav>
<br>
<div class="container">
	<div class="card mb-3">
  <h3 class="card-header">Verified !</h3>
  <div class="card-body">
    <h5 class="card-title">Dear user , Your email has been verified!</h5>
    <h6 class="card-subtitle text-muted"></h6>
  </div><center>
  <img class="img-responsive" style="height: 100px; display: block;" src="<?= base_url('assets/img/verified.png'); ?>" alt="Card image"></center>
  <div class="card-body">
    <p class="card-text">Kindly Login into your account to use it.</p>
  </div>
 
  <div class="card-footer text-muted">
    For any quries contact us 
  </div>
</div>

</div>


</body>
</html>