<?php

function get_products_from_store($conn, $city){
	$sql = 'BEGIN :par := getProductsFromStore(:city); END;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);
	
	oci_bind_by_name($statement, ':par', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':city', $city);

	oci_execute($statement);
	oci_execute($result);


	oci_free_statement($statement);

	return $result;
}

function get_data_from_table($conn, $table){
	if($table == 'statistics'){
		$sql = 'BEGIN :res := getStatistics(); END;';
		$statement = oci_parse($conn, $sql);
		$result = oci_new_cursor($conn);

		oci_bind_by_name($statement, ':res', $result, -1, OCI_B_CURSOR);

		oci_execute($statement);
		oci_execute($result);

		oci_free_statement($statement);

		return $result;
	}else{
		$sql = 'select * from ' . $table . ' where rownum <= 50';
		$statement = oci_parse($conn, $sql);

		oci_execute($statement);

		return $statement;
	}	
}

function get_items($conn, $item){
	$sql = 'BEGIN :res := getItems(:item); END;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);

	oci_bind_by_name($statement, ':res', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':item', $item);

	oci_execute($statement);
	oci_execute($result);

	oci_free_statement($statement);

	return $result;
}

function get_stores($conn, $store){
	$sql = 'BEGIN :res := getStores(:store); END;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);

	oci_bind_by_name($statement, ':res', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':store', $store);

	oci_execute($statement);
	oci_execute($result);

	oci_free_statement($statement);

	return $result;
}

function get_info_item($conn, $id_item){
	$sql = 'select * from products where products.id_product = ' . $id_item;
	$statement = oci_parse($conn, $sql);

	oci_execute($statement);

	return $statement; 
}

function new_transaction($conn, $id_store, $id_product, $card_number, $qty){
	$sql = 'BEGIN :res := makeTransaction(:id_store, :id_product, :card_number, :qty); END;';
	$statement = oci_parse($conn, $sql);

	$result = "";
	oci_bind_by_name($statement, ':res', $result, 255);
	oci_bind_by_name($statement, ':id_store', $id_store);
	oci_bind_by_name($statement, ':id_product', $id_product);
	oci_bind_by_name($statement, ':card_number', $card_number);
	oci_bind_by_name($statement, ':qty', $qty);

	oci_execute($statement);

	return $result;
}

function get_store($conn, $id_store){
	$sql = 'select * from stores where stores.id_store = ' . $id_store;
	$statement = oci_parse($conn, $sql);

	oci_execute($statement);

	return $statement; 
}

function get_qty($conn, $id_store, $id_product){
	$sql = 'select * from stock where stock.id_store = ' . $id_store . ' and stock.id_product = ' . $id_product;
	$statement = oci_parse($conn, $sql);

	oci_execute($statement);

	return $statement; 
}

function insert_new_product($conn, $name, $category, $price, $store, $qty){
	$sql = 'BEGIN :res := insertNewProduct(:name, :category, :price, :store, :qty); END;';
	$statement = oci_parse($conn, $sql);

	$result = "";
	oci_bind_by_name($statement, ':res', $result, 255);
	oci_bind_by_name($statement, ':name', $name);
	oci_bind_by_name($statement, ':category', $category);
	oci_bind_by_name($statement, ':price', $price);
	oci_bind_by_name($statement, ':store', $store);
	oci_bind_by_name($statement, ':qty', $qty);

	oci_execute($statement);

	return $result;
}

function insert_new_store($conn, $city, $address){
	$sql = 'BEGIN :res := insertNewStore(:city, :address); END;';
	$statement = oci_parse($conn, $sql);

	$result = "";
	oci_bind_by_name($statement, ':res', $result, 255);
	oci_bind_by_name($statement, ':city', $city);
	oci_bind_by_name($statement, ':address', $address);

	oci_execute($statement);

	return $result;
}

function insert_new_customer($conn, $city, $card){
	$sql = 'BEGIN :res := insertNewCustomer(:city, :card); END;';

	$statement = oci_parse($conn, $sql);

	$result = "";
	oci_bind_by_name($statement, ':res', $result, 255);
	oci_bind_by_name($statement, ':city', $city);
	oci_bind_by_name($statement, ':card', $card);

	oci_execute($statement);

	return $result;
}

function insert_new_employee($conn, $fname, $lname, $position, $email, $address, $date){
	$sql = 'BEGIN :res := insertNewEmployee(:fname, :lname, :pos, :email, :address, :date); END;';

	$statement = oci_parse($conn, $sql);

	$result = "";

	oci_bind_by_name($statement, ':res', $result, 255);
	oci_bind_by_name($statement, ':fname', $fname);
	oci_bind_by_name($statement, ':lname', $lname);
	oci_bind_by_name($statement, ':pos', $position);
	oci_bind_by_name($statement, ':email', $email);
	oci_bind_by_name($statement, ':address', $address);
	oci_bind_by_name($statement, ':date', $date);

	oci_execute($statement);

	return $result;
}

function get_items_from_store($conn, $id_store){
	$sql = 'BEGIN :res := getItemsFromStore(:id_store); END;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);

	oci_bind_by_name($statement, ':res', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':id_store', $id_store);

	oci_execute($statement);
	oci_execute($result);

	oci_free_statement($statement);

	return $result;
}

function get_history($conn, $card){
	$sql = 'BEGIN :res := getHistoryOfCard(:card); END;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);

	oci_bind_by_name($statement, ':res', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':card', $card);

	oci_execute($statement);
	oci_execute($result);

	oci_free_statement($statement);

	return $result;
}

?>