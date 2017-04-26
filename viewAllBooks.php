<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="displayCSS.css">
<link rel="stylesheet" type="text/css" href="profilePage.css">
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
                              }
                            ?>
                            <a href= "http://bookingup.web.engr.illinois.edu/profilePage.php"><button class="btn btn-primary"><i aria-hidden="true"></i>Return to Profile</button></a>
                            <br>
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
                <h2 class="header">View All Books</h2>
            </div>
            <div class "interests" style="overflow-x:auto">
              <table id="books" style="width:100%">
              <?php
                $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                if (!$link) {
                  die('Could not connect: ' . mysql_error());
                }
                $lmao = mysql_select_db('bookingup_bookingup', $link);
                $insert = "SELECT * FROM `book_author`";
                $res=mysql_query($insert);
                while($row = mysql_fetch_array($res)) {
                  echo "<tr>";
                  echo "<td>" . $row['book_title'] . "</td>";
                  echo "<td>" . $row['author'] . "</td>";
                  if ($row['classics'] == '1') {
                    echo "<td>Classic</td>";
                  } else { echo "<td></td>"; }
                  if ($row['fantasy_scifi'] == '1') {
                    echo "<td>Fantasy/SciFi</td>";
                  } else { echo "<td></td>"; }
                  if ($row['historical_fiction'] == '1') {
                    echo "<td>Historical Fiction</td>";
                  } else { echo "<td></td>"; }
                  if ($row['romance'] == '1') {
                    echo "<td>Romance</td>";
                  } else { echo "<td></td>"; }
                  if ($row['horror'] == '1') {
                    echo "<td>Horror</td>";
                  } else { echo "<td></td>"; }
                  if ($row['nonfiction'] == '1') {
                    echo "<td>Nonfiction</td>";
                  } else { echo "<td></td>"; }
                  echo "</tr>";
                }
              ?>
            </table>
          </div>
            <br>
        </div>
    </div>
  </div>
