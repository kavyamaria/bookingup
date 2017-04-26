<?php
  $username=$_POST["username"];
	$password=$_POST["password"];

	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  $insert = "UPDATE `user` SET `loggedin`='1' WHERE username='$username'";
  $tsh = mysql_query($insert);
  if ($tsh) header("Location: http://bookingup.web.engr.illinois.edu/profilePage.php?");
	mysql_close();
?>
