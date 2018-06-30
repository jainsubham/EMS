<!DOCTYPE html>
<html>
<head>
	<title>Email Invite</title>
</head>
<body>
Invite your employee's
               
<?= form_open_multipart('dashboard/upload'); ?>

<?= form_close(); ?>
<br>

<a href="<?= base_url('user/logout'); ?>">Log Out</a> 
</body>
</html>