<?php
  $username=$_POST["name"];

	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  //echo '<script>window.location.replace("http://bookingup.web.engr.illinois.edu/viewOther.php?")</script>';
  //echo "<script type='text/javascript'>alert('AFDSDFSDFSD');</script>";
  $insert = "UPDATE `user` SET `viewing`='1' WHERE name='$username'";
  $tsh = mysql_query($insert);

  $match="UPDATE `matchinfo` SET views=views+1 WHERE id=(SELECT id FROM `user` WHERE viewing='1') ";
  $mtest = mysql_query($match);

  $sql8="UPDATE `matchinfo`
  SET succes_rate=.75*(mutuals/matcher)+.25*(matched/views)
  WHERE views > '0' AND matcher > '0'";
  $res8=mysql_query($sql8);



  $sql9="UPDATE `book_author`
  SET succes_rate=times_successful/times_recommended
  WHERE times_recommended > '0' ";
  $res9=mysql_query($sql9);



  $as = "UPDATE book_author SET times_recommended=times_recommended+1 WHERE book_title IN
  ( SELECT like1.BookTitle FROM `Likes` AS like1 INNER JOIN `Likes` AS like2 ON like1.BookTitle = like2.BookTitle
    WHERE like1.UserID = (SELECT id FROM `user` WHERE loggedin='1') AND like2.UserID=(SELECT id FROM `user` WHERE viewing='1'))";
  $res=mysql_query($as);
  $sql2 = "UPDATE genres SET times_recommended=times_recommended+1 WHERE genre IN
  ( SELECT like1.genre FROM `genre_likes` AS like1 INNER JOIN `Likes` AS like2 ON like1.genre = like2.genre
    WHERE like1.UserID = (SELECT id FROM `user` WHERE loggedin='1') AND like2.UserID=(SELECT id FROM `user` WHERE viewing='1'))";
  $res2=mysql_query($sql2);
  $sql3 = "UPDATE authors SET times_recommended=times_recommended+1 WHERE author IN
    ( SELECT like1.author FROM `author_likes` AS like1 INNER JOIN `author_likes` AS like2 ON like1.author = like2.author
      WHERE like1.UserID = (SELECT id FROM `user` WHERE loggedin='1') AND like2.UserID=(SELECT id FROM `user` WHERE viewing='1'))";
  $res3=mysql_query($sql3);

  echo '<script>window.location.replace("http://bookingup.web.engr.illinois.edu/viewOther.php?")</script>';
?>
