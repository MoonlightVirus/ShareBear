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

<title>Reset Password || <?php echo $bsr;?></title>
</head>
<body>
<?php
$buser = $bsr;
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

$search = mysqli_query($connect,"select * from questions where buser='$buser'");
$num = mysqli_num_rows($search);

if ($num > 0)
{
	$search = mysqli_query($connect,"select * from questions where buser='$buser'");
	echo "<table border='1'>";
	echo "<tr><th>Bear User</th>";
	echo "<th>First Question</th>";
	echo "<th>Second Question</th>";
	echo "<th>Third Question</th>";
	echo "<th>Fourth Quetion</th>";
	echo "<th>Fifth Question</th>";
	echo "<th>Sixth Question</th>";
	echo "<th>Seventh Question</th>";
	echo "<th>Eighth Question</th>";
	echo "<th>Ninth Question</th>";
	echo "<th>Tenth Question</th></tr>";
	while ($row=mysqli_fetch_array($search))
	{
		echo "<tr>";
		
		$a = $row["buser"];
		$b = $row["firstque"];
		$c = $row["secondque"];
		$d = $row["thirdque"];
		$e = $row["fourthque"];
		$f = $row["fifthque"];
		$g = $row["sixthque"];
		$h = $row["seventhque"];
		$i = $row["eighthque"];
		$j = $row["ninthque"];
		$k = $row["tenthque"];
		
		

		
		echo "<td>".$a."</td>";
		echo "<td>".$b."</td>";
		echo "<td>".$c."</td>";
		echo "<td>".$d."</td>";
		echo "<td>".$e."</td>";
		echo "<td>".$f."</td>";
		echo "<td>".$g."</td>";
		echo "<td>".$h."</td>";
		echo "<td>".$i."</td>";
		echo "<td>".$j."</td>";
		echo "<td>".$k."</td>";
		echo "</tr>";
		}
		echo "</table>";
		echo "<h5>Already Answered.</h5>";
}
else
{	
	$sql = mysqli_query($connect,"insert into questions (buser, firstque, secondque, thirdque, fourthque, fifthque, sixthque, seventhque, eighthque, ninthque, tenthque) values ('$buser', '$first', '$second', '$third', '$fourth', '$fifth', '$sixth', '$seventh', '$eighth', '$ninth', '$tenth')");
	if (!$sql)
	{
		echo "Failed to add the new product.";
	}
	else
	{
		$search = mysqli_query($connect,"select * from questions where buser='$buser'");
	echo "<table border='1'>";
	echo "<tr><th>Bear User</th>";
	echo "<th>First Question</th>";
	echo "<th>Second Question</th>";
	echo "<th>Third Question</th>";
	echo "<th>Fourth Quetion</th>";
	echo "<th>Fifth Question</th>";
	echo "<th>Sixth Question</th>";
	echo "<th>Seventh Question</th>";
	echo "<th>Eighth Question</th>";
	echo "<th>Ninth Question</th>";
	echo "<th>Tenth Question</th></tr>";
	while ($row=mysqli_fetch_array($search))
	{
		echo "<tr>";
		
		$a = $row["buser"];
		$b = $row["firstque"];
		$c = $row["secondque"];
		$d = $row["thirdque"];
		$e = $row["fourthque"];
		$f = $row["fifthque"];
		$g = $row["sixthque"];
		$h = $row["seventhque"];
		$i = $row["eighthque"];
		$j = $row["ninthque"];
		$k = $row["tenthque"];
		
		

		
		echo "<td>".$a."</td>";
		echo "<td>".$b."</td>";
		echo "<td>".$c."</td>";
		echo "<td>".$d."</td>";
		echo "<td>".$e."</td>";
		echo "<td>".$f."</td>";
		echo "<td>".$g."</td>";
		echo "<td>".$h."</td>";
		echo "<td>".$i."</td>";
		echo "<td>".$j."</td>";
		echo "<td>".$k."</td>";
		echo "</tr>";
		}
		echo "</table>";
		echo "<h5>Security questions answered, do take note of your answers</h5>";
	}
	}
//end

?>
<a href = 'resetpsreal.php'> reset!! </a>
</body>
</html>