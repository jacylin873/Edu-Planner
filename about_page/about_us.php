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
      <link rel="stylesheet" href="css/navbar.css">
      <link rel="stylesheet" href="css/studentlogin.css">
   </head>
   <!-- Body code for the structure of the website (Jacy) -->
   <body style="">
   <?php require('./navbar.php'); ?>

<h1>About us</h1>
<h2>The Team</h2>
<!-- Column cards to display pictures and bio of team -->
<div class="row">
    <div class="column">
      <div class="card">
        <img src="default_profile.png" alt="Daniel" style="width:100%">
        <div class="container">
          <h2>Daniel Amoruso</h2>
          <p class="title">Data Schema Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>amorusod1@newpaltz.edu</p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="default_profile.png" alt="Max" style="width:100%">
        <div class="container">
          <h2>Max Zedlovich</h2>
          <p class="title">Art Director</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>mike@example.com</p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="default_profile.png" alt="Angel" style="width:100%">
        <div class="container">
          <h2>Angel Flores</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>john@example.com</p>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="default_profile.png" alt="Max" style="width:100%">
      <div class="container">
        <h2>Jacy Lin</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="default_profile.png" alt="Max" style="width:100%">
      <div class="container">
        <h2>Ramses</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
      </div>
    </div>
  </div>

</body>
</html>