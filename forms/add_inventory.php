<?php

if(isset($_POST['submit'])){
		//$petclass = $_GET['petType'];
		//$petbreed = $_GET['breed'];
		
	//Load connecter
	include_once('includes/connect.php');

	//Setup query

	$query = "INSERT INTO `inventory_item` (`VID`, `item_name`, `item_description`, `item_image_path`, `item_ssn`, `item_model`, `item_purchase_date`)
				VALUES ('".$_POST['v']."', '".$_POST['t']."', '".$_POST['de']."', '".$_POST['p']."', '".$_POST['c']."', '".$_POST['b']."', '".$_POST['d']."')";




	if ($dbconn->query($query) === TRUE) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $query . "<br>" . $dbconn->error;
	}


	//Fetch the results
	//$result = mysqli_query($dbconn, $query)
	//	or die("Couldn't execute query.");


}

else{
?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	<label for="v">VID</label><br>
		<select name="v" id="v">
		<option value="">Select Vendor</option>
		  <option value="1">Vendor 1</option>
		  <option value="2">Vendor 2</option>
		  <option value="3">Vendor 3</option>
		  <option value="4">Vendor 4</option>
		</select><br><br>
	
	
	
	<label for="t">Name</label><br>
	<input name="t" id="n"  type="text"><br><br>
	<label for="p">Image</label><br>
	<input name="p" id="p" type="text"><br><br>
	<label for="c">SSN</label><br>
	<input name="c" id="c" type="text"><br><br>
	<label for="b">Model</label><br>
	<input name="b" id="b" type="text"><br><br>
	<label for="d">Date</label><br>
	<input name="d" id="d" type="text"><br><br>

	<br>
	<label for="de">Description</label><br>
	<textarea name="de" id="de" rows="10" cols="30">
	Descride Item...
	</textarea>

		<br>
		<input type="submit" name="submit" value="Submit Form"><br>

	</form>
<?php
}
?>