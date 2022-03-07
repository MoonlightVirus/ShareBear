<?php
session_start();
$_SESSION['bear']='111';
if (!isset($_SESSION['bear']))
{
?>
	<script>
	window.location.href='index.php';
	</script>
<?php
}
_____________________________
<?php
session_start();
if (isset($_SESSION['bear']))
{
?>
	<script>
	window.location.href='index.php';
	</script>
<?php
}
_____________________________
