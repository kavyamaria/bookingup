<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">-->
<link rel="stylesheet" href="mainCSS.css">
</head>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $link = mysql_connect('webhost.engr.illinois.edu', 'bookingup_project', 'cs411!');
                    if (!$link) {
                      die('Could not connect: ' . mysql_error());
                    }
                    $lmao = mysql_select_db('bookingup_bookingup', $link);
                    $insert = "SELECT * FROM user WHERE loggedin='1'";
                    $res=mysql_query($insert);
                    while($row = mysql_fetch_array($res)) {
                      echo '<h1 class="panel-title pull-left" style="font-size:30px;">Update Profile: ' . $row['name'] . '</h1>';
                    }
                  ?>
                </div>
            </div>
            <!--
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Choose a Photo</h3>
                    <br><br>
                    <div align="center">
                        <div class="col-lg-12 col-md-12">
                            <img class="img-thumbnail img-responsive" src="https://img.buzzfeed.com/buzzfeed-static/static/2015-09/14/11/enhanced/webdr06/anigif_original-32634-1442246101-4.gif" width="300px" height="300px">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <button class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload a new profile photo!</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Description</h3>
                    <br><br>
                    <form action="updateBio.php" method="post" target="_blank" class="form-horizontal">
                        <label>Bio:</label>
                        <input type="text" id="q" class="form-control" placeholder="Enter a Bio." name="q" required >
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Update Bio</button>
                        <br>
                    </form>
                    <br><br>
                    <!--<form class="form-horizontal">-->
                        <!-- this is actually gender now lmao -->
                        <form action="updateGender.php" method="post" target="_blank" class="form-horizontal">
                        <label for="Your_location">I am a:</label>
                        <input type="text" class="form-control" id="gender" placeholder="Type 'f' or 'm' exactly." name="gender" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Update Gender</button>
                        </form>
                        <br>
                        <br>
                        <!-- this is actually preference now lmao -->
                        <form action="updatePref.php" method="post" target="_blank" class="form-horizontal">
                        <label for="Your_gender">I prefer:</label>
                        <input type="text" class="form-control" id="pref" placeholder="Enter 'f' or 'm' exactly." name="pref" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Update Preference</button>
                        </form>
                        <br>
                    <!--</form>-->
                </div>
                <br>
            </div>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Add Interests to your Profile</h3>
                    <br><br>
                    <form action="addBookInterests.php" method="post" target="_blank" class="form-horizontal">
                        <!-- this is actually books now lmao -->
                        <label for="Your_location">Book:</label>
                        <input type="text" class="form-control" id="book_title" placeholder="Enter a book title ie Animal Farm" name="title" required>
                        <input type="text" class="form-control" id="book_author" placeholder="Enter the book title's author ie George Orwell" name="author">
                        <br>
                        <!-- this is actually authors now lmao -->
                        <!--
                        <label for="Your_gender">Authors I Like:</label>
                        <input type="text" class="form-control" id="Your_gender" placeholder="Enter an author ie J.K. Rowling">
                        <br> -->
                        <!-- onclick="insertbooks(book_title, book_author)" -->
                        <!-- this is actually genres -->
                        <!--
                        <label for="Your_gender">Genres I Like:</label>
                        <input type="text" class="form-control" id="Your_gender" placeholder="Enter a genre ie romance">
                      -->
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Like Book</button>
                        <br>
                    </form>
                    <form action="addAuthorInterests.php" method="post" target="_blank" class="form-horizontal">
                        <!-- this is actually books now lmao -->
                        <label for="Your_location">Author:</label>
                        <input type="text" class="form-control" id="book_title" placeholder="Enter the name of an author ie John Steinbeck" name="title" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Like Author</button>
                        <br>
                    </form>
                    <form action="addGenreInterests.php" method="post" target="_blank" class="form-horizontal">
                        <!-- this is actually books now lmao -->
                        <label for="Your_location">Genre:</label>
                        <input type="text" class="form-control" id="book_title" placeholder="Enter the name of a genre ie Classics" name="title" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Like Genre</button>
                        <br>
                    </form>
                    <br>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Remove an Interest from your Profile</h3>
                    <br><br>
                    <form action="unlikeBook.php" method="post" target="_blank" class="form-horizontal">
                        <!-- this is actually books now lmao -->
                        <label for="Your_location">Book:</label>
                        <input type="text" class="form-control" id="book_title" placeholder="Enter a book title ie Animal Farm" name="title" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Unike Book</button>
                        <br>
                    </form>
                    <form action="unlikeAuthor.php" method="post" target="_blank" class="form-horizontal">
                        <!-- this is actually books now lmao -->
                        <label for="Your_location">Author:</label>
                        <input type="text" class="form-control" id="book_title" placeholder="Enter the name of an author ie John Steinbeck" name="title" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Unlike Author</button>
                        <br>
                    </form>
                    <form action="unlikeGenre.php" method="post" target="_blank" class="form-horizontal">
                        <!-- this is actually books now lmao -->
                        <label for="Your_location">Genre:</label>
                        <input type="text" class="form-control" id="book_title" placeholder="Enter the name of a genre ie Classics" name="title" required>
                        <br>
                        <button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Unlike Genre</button>
                        <br>
                    </form>
                    <br>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                  <a href="http://bookingup.web.engr.illinois.edu/profilePage.php"><button class="btn btn-primary" type="submit" background-color: #ffff34><i class="fa fa-fw fa-check" aria-hidden="true"></i>Return to Profile</button></a>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
