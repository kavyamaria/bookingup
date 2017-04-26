<?php
  $bookTitle=$_POST["title"];
	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  $id = "SELECT id FROM user WHERE loggedin='1'";
  $curr=mysql_fetch_array(mysql_query($id));
  $insert = "INSERT INTO `bookingup_bookingup`.`author_likes` (`UserID`, `author`) VALUES ('" .$curr[0]."', '" .$bookTitle."')";
  //$insert= "INSERT INTO `bookingup_bookingup`.`Likes` (`UserID`, `BookTitle`, `Author`) VALUES ('2', 'Grapes of Wrath1', 'John Steinbeck1');";
  //$message = $insert
  //echo "<script type='text/javascript'>alert('$insert');</script>";
	$res=mysql_query($insert);
  if ($res) header("Location: http://bookingup.web.engr.illinois.edu/editExistingProfile.php?");
	mysql_close();
?>
