<?php

include '../scripts/connect.php';
include '../scripts/execute_query.php';

function products_divs(){
?>
	<p>Name</p><input type="text" name="Name" class="inp" placeholder="Name of product" required>
	<p>Category</p><input type="text" name="Category" class="inp" placeholder="Category" required>
	<p>Price</p><input type="text" name="Price" class="inp" placeholder="Price" required>
	<p>Store</p><input type="text" name="Store" class="inp" placeholder="Store" required>
	<p>Quantity</p><input type="text" name="Qty" class="inp" placeholder="Quantity" required>
	<div class="buttons">
		<input type="submit" name="insert" class="inp-button" value="Insert">
		<!--<input type="submit" name="remove" class="inp-button" value="Remove">-->
	</div>
<?php
	if(isset($_POST['Name'])){
		$conn = connect();

		$result = insert_new_product($conn, $_POST['Name'], $_POST['Category'], 
			$_POST['Price'], $_POST['Store'], $_POST['Qty']);

		return $result;
	}
}

function stores_divs(){
?>
	<p>City</p><input type="text" name="City" class="inp" placeholder="City" required>
	<p>Address</p><input type="text" name="Address" class="inp" placeholder="Address" required>
	<div class="buttons">
		<input type="submit" name="insert" class="inp-button" value="Insert">
		<!--<input type="submit" name="remove" class="inp-button" value="Remove">-->
	</div>

<?php

	if(isset($_POST['City'])){
		$conn = connect();
		$result = insert_new_store($conn, $_POST['City'], $_POST['Address']);

		return $result;
	}

}

function customers_divs(){
?>
	
	<p>Address</p><input type="text" name="Address" class="inp" placeholder="Address" required>
	<p>Card Number</p><input type="text" name="Card" class="inp" placeholder="Card Number" required>
	<div class="buttons">
		<input type="submit" name="insert" class="inp-button" value="Insert">
		<!--<input type="submit" name="remove" class="inp-button" value="Remove">-->
	</div>

<?php

	if(isset($_POST['Address'])){
		$conn = connect();
		$result = insert_new_customer($conn, $_POST['Address'], $_POST['Card']);

		return $result;
	}

}

function employees_divs(){
?>
	<p>First Name</p><input type="text" name="fname" class="inp" placeholder="First Name" required>
	<p>Last Name</p><input type="text" name="lname" class="inp" placeholder="Last Name" required>
	<p>Position</p><input type="text" name="position" class="inp" placeholder="Position" required>
	<p>Email</p><input type="text" name="email" class="inp" placeholder="Email" required>
	<p>Address</p><input type="text" name="address" class="inp" placeholder="Address" required>
	<p>Date of birth</p><input type="text" name="date_birth" class="inp" placeholder="Date of Birth" required>
	<div class="buttons">
		<input type="submit" name="insert" class="inp-button" value="Insert">
		<!--<input type="submit" name="remove" class="inp-button" value="Remove">-->
	</div>
<?php

	if(isset($_POST['fname'])){
		$conn = connect();
		$result = insert_new_employee($conn, $_POST['fname'], $_POST['lname'], $_POST['position'], 
			$_POST['email'], $_POST['address'], $_POST['date_birth']);

		return $result;
	}

}


?>