<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="displayCSS.css">
<link rel="stylesheet" type="text/css" href="profilePage.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js">
  $('body').on('click', 'input.deleteDep', function() {
  $(this).parents('tr').remove();
});
</script>
<div class="mainbody container-fluid">
    <div class="row">
        <div class="navbar-wrapper">
            <div class="container-fluid">
                <div class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                    class="icon-bar"></span><span class="icon-bar"></span>
                            </button>


                            <a class="navbar-brand" href="./ORqmj">Booking Up</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <h1>View Your Statistics</h1>
                        <?php
                            $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                            if (!$link) {
                              die('Could not connect: ' . mysql_error());
                            }
                            $lmao = mysql_select_db('bookingup_bookingup', $link);
                            $insert = "SELECT * FROM user WHERE loggedin='1'";
                            #$insert = "SELECT * FROM user WHERE id=1";
                            $res=mysql_query($insert);
                            while($row = mysql_fetch_array($res)) {
                              echo "<td><h2><strong>" . $row['name'] . "</h2></strong></td>";
                              echo "<td><div align='center'><img class='thumbnail img-responsive' src=" . $row['profilepic'] . " height='300px'></div></td>";
                            }
                        ?>
                        <a href= "http://bookingup.web.engr.illinois.edu/profilePage.php"><button class="btn btn-primary"><i aria-hidden="true"></i>Return to Profile</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <?php
                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);
                $insert = "SELECT succes_rate FROM `matchinfo` WHERE id=(SELECT id FROM `user` WHERE loggedin='1')";
                $res=mysql_query($insert);
                while($row = mysql_fetch_array($res)) {
                  echo '<h1 class="panel-title pull-left" style="font-size:30px;">Your Success Rate: ' . $row[0] . '</h1>';
                }
              ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
              <?php
                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);
                $insert = "SELECT AVG(succes_rate) FROM `matchinfo` WHERE views>0 AND matcher>0";
                $res=mysql_query($insert);
                while($row = mysql_fetch_array($res)) {
                  echo '<h1 class="panel-title pull-left" style="font-size:30px;">Average Success Rate: ' . $row[0] . '</h1>';
                }
              ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
              <?php
                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);
                $insert = "SELECT AVG(succes_rate) FROM `matchinfo` WHERE id IN (SELECT id FROM `user` WHERE gpref=(SELECT gpref FROM `user` WHERE loggedin='1') and gender=(SELECT gender FROM `user` WHERE loggedin='1')) AND views>'0' and  matcher>0";
                $res=mysql_query($insert);
                while($row = mysql_fetch_array($res)) {
                  echo '<h1 class="panel-title pull-left" style="font-size:30px;">Average Success Rate of Your Competition: ' . $row[0] . '</h1>';
                }
              ?>
            </div>
        </div>
        <div class="panel panel-default">
            <h2 class="header">View the Success Rates of the Books You Liked:<h2>
        </div>
        <div class "interests" style="overflow-x:auto">
          <table id="books" style="width:100%">
          <?php
            $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
            if (!$link) {
              die('Could not connect: ' . mysql_error());
            }
            $lmao = mysql_select_db('bookingup_bookingup', $link);
            $insert = "SELECT book_title, succes_rate FROM `book_author`  WHERE book_title IN (SELECT BookTitle FROM `Likes` WHERE UserID=(SELECT id FROM `user` WHERE loggedin='1'))";
            $res=mysql_query($insert);
            while($row = mysql_fetch_array($res)) {
              echo "<tr>";
              echo "<td>" . $row['book_title'] . "</td>";
              echo "<td>" . $row['succes_rate'] . "</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </div>
      <br>
      <div class="panel panel-default">
          <div class="panel-body">
            <?php

                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);
                $insert = "SELECT succes_rate FROM `matchinfo` WHERE id=(SELECT id FROM `user` WHERE loggedin='1')";
                $res=mysql_query($insert);
                $row = mysql_fetch_array($res);
                $insert2 = "SELECT AVG(succes_rate) FROM `matchinfo` WHERE id IN (SELECT id FROM `user` WHERE gpref=(SELECT gpref FROM `user` WHERE loggedin='1') and gender=(SELECT gender FROM `user` WHERE loggedin='1')) AND views>'0' and  matcher>0";
                $res2=mysql_query($insert2);
                $row2 = mysql_fetch_array($res2);


                //  echo '<h1 class="panel-title pull-left" style="font-size:30px;">Oops, you are not that popular. Try these books?</h1>';
                  $res3 = "SELECT `book_title`, `author` FROM `book_author` WHERE `book_title` NOT IN (SELECT `BookTitle` FROM `Likes` WHERE `UserID`=(SELECT `id` FROM `user` WHERE loggedin='1') ) ORDER BY succes_rate DESC LIMIT 3 ";
                  $tam = mysql_query($res3);


                    if ($row[0] >= $row2[0]) {
                      echo '<h1 class="panel-title pull-left" style="font-size:30px;">Congrats! You are booking up well!</h1>';
                    } else

                    {
                  echo '<h1 class="panel-title pull-left" style="font-size:30px;">Oops, you are not that popular. Try these books?</h1><br>';
                  echo '<table id="books" style="width:100%">';
                  while($row3 = mysql_fetch_array($tam)) {
                    echo "<tr>";
                    echo "<td>" . $row3['book_title'] . "</td>";
                    echo "<td>" . $row3['author'] . "</td>";
                    echo "</tr>";
                  }
                  echo '</table>';
                }
            ?>
          </div>
      </div>
    </div>
</div>
