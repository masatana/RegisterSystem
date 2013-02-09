<?php
session_start();
echo $_POST["delete"];
if (isset($_POST['delete'])) {
	$del = $_POST["delete"];
	header("Location: ./delete.php?$del");
}

?>