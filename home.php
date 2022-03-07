<?php
//start
session_start();
$_SESSION['bear']='12345';
if (!isset($_SESSION['bear']))
{
?>
	<script>
	window.location.href='index.php';
	</script>
<?php
}
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost:3308', 'root', '', 'bear');
include "connect.php";
$bear = $_SESSION['bear'];
$search = mysqli_query($connect, "Select * from bear where buser='$bear'");
$num = mysqli_num_rows($search);
if ($num < 1)
{
	session_destroy();
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
else
{
	While ($row = mysqli_fetch_array($search))
	{
			$fname = $row['fname'];
			$gname = $row['gname'];
			
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' href='style.css' type='text/css'/>
<style>

/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
  left: 730px;
  top: -15px;
  text-align: center;
  width: 150px;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
  
}

.select-selected {
  background-color: rgb(255, 255, 255);
  
}




/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: black;
  padding-top: 3px;
  border: 1px solid transparent;
  border-color:  rgba(0, 0, 0, 0.9);
  cursor: pointer;
  user-select: none;
  font-size: 15px;
  width: 150px;
  height: 30px;
  
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: rgb(255, 255, 255);
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
   width: 150px;
   
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
<title> Home || <?php echo $gname . " " . $fname; ?> </title>
<link rel='icon' href='bear.png' type='image/icon type'/>

<script src="https://kit.fontawesome.com/f8a0d66908.js" crossorigin="anonymous"></script>
</head>
<body>
<div class='header'>
	<div class='header_right'>
		<?php
			$pfp = mysqli_query($connect, "select * from profilepic where buser='$bear'");
			$number = mysqli_num_rows($pfp);
			if($number < 1)
			{
				echo "<img src='bear.png'/>";
			
			}
			else
			{
				while ($row1 = mysqli_fetch_array($pfp))
				{
						$pic = $row1['pic'];
				}
				echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'"/>';
			}
			echo "<p>" .$gname . " " . $fname . "</p>";
		?>
		
	</div>
	
	<div class='header_left'>
		<form action='bsearch.php' method='post'>
			<input type='text' name='search' placeholder='Search'/>
		</form>
		<a href='profile.php' title='Profile' > <i class="fa-solid fa-user"></i></a>
		<a href='home.php' title='Home' > <i class="fa-solid fa-house"></i> </a>
		<a href='settings.php' title='Settings' > <i class="fa-solid fa-gear"></i> </a>
		<a href='logout.php' title='Logout' > <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
		
	</div>
</div>

<div class='categories'>
	<p> Categories </p>
	<a href='General.php' title='General' > General </a> <br>
	<a href='Food.php' title='Food' > Food </a><br>
	<a href='Academics.php' title='Academics' > Academics </a><br>
	<a href='News.php' title='News' > News </a><br>
	<a href='Fashion.php' title='Fashion' > Fashion </a> <br>
	<a href='Entertainment.php' title='Entertainment' > Entertainment </a><br>
	<a href='Sports.php' title='Sports' > Sports </a><br>
	<a href='Events.php' title='Events' > Events </a><br>
</div>
<div class='FrontPage'>
	<p class='feed'> BearFeed </p>
	<p class='message'> Welcome Fellows! Welcome to ShareBear where everywhere you can be with your bear-families and bear-friends! </p>
	<img src='bear.png'/>
	<img src='bear.png'/>
	<img src='bear.png'/>
	<img src='bear.png'/>

</div>
<div class='post'>
	<div class='pfp'>
	<form action='post.php' method='POST' enctype='multipart/form-data'>
			<textarea id='bearpost' name='text' rows='1' cols='50' placeholder='Something on your Mind? Type it here!'></textarea>
			<input type="file" name="myimage" accept="image/*" style="display:initial" required>
			<div class='custom-select'>
			<select name='category'>
				<option value='General'> General </option>
				<option value='Food'> Food </option>
				<option value='Academics'> Academics </option>
				<option value='News'> News </option>
				<option value='Fashion'> Fashion </option>
				<option value='Entertainment'> Entertainment </option>
				<option value='Sports'> Sports </option>
				<option value='Events'> Events </option>
			</select>
			</div>
			<input type='submit' name="submit_image" value='Post'>
		</form>
	
	<?php
$posts = $db->get ('bearpost');
include "connect.php";
	$postsearch = mysqli_query($connect,"Select * from bearpost order by postid desc");
		while ($row=mysqli_fetch_array($postsearch)){
		$postid = $row['postid'];
		$buser = $row['buser'];
		$postcat = $row['postcat'];
		$post = $row['post'];
		$pdate = $row['pdate'];
		$image_name = $row['image_name'];	
		$image = $row['image'];
?>
	<div class='PostPage'>
	<p class='feed'> <?php echo $buser; ?> </p>
	<p class='date'> <?php echo $pdate; ?> </p>
	<div class='links'>
	<form method="POST" action="delete.php">
	<input type="submit" data-postid="'<?php $postid ?>'" class="delete" name="delete" value="Delete">
	</form>
	<form method="POST" action="edit.php">
	<input type="submit" data-postid="'<?php $postid ?>'" class="edit" name="edit" value="Edit">
	</form>
	</div>
	<p class='message'> <?php echo $post; ?> </p>
	<div class='image'>
	<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>'; ?>
	</div>
	</div>
	
<?php
		
		}
?>
		
		<?php
			$pfp = mysqli_query($connect, "select * from profilepic where buser='$bear'");
			$number = mysqli_num_rows($pfp);
			if($number < 1)
			{
				echo "<img src='bear.png'/>";
			
			}
			else
			{
				while ($row1 = mysqli_fetch_array($pfp))
				{
						$pic = $row1['pic'];
				}
				echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'"/>';
			}
		?>
		
</div>
</div>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
</body>
</html>
