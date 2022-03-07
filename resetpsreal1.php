<!DOCTYPE html>
<html>
<head>
<title>Reset Password Real || <?php echo $bsr;?></title>
</head>
<body>
<?php
session_start();
$bsr = $_SESSION["buser"];
$first = $_POST["first"];
$second = $_POST["second"];
$third = $_POST["third"];
$fourth = $_POST["fourth"];
$fifth = $_POST["fifth"];
$sixth = $_POST["sixth"];
$seventh = $_POST["seventh"];
$eighth = $_POST["eighth"];
$ninth = $_POST["ninth"];
$tenth = $_POST["tenth"];
include 'connect.php';
$sql = mysqli_query($connect,"Select * from questions where buser='$bsr'");
$num = mysqli_num_rows($sql);
if ($num < 1)
{
	echo '<p>No answers found.</p>';
	echo "<a href = 'resetpsreal1.php'>Answer this.</a>  ";
}
else
{
	while ($row=mysqli_fetch_array($sql))
		{
		$u = $row["buser"];
		$a = $row["firstque"];
		$b = $row["secondque"];
		$c = $row["thirdque"];
		$d = $row["fourthque"];
		$e = $row["fifthque"];
		$f = $row["sixthque"];
		$g = $row["seventhque"];
		$h = $row["eighthque"];
		$i = $row["ninthque"];
		$j = $row["tenthque"];
			
		}
		if ($first==$a AND $second==$b AND $third==$c AND $fourth==$d AND $fifth==$e AND $sixth==$f AND $seventh==$g AND $eighth==$h AND $ninth==$i AND $tenth==$j)
		{
			session_start();
			$_SESSION['buser']=$u;
			?>
			<script>
			window.location.href='resetpsreal2.php';
			</script>
			<?php
		}
		else
		{
			echo '<p>Incorrect answers.</p>';
			echo "<a href = 'resetpsreal.php'>Try again.</a>  ";

		}
		
}
?>
</body>
</html>