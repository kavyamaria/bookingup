<head>
  <link rel="stylesheet" type="text/css" href="createNewAccount.css">
  <script type="text/javascript" src="createNewAccount.js"></script>
</head>

<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form action "createNew.php" method="post" target="_blank" class="form-horizontal">
      <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
      <input type="text" class="form-control" id="password" placeholder="password" name="password">
      <button class="btn btn-primary" type="submit"><a id ="ugh" href="http://bookingup.web.engr.illinois.edu/newUser.html">Create Account</a></button>
      <p class="message">Already have an account? <a href="http://bookingup.web.engr.illinois.edu/index.html">Login</a></p>
    </form>
  </div>
</div>
