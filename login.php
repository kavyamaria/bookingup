<?php
  $user = $_POST["name"];
  $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
  if (!$link) {
    die('Could not connect: ' . mysql_error());
  }
  $lmao = mysql_select_db('bookingup_bookingup', $link);

  function SignIn() {
    session_start();
    if (!empty($_POST['user'])) {
      $query = mysql_query("SELECT * FROM user WHERE username = '$_POST[user]' and password = '$_POST[pass]'");
      $row = mysql_fetch_array($query);
      $message = 'beep';
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }

  if (isset($_POST['submit'])) {
      SignIn();
  }

?>
