<?php
  $bookTitle=$_POST["title"];
	$bookAuthor=$_POST["author"];
	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  $id = "SELECT id FROM user WHERE loggedin='1'";
  $curr=mysql_fetch_array(mysql_query($id));
  $insert = "INSERT INTO `bookingup_bookingup`.`Likes` (`UserID`, `BookTitle`, `Author`) VALUES ('" .$curr[0]."', '" .$bookTitle."', '" .$bookAuthor."')";
  //$insert= "INSERT INTO `bookingup_bookingup`.`Likes` (`UserID`, `BookTitle`, `Author`) VALUES ('2', 'Grapes of Wrath1', 'John Steinbeck1');";
  //$message = $insert
  //echo "<script type='text/javascript'>alert('$insert');</script>";
	$res=mysql_query($insert);
  echo '<script>window.location.replace("http://bookingup.web.engr.illinois.edu/editExistingProfile.php?")</script>';
	mysql_close();
?>
