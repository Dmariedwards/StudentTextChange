<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Add New Item</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="resources/mysite.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>

	<div id="bodyBlock">
	<div class="upperleft">
      <form action="inventory.php">
        <button type="submit">Back</button>
      </form>
    </div>

    <div class="header">
      <h1>Add New Item</h1>
    </div>
	
	<?php
	//variables to hold all the data
		$itemName = '';
		$priceReq = '';
		$conditionInput = '';
		$descriptionInput = '';
		$categoryInput = '';
		$nameInput = '';
		$contactInput = '';
	
	
	
	?>
	
	
	<?php 
  
  // have we posted?
  $havePost = isset($_POST["save"]);
  
  if ($havePost) {
	
	$itemName = htmlspecialchars(trim($_POST["itemName"]));
	$priceReq = htmlspecialchars(trim($_POST["priceReq"]));
	$conditionInput = htmlspecialchars(trim($_POST["conditionInput"]));
	$descriptionInput = htmlspecialchars(trim($_POST["descriptionInput"]));
	$categoryInput = htmlspecialchars(trim($_POST["categoryInput"]));
	$nameInput = htmlspecialchars(trim($_POST["nameInput"]));
	$contactInput = htmlspecialchars(trim($_POST["contactInput"]));
	
	

	  
		$servername = "localhost";
		$username = "root";
		$password = "localhost";
		$dbname = "iit";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		//INSERT INTO inventory (item_id, item_name, item_condition, description, price, category, contact_info, full_name, username, date_added) 
		//VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', CURRENT_TIMESTAMP)
		$sql = "INSERT INTO inventory (item_name, item_condition, description, price, category, contact_info, full_name, username, date_added) 
		VALUES ('$itemName', '$conditionInput', '$descriptionInput', '$priceReq', '$categoryInput', '$contactInput', '$nameInput', '', CURRENT_TIMESTAMP)";
		//CURRENT_DATE()

		if ($conn->multi_query($sql) === TRUE) { $message = "New records created successfully";
			echo "<script type='text/javascript'>alert('$message');</script>"; } 
		else { echo "Error: " . $sql . "<br>" . $conn->error; }

		$conn->close();
		
		$itemName = '';
		$priceReq = '';
		$conditionInput = '';
		$descriptionInput = '';
		$categoryInput = '';
		$nameInput = '';
		$contactInput = '';
  }
?>
	
	
	
	<form id="postNewItem" name="postNewItem" method="post" action="newItem.php">
      <div class="middle_items">
        <h3><label class="field">Item Name:</label></h3>
        <div class="value"><input type="text" size="25" value="<?php echo $itemName;?>" name="itemName" id="itemName" required/></div>

        <h3><label class="field">Asking Price:</label></h3>
        <div class="value"><input type="text" size="25" value="<?php echo $priceReq;?>" name="priceReq" id="priceReq" required/></div>
		
		<h3><label class="field">Condition:</label></h3>
		<select class="selected" value="<?php echo $conditionInput;?>" name="conditionInput" id="conditionInput" required>
			<option value="" selected>None Selected...</option>
			<option value="Brand New">Brand New</option>
			<option value="Like New">Like New</option>
			<option value="Very Good">Very Good</option>
			<option value="Good">Good</option>
			<option value="Acceptable">Acceptable</option>
			<option value="poor">Poor</option>
		</select>
		

        <h3><label class="field">Description (<i>Not Required</i>):</label></h3>
        <div class="value"><input type="text" size="25" value="<?php echo $descriptionInput;?>" name="descriptionInput" id="descriptionInput" required/></div>
		
		<!--<h3><label class="field" for="comments">Description (<i>Not Required</i>):</label></h3>
        <div class="value"><textarea rows="4" cols="40" name="comments" id="comments"></textarea></div>-->
		
		
		
		<h3><label class="field">Category:</label></h3>
		<select class="selected" value="<?php echo $categoryInput;?>" name="categoryInput" id="categoryInput" required>
			<option value="" selected>None Selected...</option>
			<option value="textbook">Textbook</option>
			<option value="notes">Notes</option>
			<option value="school_supplies">School Supplies</option>
			<option value="Other">Other</option>
		</select>


        <h3><label class="field">Your Name:</label></h3>
        <div class="value"><input type="text" size="25" "<?php echo $nameInput;?>" name="nameInput" id="nameInput" required/></div>

        <h3><label class="field">Contact Information:</label></h3>
        <div class="value"><input type="text" size="25" value="<?php echo $contactInput;?>" name="contactInput" id="contactInput" required/></div>

        <br/>

        <!-- <button type="submit">Submit</button> -->
		<input type="submit" value="Submit" id="save" name="save"/>

      </div>

    </form>
	</div>

  </body>
</html>


