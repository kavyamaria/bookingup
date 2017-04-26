<?php
  $bookTitle=$_POST["title"];
	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  $insert = "DELETE FROM  `Likes` WHERE UserID= (SELECT id FROM user WHERE loggedin='1') AND Likes.BookTitle LIKE  '%" .$bookTitle."%'";
  #$message = $insert
  //echo "<script type='text/javascript'>alert('$insert');</script>";
	$res=mysql_query($insert);
  echo '<script>window.location.replace("http://bookingup.web.engr.illinois.edu/editExistingProfile.php?")</script>';
	 mysql_close();
?>
