<!DOCTYPE html>
<html>
<head>

<?php
session_start();
$bsr = $_SESSION['buser'];
include 'connect.php';
$sql = mysqli_query($connect,"select * from bear where buser='$bsr'");
$num = mysqli_num_rows($sql);
if (isset($_SESSION['bear']))
{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}
?>

<title>Reset Password || <?php echo $bsr;?></title>
</head>
<body>
	<p> Fill in these security questions, this will come in handy if you ever want to reset your password. </p>

	<form action='resetps1.php' method='post'>
	
	<p> Question 1 </p>
	<p> Your favorite color? </p>
	<input type='text' name='first' placeholder='Answer 1' 
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 2 </p>
	<p> Your favorite number? </p>
	<input type='number' name='second' placeholder='Answer 2' autocomplete='off' required/>
	
	<p> Question 3 </p>
	<p> Name of your favorite band or singer? </p>
	<input type='text' name='third' placeholder='Answer 3'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 4 </p>
	<p> Name of your favorite song? </p>
	<input type='text' name='fourth' placeholder='Answer 4'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 5 </p>
	<p> Name of your favorite phone brand? </p>
	<input type='text' name='fifth' placeholder='Answer 5'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>

	<p> Question 6 </p>
	<p> Name of your favorite video game? </p>
	<input type='text' name='sixth' placeholder='Answer 6'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 7 </p>
	<p> Name of your favorite film? </p>
	<input type='text' name='seventh' placeholder='Answer 7'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 8 </p>
	<p> Name of your favorite animal? </p>
	<input type='text' name='eighth' placeholder='Answer 8'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 9 </p>
	<p> Name of your favorite chips? </p>
	<input type='text' name='ninth' placeholder='Answer 9'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<p> Question 10 </p>
	<p> Name of your preferred toothpaste? </p>
	<input type='text' name='tenth' placeholder='Answer 10'
	onkeyup='var start = this.selectionStart; 
	var end = this.selectionEnd; 
	this.value = this.value.toUpperCase(); 
	this.setSelectionRange(start, end);' autocomplete='off' required/>
	
	<input type='submit' value='Save' />
	</form>
	
</body>
</html>