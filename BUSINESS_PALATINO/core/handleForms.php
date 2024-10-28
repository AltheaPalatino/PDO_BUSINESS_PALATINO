<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

// Inserting a new store
if (isset($_POST['insertStoreBtn'])) {
	$query = insertStore($pdo, $_POST['store_name'], $_POST['locations'], 
		$_POST['contact_name']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editStoreBtn'])) {
	$query = updateStore($pdo, $_POST['store_name'], $_POST['locations'], 
		$_POST['contact_name'], $_GET['store_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Edit failed";
	}
}

// Deleting a store
if (isset($_POST['deleteStoreBtn'])) {
	$query = deleteStore($pdo, $_GET['store_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}

// Inserting a new customer
if (isset($_POST['insertCustomerBtn'])) {
	$query = insertCustomer($pdo, $_POST['customer_firstname'], $_POST['customer_lastname'], 
		$_POST['email'], $_POST['phone_number'], $_GET['store_id']);

	if ($query) {
		header("Location: ../viewcustomers.php?store_id=" . $_GET['store_id']);
	} else {
		echo "Insertion failed";
	}
}

// Editing an existing customer
if (isset($_POST['editCustomerBtn'])) {
	$query = updateCustomer($pdo, $_POST['customer_firstname'], $_POST['customer_lastname'], 
		$_POST['email'], $_POST['phone_number'], $_GET['store_id'], $_GET['customer_id']); 

	if ($query) {
		header("Location: ../viewcustomers.php?store_id=" . $_GET['store_id']);
	} else {
		echo "Update failed";
	}
}

// Deleting a customer
if (isset($_POST['deleteCustomerBtn'])) {
	$query = deleteCustomer($pdo, $_GET['customer_id']);

	if ($query) {
		header("Location: ../viewcustomers.php?store_id=" . $_GET['store_id']);
	} else {
		echo "Deletion failed";
	}
}

?>
