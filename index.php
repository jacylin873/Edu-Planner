<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY New Paltz</title>
      <link rel="stylesheet" href="css/navbar.css">
      <link rel="stylesheet" href="css/home.css">

   </head>
   <body>
    
   <nav id="topnav">
        <div class="wrap-nav">
        <div class="image-container">
            <a id="home" class="nav-img" href="./index.php"><img class= "nav-img" src="./img/newpaltzlogo.jpg" alt="Home"></a>
            <div class="alt-text">Home</div>
          </div>
        <a id="majors" class="nav-link" href="./majors.php">Majors</a>
        <a id="apply" class="nav-link apply-big" href="./apply.php">Apply</a>

        <a id="login" class="nav-link login-big" href="./login.php">Login</a>
        <a id="staff" class="nav-link staff-big" href="./staff.php">Staff</a>
        <div class="dropdown">
            <button class="dropbtn" onmouseover="showDropDown()" >Dropdown
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" onmouseout="hideDropDown()" id="myDropdown" >
                <div class="apply-small">
                    <a id="apply-small-a" class="nav-link" href="./apply.php">Apply</a>
                </div>
                <div class="login-small">
                    <a id="login-small-a" class="nav-link" href="./studentlogin.php">Login</a>
                </div>
                <div class="staff-small">
                    <a id="staff-small-a" class="nav-link" href="./staff.php">Staff</a>
                </div>

            </div>
            </div>
        </div>
      </nav>
    
      
  <div id="Home-Div">
    <div class="home-bg-img-div">
        <img src="./img/nplandscape_1.png" alt="New Paltz Landscape" style="width:100%;">
        <div class="home-bg-img-centered">
          <h1 id="home-img-txt-h1">SUNY New Paltz</h1>
              <h2 id="home-img-txt-h2">Home of the Hawks</h2>
        </div>
      </div>
      <h1 class="content">Home Page</h1>
          <h2>Make dropdown prettier</h2>
          <p>Some generic content and images about SUNY New Paltz</p>      
    
  </div>
    


    <script src="navbar.js"></script>
   </body>

</html>