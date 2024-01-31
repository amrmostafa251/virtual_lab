<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="homepage.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

  <div class="topnav">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <div class="dropdown">
      <button class="dropbtn" onclick="myFunction()">Experiments
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content" id="mydropdown">
        <a href="#">FM Modulation</a>
        <a href="file:///I:/Shrouk/project/Am/am.html">AM Modulation</a>
        <a href="#">OFDM</a>
      </div>
    </div>
  </div>
    <div class="welcome">
      <p>Communication Labratory</p>
    </div>
    <br>
    <div>
      <form action="login.php" method="post">
        <label for="email"><b>Email</b></label><br>
        <input type="email" placeholder="Enter Email" name="email" required>
        <br><br>
        <label for="password"><b>password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>
        <br>
        <div class="button">
        <input type="submit" name="submit" value="SIGN IN">
          </div>
      </form>
    </div>
  </body>
  </html>