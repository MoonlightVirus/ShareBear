<!DOCTYPE html>
<html>
<head>
<title>Sharebear: Account Creation</title>
</head>
<?php
include "connect.php";
$qid = $_POST['qid'];
$buser = $_POST['buser'];
$pass = $_POST['pass'];
$fn = $_POST['fname'];
$gn = $_POST['gname'];
$email = $_POST['email'];

$insert = mysqli_query($connect,"insert into bear(user, buser, fname, gname, email, password) 
values('$qid','$user', '$fn', '$gn', '$email', '$pass')");

if (!$insert) 
	{
		?>
		<script>
		alert('Account Creation Failed.');
		window.location.href='SBcreate.html';
		</script>
		<?php
	}
	
else
	{
		?>
		<script>
		alert('Account Creation Successful.');
		window.location.href='SBcreate.html';
		</script>
		<?php
	}
	?>

</body>
</html>