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
$pass = $_POST['newpas'];

$sql = mysqli_query($connect, "update bear set password='$pass' where buser='$bsr'");

if (!$sql)
{
	echo "Failed to update the record";
}
else
{
	$search = mysqli_query($connect,"select * from bear where buser='$bsr'");
	echo "<table border='1'>";
	echo "<tr><th>Username</th>";
	echo "<th>Password</th>";

	while ($row=mysqli_fetch_array($search))
	{
		echo "<tr>";
		
		$u = $row['buser'];
		$p = $row['password'];
		
		echo "<td>".$u."</td>";
		echo "<td>".$p."</td>";
		echo "</tr>";
	}
		echo "</table>";
		echo "<h5> Password reset successful</h5>";
		echo "<br><br>";
		echo "<a href = 'index.php'> try </a>  ";
}


//end

?>
</body>
</html>