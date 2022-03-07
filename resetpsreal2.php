<!DOCTYPE html>
<html>
<head>

<?php
session_start();
$bsr = $_SESSION["buser"];
include "connect.php";
$sql = mysqli_query($connect,"select * from bear where buser='$bsr'");
$num = mysqli_num_rows($sql);
if (isset($_SESSION["bear"]))
{
	?>
	<script>
	window.location.href="home.php";
	</script>
	<?php
}
?>

<title>Reset Password Real || <?php echo $bsr;?></title>
</head>
<body>
<?php
$buser = $bsr;

$sql = mysqli_query($connect,"select * from bear where buser='$buser'");
$num = mysqli_num_rows($sql);

if ($num < 1)
{
	echo "No User Found.";
}
else
{
	
	while ($row=mysqli_fetch_array($sql))
	{
		
		$p = $row['password'];
	?>
	<form action="resetpsreal3.php" method="post">
	<p> Reset password </p>
	<input type="text" name="newpas" value='<?php echo $p; ?>'/>
	<input type="submit" value="Save"/>
	</form>
	<?php
	}
}
//end

?>
</body>
</html>