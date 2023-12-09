<!DOCTYPE html>
<html>

<head>
  <!-- The beginning steps (header) of declaring a HTML/PHP website (Jacy) -->

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The title to the website that shows up on the navigation bar (Jacy) -->
    <title>Edu Planner</title>
    <!-- Links the CSS file to the PHP file (Jacy) -->
    <!-- COMMENTING THESE OUT FOR NOW, USING ORIGINAL CSS MADE FOR PAGE (Daniel) -->
    <!--<link rel="stylesheet" href="css/navbar.css">-->
    <!--<link rel="stylesheet" href="css/studentlogin.css">-->
    <link rel="stylesheet" href="about_us.css">
  </head>
  <!-- Body code for the structure of the website (Jacy) -->

<body style="">
  <?php require('./navbar.php'); ?>

  <div class="navbar"> <!-- Navigation bar at top of page -->
    <a href="../index.php">Back</a> <!-- Back button (ADD LINK TO GO BACK TO MAIN PAGE) -->
  </div>

  <h1>About us</h1>
  <h2>The Team</h2>
  <!-- Column cards to display pictures and bio of team -->
  <div class="row">
    <div class="column">
      <img src="danielamoruso.jpg" alt="Daniel">
      <h2>Daniel Amoruso</h2>
      <p class="title">Designer</p>
      <p>Data Schema Designer, HTML, CSS</p>
      <p>amorusod1@newpaltz.edu</p>
    </div>

    <div class="column">
      <img src="default_profile.png" alt="Max">
      <div class="container">
        <h2>Max Zedlovich</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
      </div>
    </div>

    <div class="column">
      <img src="angelflores.jpg" alt="Angel">
      <div class="container">
        <h2>Angel Flores</h2>
        <p class="title">Designer</p>
        <p> Database Management, Login Page, Class Construction, PHP</p>
        <p>floresa31@newpaltz.edu</p>
      </div>
    </div>

    <div class="column">
      <img src="jacylin.jpg" alt="Jacy">
      <div class="container">
        <h2>Jacy Lin</h2>
        <p class="title">Designer</p>
        <p>Group Leader, Gantt Chart Designer, HTML, PHP, Flowcharts</p>
        <p>linj41@newpaltz.edu</p>
      </div>
    </div>

    <div class="column">
      <img src="ramsesterry.png" alt="Max">
      <div class="container">
        <h2>Ramses Terry</h2>
        <p class="title">Designer</p>
        <p>CSS, HTML, PHP, Javascript, jQuery</p>
        <p>terryr3@newpaltz.edu</p>
      </div>
    </div>
  </div>

</body>

</html>