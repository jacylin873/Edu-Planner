<?php

if(isset($_GET['submit'])){
    //$petclass = $_GET['petType'];
   //$petbreed = $_GET['breed'];
}

?>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	Pet Type:  <?php include 'get_data.php'; ?>     
   
   <?php 
	if(isset($_GET['submit'])){
		$petclass = $_GET['petType'];
		echo ("Pet Breed:  ");
		include 'get_breed.php'; 
		echo ("<br><br>");
	}
?>

	
	
   <?php 
	//if(isset($_GET['submit'])){
		//$petbreed = $_GET['breed'];
		include 'getpets.php'; 
	//}
?>	
	<br>
	<input type="submit" name="submit" value="Submit Form"><br>

</form>
