<?php
  $q = $_REQUEST["q"];
	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
 // echo "Hey there"
//$beep="BEEP BEEP MF";
  $message = $q;
  $beep="Update Sucessful";
  #echo "<script type='text/javascript'>alert('$beep');</script>";


  $sql = "UPDATE user
  SET bio= '$message'
  WHERE loggedin='1' ";
  //$insert= "INSERT INTO `bookingup_bookingup`.`Likes` (`UserID`, `BookTitle`, `Author`) VALUES ('2', 'Grapes of Wrath1', 'John Steinbeck1');";
  //$message = $insert
  //echo "<script type='text/javascript'>alert('$insert');</script>";
	$res=mysql_query($sql);
  echo '<script>window.location.replace("http://bookingup.web.engr.illinois.edu/profilePage.php?")</script>';
  mysql_close();
?>
