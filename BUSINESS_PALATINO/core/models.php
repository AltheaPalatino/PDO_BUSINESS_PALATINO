<?php  

function insertStore($pdo, $store_name, $locations, $contact_name) {

	$sql = "INSERT INTO stores (store_name, locations, contact_name) 
			VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$store_name, $locations, $contact_name]);

	if ($executeQuery) {
		return true;
	}
}

function updateStore($pdo, $store_name, $locations, $contact_name, $store_id) {

	$sql = "UPDATE stores
				SET store_name = ?,
					locations = ?,
					contact_name = ?
				WHERE store_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$store_name, $locations, $contact_name, $store_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteStore($pdo, $store_id) {
	$sql = "DELETE FROM stores WHERE store_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$store_id]);

	if ($executeQuery) {
		return true;
	}
}

function getAllStore($pdo) {
	$sql = "SELECT * FROM stores";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function getAllCustomersByStoreID($pdo, $store_id) {
    $sql = "SELECT * FROM customers WHERE store_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$store_id]);

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
    return []; 
}

function getStoreInfoByID($pdo, $store_id) {
    $sql = "SELECT * FROM stores WHERE store_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$store_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }

}

function getCustomersByStore($pdo, $store_id) {
    // Prepare the SQL statement
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE store_id = :store_id");
    
    // Bind the store_id parameter
    $stmt->bindParam(':store_id', $store_id, PDO::PARAM_INT);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch all customers for the given store ID
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertCustomer($pdo, $customer_firstname, $customer_lastname, $email, $phone_number, $store_id) {
	$sql = "INSERT INTO customers (customer_firstname, customer_lastname, email, phone_number, store_id) 
			VALUES (?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_firstname, $customer_lastname, $email, $phone_number, $store_id]);

	if ($executeQuery) {
		return true;
	}
}

function updateCustomer($pdo, $customer_firstname, $customer_lastname, $email, $phone_number, $store_id, $customer_id) {
	$sql = "UPDATE customers
			SET customer_firstname = ?,
				customer_lastname = ?,
				email = ?,
				phone_number = ?,
				store_id = ?
			WHERE customer_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_firstname, $customer_lastname, $email, $phone_number, $store_id, $customer_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteCustomer($pdo, $customer_id) {
    // Ensure only the specific customer is deleted
    $sql = "DELETE FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$customer_id]);

    if ($executeQuery) {
        return true;
    }
    return false;
}


function getAllCustomers($pdo) {
	$sql = "SELECT * FROM customers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getCustomerByID($pdo, $customer_id) {
	$sql = "SELECT * FROM customers WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

?>