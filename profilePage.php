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
                        <!--
                        <div align="center">
                            <img class="thumbnail img-responsive" src="https://img.buzzfeed.com/buzzfeed-static/static/2015-09/14/11/enhanced/webdr06/anigif_original-32634-1442246101-4.gif" width="300px" height="300px">
                        </div>
                      -->
                        <div class="media-body">
                            <hr>
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
                              echo "<td><div align='center'><img class='thumbnail img-responsive' src=" . $row['profilepic'] . " width='300px' height='300px'></div></td>";
                              #echo "<h2><strong>Insert Username from DB</strong></h2>";
                              echo "<h3><strong>Bio:</strong></h3>";
                              #echo "<p>" . $row['BookTitle'] . "</p>"
                              echo "<td><p>" . $row['bio'] . "</p></td>";
                              echo "<hr>";
                              echo "<h3><strong>Gender:</strong></h3>";
                              if ($row['gender'] == 'F') {
                                echo "<td><p>Female</p></td>"; }
                              else {
                                echo "<td><p>Male</p></td>"; }
                              #echo "<td><p>" . $row['gender'] . "</p></td>";
                              #echo "<p>Insert Gender from DB</p>";
                              echo "<hr>";
                              echo "<h3><strong>I'm looking for:</strong></h3>";
                              #echo "<p>Insert Pref from DB</p>";
                              if ($row['gpref'] == 'F') {
                                echo "<td><p>Females</p></td>"; }
                              else {
                                echo "<td><p>Males</p></td>"; }
                              #echo "<td><p>" . $row['gpref'] . "</p></td>";
                              echo "<hr>";
                              }
                            ?>
                            <span style="display: inline;">
                              <a href= "http://bookingup.web.engr.illinois.edu/editExistingProfile.php"><button class="btn btn-primary"><i aria-hidden="true"></i>Edit Profile</button></a>
                              <a href="http://bookingup.web.engr.illinois.edu/graphs.php"><button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>View Your Reviews</button></a>
                            </span>
                            <br>
                            <h3>View options to choose from:</h3>
                            <span style="display: inline;">
                              <a href="http://bookingup.web.engr.illinois.edu/viewAllBooks.php"><button class="btn btn-primary" background-color: #ffff34>Books</button></a>
                              <a href="http://bookingup.web.engr.illinois.edu/viewAllAuthors.php"><button class="btn btn-primary" background-color: #ffff34>Authors</button></a>
                              <a href="http://bookingup.web.engr.illinois.edu/viewAllGenres.php"><button class="btn btn-primary" background-color: #ffff34>Genres</button></a>
                            </span>
                            <br><br><br>
                            <span style="display: inline;">
                              <form action="logout.php" method="post" target="_blank" class="form-horizontal">
                                  <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Log Out</button>
                              </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <!--
            <div class="panel panel-default">
              <h2 class="header">My Matches<h2>
            </div>
                <ul class="matches">
                  <li><img src="http://akns-images.eonline.com/eol_images/Entire_Site/2016115/rs_300x300-160215162459-600.demi-lovato.cm.21516.jpg" id="one" width=175px, height=175px></li>
                  <li><img src="https://static.listionary.com/core/uploads/1467576760-main-taylor-swift-LNk.jpg" id="two" width=175px, height=175px></li>
                  <li><img src="https://static.listionary.com/core/uploads/1463134871-gigi-hadid.jpg" id="three" width=175px, height=175px></li>
                </ul>
            <hr> -->
            <!-- Simple post content example. -->
            <!-- RECOMMENDATIONS -->
            <div class="panel panel-default">
                <h2 class="header">Potential Matches:<h2>
            </div>
            <div class "interests" style="overflow-x:auto">
              <table id="books" style="width:100%">
              <?php
                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);

                 $a1 = "UPDATE `user` SET relative_rank_book = 0";
                 $b1 = mysql_query($a1);
                 $a2 = "UPDATE `user` SET relative_rank_author = 0";
                 $b2 = mysql_query($a2);
                 $a3 = "UPDATE `user` SET relative_rank_genre = 0";
                 $b3 = mysql_query($a3);
                 $a4 = "UPDATE `user` SET relative_rank_total = 0";
                 $b4 = mysql_query($a4);
                $shivali = "UPDATE `user`SET `user`.relative_rank_book = (SELECT c2 as r FROM
                  ((SELECT userID as i2, COUNT(userID) as c2 FROM `Likes` AS L2 WHERE BookTitle IN
                  ((SELECT BookTitle as b2 FROM `Likes` WHERE UserID = (SELECT id FROM `user` WHERE loggedin = '1')))
                  GROUP BY userID) AS Y) WHERE i2 = `user`.id)";
                $shivaliq = mysql_query($shivali);
                $shiv = "UPDATE `user`
                SET `user`.relative_rank_author =
                (SELECT c2 as r FROM
                  ((SELECT userID as i2, COUNT(userID) as c2 FROM `author_likes` AS L2 WHERE author IN
                  ((SELECT author as b2 FROM `author_likes` WHERE UserID = (SELECT id FROM `user` WHERE loggedin = '1')))
                  GROUP BY userID) AS Y) WHERE i2 = `user`.id)";
                $shivq = mysql_query($shiv);
                $pat = "UPDATE `user`
                SET `user`.relative_rank_genre =
                (SELECT c2 as r FROM
                  ((SELECT userID as i2, COUNT(userID) as c2 FROM `genre_likes` AS L2 WHERE genre IN
                  ((SELECT genre as b2 FROM `genre_likes` WHERE UserID = (SELECT id FROM `user` WHERE loggedin = '1')))
                  GROUP BY userID) AS Y) WHERE i2 = `user`.id)";
                $patq = mysql_query($pat);
                $sam = "UPDATE `user`
                  SET `user`.relative_rank_total = `user`.relative_rank_book* 3 + `user`.relative_rank_author* 2 + `user`.relative_rank_genre";
                $samq = mysql_query($sam);

                $insert = "SELECT name FROM `user` AS A WHERE A.relative_rank_total <> 0
                AND (A.gpref in (SELECT `gender` FROM `user` WHERE loggedin='1'))
                AND (A.gender in (SELECT `gpref` FROM `user` WHERE loggedin='1'))
                AND A.id NOT IN (SELECT `id` FROM `user` WHERE loggedin='1')
                AND A.id NOT IN (SELECT UserID1 FROM `match` WHERE UserID2=(SELECT id FROM `user` WHERE loggedin = '1'))
                ORDER BY A.relative_rank_total DESC";
                $res=mysql_query($insert);

                while($row = mysql_fetch_array($res)) {
                  echo "<tr>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div>
          <br>
          <div class="panel panel-default">
              <h2 class="header">Check out a Potential Match:</h2>
          </div>
          <div class "interests" style="overflow-x:auto">
            <form action="viewOtherProfile.php" method="post" target="_blank" class="form-horizontal">
                <!-- this is actually books now lmao -->
                <input type="text" class="form-control" id="book_title" placeholder="Type the name of your prospective match from the above table ie 'Joe Jonas'." name="name" required>
                <br>
                <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>View Profile</button>
                <br>
            </form>
              <br>
          </div>
          <div class="panel panel-default">
              <h2 class="header">People You Bookmarked:<h2>
          </div>
          <div class "interests" style="overflow-x:auto">
            <table id="books" style="width:100%">
            <?php
              $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
              if (!$link) {
                die('Could not connect: ' . mysql_error());
              }
              $lmao = mysql_select_db('bookingup_bookingup', $link);
              $insert = "SELECT name FROM `user` AS A WHERE A.id IN
              (SELECT UserID1 FROM `match` WHERE UserID2=(SELECT id FROM `user` WHERE loggedin = '1'))";
              $res=mysql_query($insert);
              while($row = mysql_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "</tr>";
              }
            ?>
          </table>
        </div>
        <br>
        <div class="panel panel-default">
            <h2 class="header">People who Bookmarked You:<h2>
        </div>
        <div class "interests" style="overflow-x:auto">
          <table id="books" style="width:100%">
          <?php
            $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
            if (!$link) {
              die('Could not connect: ' . mysql_error());
            }
            $lmao = mysql_select_db('bookingup_bookingup', $link);
            $insert = "SELECT name FROM `user` AS A WHERE A.id IN
            (SELECT UserID2 FROM `match` WHERE UserID1=(SELECT id FROM `user` WHERE loggedin = '1'))";
            $res=mysql_query($insert);
            while($row = mysql_fetch_array($res)) {
              echo "<tr>";
              echo "<td>" . $row['name'] . "</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </div>
          <br>
          <!-- MY BOOK MATCHES -->
          <div class="panel panel-default">
              <h2 class="header">Book Recommendations Based on Bookmarks<h2>
          </div>
          <div class "interests" style="overflow-x:auto">
            <table id="books" style="width:100%">
            <?php
              $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
              if (!$link) {
                die('Could not connect: ' . mysql_error());
              }
              $lmao = mysql_select_db('bookingup_bookingup', $link);
              $insert = "SELECT `Likes`.BookTitle, `Likes`.Author FROM `Likes` INNER JOIN `match` ON `match`.UserID1 = `Likes`.UserID WHERE `match`.UserID2=(SELECT id FROM user WHERE loggedin='1')
                    AND `Likes`.BookTitle NOT IN (SELECT BookTitle FROM Likes WHERE UserID=(SELECT id FROM user WHERE loggedin='1'))";
              $res=mysql_query($insert);
              while($row = mysql_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['BookTitle'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "</tr>";
              }
            ?>
          </table>
        </div>
        <br>
          <!-- BOOKS -->
            <div class="panel panel-default">
                <h2 class="header">Bookmarked Books<h2>
            </div>
            <div class "interests" style="overflow-x:auto">
              <table id="books" style="width:100%">
              <?php
                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                if(isset($_POST['insert'])){
                  $message="The select function is called.";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);
                $insert = "SELECT `BookTitle`, `Author` FROM `Likes` as m WHERE m.`UserID` = (SELECT id FROM user WHERE loggedin='1')";
                $res=mysql_query($insert);
                while($row = mysql_fetch_array($res)) {
                  echo "<tr>";
                  echo "<td>" . $row['BookTitle'] . "</td>";
                  echo "<td>" . $row['Author'] . "</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div>
          <br>
          <!--<div class="panel panel-default">
              <h2 class="header">Unlike a Book</h2>
          </div>
          <div class "interests" style="overflow-x:auto">
            <form action="unlikeBook.php" method="post" target="_blank" class="form-horizontal">-->
                <!-- this is actually books now lmao -->
          <!--      <input type="text" class="form-control" id="book_title" placeholder="Enter a book title ie Animal Farm" name="title" required>
                <br>
                <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Unlike</button>
                <br>
            </form>
              <br>
          </div>-->
          <!-- AUTHORS -->
          <div class="panel panel-default">
              <h2 class="header">Bookmarked Authors<h2>
          </div>
          <div class "interests" style="overflow-x:auto">
            <table id="books" style="width:100%">
            <?php
              $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
              if (!$link) {
                die('Could not connect: ' . mysql_error());
              }
              $lmao = mysql_select_db('bookingup_bookingup', $link);
              $insert = "SELECT `author` FROM `author_likes` as m WHERE m.`UserID` = (SELECT id FROM user WHERE loggedin='1')";
              $res=mysql_query($insert);
              while($row = mysql_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['author'] . "</td>";
                echo "</tr>";
              }
            ?>
          </table>
        </div>
        <br>
        <!--
        <div class="panel panel-default">
            <h2 class="header">Unlike an Author</h2>
        </div>
        <div class "interests" style="overflow-x:auto">
          <form action="unlikeAuthor.php" method="post" target="_blank" class="form-horizontal"> -->
              <!-- this is actually books now lmao -->
        <!--      <input type="text" class="form-control" id="book_title" placeholder="Enter the name of an author ie John Steinbeck" name="title" required>
              <br>
              <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Unlike</button>
              <br>
          </form>
        </div>
        <br>-->
        <!-- GENRES -->
        <div class="panel panel-default">
            <h2 class="header">Bookmarked Genres<h2>
        </div>
        <div class "interests" style="overflow-x:auto">
          <table id="books" style="width:100%">
          <?php
            $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
            if (!$link) {
              die('Could not connect: ' . mysql_error());
            }
            $lmao = mysql_select_db('bookingup_bookingup', $link);
            $insert = "SELECT `genre` FROM `genre_likes` as m WHERE m.`UserID` = (SELECT id FROM user WHERE loggedin='1')";
            $res=mysql_query($insert);
            while($row = mysql_fetch_array($res)) {
              echo "<tr>";
              echo "<td>" . $row['genre'] . "</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </div>
      <br>
      <!--
      <div class="panel panel-default">
          <h2 class="header">Unlike a Genre</h2>
      </div>
      <div class "interests" style="overflow-x:auto">
        <form action="unlikeGenre.php" method="post" target="_blank" class="form-horizontal"> -->
            <!-- this is actually books now lmao -->
        <!--    <input type="text" class="form-control" id="book_title" placeholder="Enter a genre ie Classics" name="title" required>
            <br>
            <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Unlike</button>
            <br>
        </form>
      </div>
            <br> -->
          </div>
    </div>
</div>
