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
	$sql = 'select * from ' . $table . ' where rownum <= 50';
	$statement = oci_parse($conn, $sql);

	oci_execute($statement);

	return $statement;
}

function get_stores($conn, $item){
	$sql = 'BEGIN :res := getStores(:item); END;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);

	oci_bind_by_name($statement, ':res', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':item', $item);

	oci_execute($statement);
	oci_execute($result);

	oci_free_statement($statement);

	return $result;
}

?>