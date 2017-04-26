<?php
	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  //$nameq = "SELECT `name` FROM `user` WHERE `loggedin` = '1'";
  //$name = mysql_query($nameq);
//  echo mysql_result($nameq, 0);
  $insert = "UPDATE `user` SET loggedin = '0' WHERE loggedin ='1'";
	$res=mysql_query($insert);


  #echo mysql_result($res, 0);
  if ($res) header("Location: http://bookingup.web.engr.illinois.edu/index.html?");
	 mysql_close();
?>
