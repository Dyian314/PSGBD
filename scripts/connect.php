<?php

function connect(){
	$DB = '//localhost:1521/XE';
	$DB_USER = 'STUDENT';
	$DB_PASS = 'STUDENT';

	$conn = oci_connect($DB_USER, $DB_PASS, $DB);
	if(!$conn){
		$err = oci_error();
		echo $err;
	}

	return $conn;

	/*$sql = 'begin :par := getProductsFromStore(:city); end;';
	$statement = oci_parse($conn, $sql);
	$result = oci_new_cursor($conn);
	$city = 'Geneva';

	oci_bind_by_name($statement, ':par', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($statement, ':city', $city);

	oci_execute($statement);
	oci_execute($result);

	while(($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
		echo nl2br(json_encode($row, JSON_PRETTY_PRINT) . ",\r\n");	
	}*/
}


?>