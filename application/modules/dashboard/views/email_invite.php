<!DOCTYPE html>
<html>
<head>
	<title>Email Invite</title>
</head>
<body>
Invite your employee's
    <br><br><br><br><br><br>           
<?= form_open_multipart('dashboard/do_upload'); ?>
Select CSV file to upload
<?= form_upload('csvfile'); ?>
<br>
<?= form_submit(['value'=>'submit']); ?>
<?= form_close(); ?>

<br>
<br><br>
<a href="<?= base_url('user/logout'); ?>">Log Out</a> 
</body>
</html>