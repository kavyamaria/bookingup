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
                              $insert = "SELECT * FROM user WHERE viewing='1'";
                              #$insert = "SELECT * FROM user WHERE id=1";
                              $res=mysql_query($insert);
                              while($row = mysql_fetch_array($res)) {
                              echo "<h2><strong>" . $row['name'] . "</h2></strong></td>";
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
                              <form action="acceptmatch.php">
                                <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Bookmark</button>
                              </form>
                            </span>
                            <form action="stopviewing.php" method="post" target="_blank" class="form-horizontal">
                                <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Turn the Page</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <!-- BOOKS -->
            <div class="panel panel-default">
                <h2 class="header">Their Liked Books<h2>
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
                $insert = "SELECT `BookTitle`, `Author` FROM `Likes` as m WHERE m.`UserID` = (SELECT id FROM user WHERE viewing='1')";
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
          <!-- AUTHORS -->
          <div class="panel panel-default">
              <h2 class="header">Their Liked Authors<h2>
          </div>
          <div class "interests" style="overflow-x:auto">
            <table id="books" style="width:100%">
            <?php
              $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
              if (!$link) {
                die('Could not connect: ' . mysql_error());
              }
              $lmao = mysql_select_db('bookingup_bookingup', $link);
              $insert = "SELECT * FROM `author_likes` as m WHERE m.`UserID` = (SELECT id FROM user WHERE viewing='1')";
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
        <!-- GENRES -->
        <div class="panel panel-default">
            <h2 class="header">Their Liked Genres<h2>
        </div>
        <div class "interests" style="overflow-x:auto">
          <table id="books" style="width:100%">
          <?php
            $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
            if (!$link) {
              die('Could not connect: ' . mysql_error());
            }
            $lmao = mysql_select_db('bookingup_bookingup', $link);
            $insert = "SELECT * FROM `genre_likes` as m WHERE m.`UserID` = (SELECT id FROM user WHERE viewing='1')";
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
            <br>
          </div>
    </div>
</div>
