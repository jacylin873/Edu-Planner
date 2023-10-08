<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Page template By Adobe Dreamweaver</title>
<link href="css/aboutPageStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- Header content -->
<header>
  <div class="profileLogo"> 
    <!-- Profile logo. Add a img tag in place of <span>. -->
    <p class="logoPlaceholder"><!-- <img src="logoImage.png" alt="sample logo"> --><span>LOGO</span></p>
  </div>
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <img src="../AboutPageAssets/images/profilephoto.png" alt="sample"> </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1><?php  echo("Hello Class");   ?></h1>
    <h3>REALLY AWESOME WEB DESIGNER</h3>
    <hr>
    <p>
    <?php include("forms/add_inventory.php");  ?>
    
   </p>
  </section>
  <!-- Links to Social network accounts -->
  <aside class="socialNetworkNavBar">
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="../AboutPageAssets/images/social.png" alt="sample"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="../AboutPageAssets/images/social.png"  alt="sample"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="../AboutPageAssets/images/social.png"  alt="sample"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="../AboutPageAssets/images/social.png"  alt="sample"> </div>
  </aside>
</header>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Content Holder 1</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
      <p><span>Email :</span> johndoe@email.com</p>
      <p><span>Website :</span> johndoe.com</p>
      <p><span>Phone :</span> (123)456 - 789000</p>
      <p><span>Address :</span> Anytown, Anycountry</p>
    </div>
  </section>
  <!-- Previous experience details -->
  <section class="section2">
    <h2 class="sectionTitle">Content Holder 2</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <!-- First Title & company details  -->
    <article class="section2Content">
      <h2 class="sectionContentTitle">Title & Company</h2>
      <h3 class="sectionContentSubTitle">Position / Date - Year</h3>
      <p class="sectionContent"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p>
    </article>
    <!-- Second Title & company details  -->
    <article class="section2Content">
      <h2 class="sectionContentTitle"> Title & Company</h2>
      <h3 class="sectionContentSubTitle">Position / Date - Year</h3>
      <p class="sectionContent"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p>
    </article>
    <!-- Replicate the above Div block to add more title and company details --> 
  </section>
  <!-- Links to expore your past projects and download your CV -->
  <aside class="externalResourcesNav">
    <div class="externalResources"> <a href="#" title="Download CV Link">DOWNLOAD CV</a> </div>
    <span class="stretch"></span>
    <div class="externalResources"><a href="#" title="Behance Link">BEHANCE</a> </div>
    <span class="stretch"></span>
    <div class="externalResources"><a href="#" title="Github Link">GITHUB</a> </div>
  </aside>
</section>
<footer>
  <hr>
  <p class="footerDisclaimer">2020  Copyrights - <span>All Rights Reserved</span></p>
  <p class="footerNote">John Doe - <span>Email me</span></p>
</footer>
</body>
</html>
