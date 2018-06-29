
<?=  link_tag('assets/css/font-awesome.min.css'); ?>
<!-- 
<style type="text/css">
    body{
        background:url('<?=  base_url('assets/img/bg.jpg'); ?>') no-repeat 0% 87% fixed;
    }
</style> -->
<?= link_tag('assets/css/style.css'); ?>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
<? include "header.php"; ?>


<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
 //function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- Meta tag Keywords -->
<!-- css files -->


<!-- //css files -->
<!-- online-fonts -->

</head>
<body>

    <div class="header-w3l">
        <h1 align="center">Company Registration Form</h1>
    </div>

<div class="main-agileits" align="center">
    
        <div class="sub-main" align="center">  
        <label for="Name">Name: </label>
        <?php echo form_open_multipart('user/login'); ?>
                <?php $name = array(
                       'class'=>"name",
                       'type'=>"text" ,
                       'name'=>"name" ,
                       'placeholder'=>"First Name"
                 );
        echo form_input($name); ?>

        <label for="Address"> Address: </label> 
                <?php $add = array(
                       'class' => 'address',
                       'type' => 'textarea',
                       'name' => 'address',
                       'placeholder'=>"Address"

                );
         echo form_input('$add');?>

        <label for="Website Address ">Website Address: </label> 
                   <?php $web = array(
                    'class' => 'website',
                    'type' => 'text',
                    'name' => 'website',
                    'placeholder'=>"Website Address"
                    );
        echo form_input('$web');?>

        <label for="email"> Email Address: </label> 
                    <?php
                    $email = array(
                    'class' => 'mail',
                    'type' => 'text',
                    'name' => 'mail',
                    'placeholder'=>"Email"

                    );
        echo form_input('$email');?>
        <span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
        
        <label for="contactno"> Contact No: </label>
                   <?php $contact = array(
                        'class' =>'number',
                       'type'=>"text",
                       'name'=>"number",
                       'placeholder'=>'Phone'    
                    );
        echo form_input($contact); ?>
        <span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>         
        <?php echo form_submit('submit','sign up') ?>
        <?php echo form_close(); ?>
        </div>
        <div class="clear"></div>
</div>

</div>

</body>
</html>
<? include "footer.php"; ?>
