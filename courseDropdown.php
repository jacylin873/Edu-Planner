<?php 
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    

    if ($user_array['clearance'] == (0) | $user_array['clearance'] == (1) | $user_array['clearance'] == (2)  )  {
        
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="">
   </head>
   <body>
   <div class="input-box">
            <span class="user-input" style="display: inline; float: none;">Course</span>
            <select id="course" name="course" class="courses">
                <option value="" selected>Select a subject</option>
                <option value="ANT">ANT - Anthropology</option>
                <option value="ARE">ARE - Art Education</option>
                <option value="ARH">ARH - Art History</option>
                <option value="ARS">ARS - Art Studio</option>
                <option value="ASN">ASN - Asian Studies</option>
                <option value="BCM">BCM - Biochemistry</option>
                <option value="BGS">BGS - General Studies</option>
                <option value="BIO">BIO - Biology</option>
                <option value="BLK">BLK - Black Studies</option>
                <option value="BUS">BUS - Business Administration</option>
                <option value="CHE">CHE - Chemistry</option>
                <option value="CHI">CHI - Chinese</option>
                <option value="CMD">CMD - Communication Disorders</option>
                <option value="CMM">CMM - Communication Studies</option>
                <option value="COU">COU - Counselor Education</option>
                <option value="CPS">CPS - Computer Science</option>
                <option value="DDF">DDF - Digital Design and Fabrication</option>
                <option value="DIS">DIS - Disaster Studies</option>
                <option value="DMJ">DMJ - Digital Media and Journalism</option>
                <option value="ECO">ECO - Economics</option>
                <option value="EDA">EDA - Educational Administration</option>
                <option value="EDI">EDI - Education Interdisciplinary</option>
                <option value="EDS">EDS - Educational Studies</option>
                <option value="EED">EED - Early Childhood/Childhood Educ</option>
                <option value="EGC">EGC - Engineering-Computer</option>
                <option value="EGE">EGE - Engineering-Electrical</option>
                <option value="EGG">EGG - Engineering-General</option>
                <option value="EGM">EGM - Engineering-Mechanical</option>
                <option value="EGS">EGS - Environmental Science</option>
                <option value="ENG">ENG - English</option>
                <option value="EVO">EVO - Evolutionary Studies</option>
                <option value="FRN">FRN - French</option>
                <option value="GEO">GEO - Geography</option>
                <option value="GER">GER - German</option>
                <option value="GLG">GLG - Geology</option>
                <option value="HEB">HEB - Hebrew</option>
                <option value="HIS">HIS - History</option>
                <option value="HON">HON - Honors</option>
                <option value="INT">INT - Interdisciplinary</option>
                <option value="ITA">ITA - Italian</option>
                <option value="JPN">JPN - Japanese</option>
                <option value="JST">JST - Jewish Studies</option>
                <option value="KIS">KIS - Kiswahili</option>
                <option value="LAM">LAM - Latin Amer & Caribbean Studies</option>
                <option value="LED">LED - Literacy Education</option>
                <option value="LIN">LIN - Linguistics</option>
                <option value="LLC">LLC - Lang, Lit & Cultures</option>
                <option value="MAT">MAT - Mathematics</option>
                <option value="MUS">MUS - Music</option>
                <option value="PHI">PHI - Philosophy</option>
                <option value="PHY">PHY - Physics</option>
                <option value="POL">POL - Political Science</option>
                <option value="PSY">PSY - Psychology</option>
                <option value="REL">REL - Religious Studies</option>
                <option value="RUS">RUS - Russian</option>
                <option value="SAB">SAB - Study Abroad</option>
                <option value="SED">SED - Adolescence Education</option>
                <option value="SOC">SOC - Sociology</option>
                <option value="SPA">SPA - Spanish</option>
                <option value="SPE">SPE - Special Education</option>
                <option value="THE">THE - Theater Arts</option>
                <option value="WOM">WOM - Women's, Gender, & Sexuality St</option>
            </select>
        </div>
    </body>
        </html>
        <?php 
    }
}
else{
    header("Location: ../login.php");
    exit();
}
?>