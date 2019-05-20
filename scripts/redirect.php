<?php

if(isset($_POST['option'])){
	$option = $_POST['option'];

	if($_POST['searchbar'] === '' and $_POST['option'] !== 'other'){
		header('Location: ' . '../pages/index.html');
		die();
	}else{
		$value = $_POST['searchbar'];

		if($option == 'other'){
			header('Location: ' . '../pages/tables.html');
		}else if($option == 'store'){
			header('Location: ' . '../pages/stores.html?search=' . $value);
		}else if($option == 'product'){
			header('Location: ' . '../pages/locations.html?search=' . $value);
		}
	}

	
}

?>