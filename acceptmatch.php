<?php
	$link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$lmao = mysql_select_db('bookingup_bookingup', $link);
  //$nameq = "SELECT `name` FROM `user` WHERE `loggedin` = '1'";
  //$name = mysql_query($nameq);
//  echo mysql_result($nameq, 0);
	$into = "INSERT INTO `match`(`UserID1`, `UserID2`) VALUES ((SELECT id FROM `user` WHERE viewing='1'), (SELECT id FROM `user` WHERE loggedin='1'))";
	$inte = mysql_query($into);

  $sql = "UPDATE book_author SET times_successful=times_successful+1 WHERE book_title IN
  ( SELECT like1.BookTitle FROM `Likes` AS like1 INNER JOIN `Likes` AS like2 ON like1.BookTitle = like2.BookTitle
    WHERE like1.UserID = (SELECT id FROM `user` WHERE loggedin='1') AND like2.UserID=(SELECT id FROM `user` WHERE viewing='1'))";
	$res=mysql_query($sql);

	$sql2 = "UPDATE genres SET times_successful=times_successful+1 WHERE genre IN
  ( SELECT like1.genre FROM `genre_likes` AS like1 INNER JOIN `Likes` AS like2 ON like1.genre = like2.genre
    WHERE like1.UserID = (SELECT id FROM `user` WHERE loggedin='1') AND like2.UserID=(SELECT id FROM `user` WHERE viewing='1'))";
	$res2=mysql_query($sql2);


$sql3="UPDATE `matchinfo` SET matcher=matcher+1 WHERE id=(SELECT id FROM `user` WHERE loggedin='1')";
$res3=mysql_query($sql3);

$sql4="UPDATE `matchinfo` SET matched=matched+1 WHERE id=(SELECT id FROM `user` WHERE viewing='1')";
$res4=mysql_query($sql4);



$sql6="UPDATE `matchinfo` SET mutuals=
(SELECT COUNT(*) FROM `match`WHERE UserID2 IN (SELECT UserID1 FROM `match` WHERE UserID2=  (SELECT id FROM `user` WHERE loggedin='1')) AND UserID1=(SELECT id FROM `user` WHERE loggedin='1') ) WHERE id=(SELECT id FROM `user` WHERE loggedin='1')";
$res6=mysql_query($sql6);


$sql7="UPDATE `matchinfo` SET mutuals=
(SELECT COUNT(*) FROM `match`WHERE UserID2 IN (SELECT UserID1 FROM `match` WHERE UserID2=  (SELECT id FROM `user` WHERE viewing='1')) AND UserID1=(SELECT id FROM `user` WHERE viewing='1') ) WHERE id=(SELECT id FROM `user` WHERE viewing='1')";
$res7=mysql_query($sql7);




$sql8="UPDATE `matchinfo`
SET succes_rate=.75*(mutuals/matcher)+.25*(matched/views)
WHERE views > '0' AND matcher > '0'";
$res8=mysql_query($sql8);



$sql9="UPDATE `book_author`
SET succes_rate=times_successful/times_recommended
WHERE times_recommended > '0' ";
$res9=mysql_query($sql9);



	// $sql3 = "UPDATE authors SET times_successful=times_successful+1 WHERE author IN
	//   ( SELECT like1.author FROM `author_likes` AS like1 INNER JOIN `author_likes` AS like2 ON like1.author = like2.author
	//     WHERE like1.UserID = (SELECT id FROM `user` WHERE loggedin='1') AND like2.UserID=(SELECT id FROM `user` WHERE viewing='1'))";
	// $res3=mysql_query($sql3);
  #echo mysql_result($res, 0);
	$up = "UPDATE `user` SET viewing = '0' WHERE viewing ='1'";
	$run=mysql_query($up);
  if ($run) header("Location: http://bookingup.web.engr.illinois.edu/profilePage.php?");
	 mysql_close();
?>
