<?php
  $username=$_POST["username"];
	$password=$_POST["password"];
  $name=$_POST["name"];
  $bio=$_POST["bio"];
  $gender=$_POST["gender"];
  $pref=$_POST["pref"];
  $image=$_POST["image"];

	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  $insert = "INSERT INTO `user`(`name`, `username`, `password`, `gender`, `gpref`, `bio`, `profilepic`) VALUES ('" .$name."','" .$username."','" .$password."','" .$gender."','" .$pref."','" .$bio."','" .$image."')";
  $res=mysql_query($insert);
  $findid="SELECT COUNT(*) FROM user";
  $tt=mysql_fetch_array(mysql_query($findid));
  $id=$tt[0]+1;
  $insert2="INSERT INTO `matchinfo`(`mutuals`, `matched`, `views`, `id`, `succes_rate`, `matcher`) VALUES (0,0,0,'" .$id."',0,0)";
  $res=mysql_query($insert2);
//  echo "<script type='text/javascript'>alert('$id');</script>";
  $cont = "UPDATE user SET id='$id', loggedin='1', times_successful='0', times_recommended='0' WHERE username='$username'";
  $tsh = mysql_query($cont);
  $zero = "UPDATE user SET relative_rank_book='0', relative_rank_author='0', relative_rank_genre='0', 'relative_rank_total' = '0' WHERE username='$username'";
  $zeroed = mysql_query($zero);
  if ($tsh) header("Location: http://bookingup.web.engr.illinois.edu/profilePage.php?");
	mysql_close();
?>
