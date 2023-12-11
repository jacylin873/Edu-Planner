<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY New Paltz</title>
      <link rel="stylesheet" href="css/navbar.css">
      <link rel="stylesheet" href="css/majors.css">
   </head>
   <body>
    
   <?php require('./navbar.php'); ?>
  <div id="Majors-Div">
    <video class= "majors-vid" autoplay muted loop >
        <source src="./img/npmajor_vid_1.mp4" type="video/mp4">
        <source src="./img/npmajor_vid_1.webm" type="video/webm">
        <img src="./img/npmajor.png" alt="Fallback Image">
      </video>
      <h1 class="major_title">The Majors & Minors Offered at New Paltz</h1>
      <p class="major_description">SUNY New Paltz stands out as a vibrant institution known for its diverse and extensive academic offerings. With a commitment to providing students with a well-rounded education, the university excels in offering an impressive array of majors and minors across various disciplines. Whether you're passionate about the arts, sciences, humanities, or beyond, SUNY New Paltz empowers students to explore their interests and passions through a multitude of programs. This rich academic diversity ensures that every student can find their unique path, nurturing their intellectual growth and enabling them to pursue their educational and career aspirations with enthusiasm and confidence.</p>
    <div class="center-container">
        <div class="side-by-side">
            <ul class="list" id="majors-list">
                <h2>Majors</h2>
                <?php
                include("classes/majorMinorClass.php");
                $majorMinor = new MajorMinor();
                $majorMinor->print_Majors();
                ?>

                <h2>Interdisciplinary Majors</h2>
                <?php $majorMinor->print_Interdisciplinary_Majors(); ?>
            </ul>
            <ul class="list">
                <h2>Minors</h2>
                <?php $majorMinor->print_Minors(); ?>
                <li>&nbsp;</li>

                <h2>Interdisciplinary Minors</h2>
                <?php $majorMinor->print_Interdisciplinary_Minors(); ?>
                <br>
            </ul>
        </div>
    </div>
  </div>

    <script src="navbar.js"></script>
   </body>

</html>