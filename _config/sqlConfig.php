<?php
define("HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "rangs_workshoop_rml");
$conn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);

/* check connection */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}


function getUserAccessRoleByID($id)
{
	global $conn;

	$query = "select user_role from tbl_user_role where  id = " . $id;

	$rs = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($rs);

	return $row['user_role'];
}
