CREATE TABLE stores (
    store_id INT AUTO_INCREMENT PRIMARY KEY,
    store_name VARCHAR (50),
    locations VARCHAR (50),
    contact_name VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_firstname VARCHAR (50),
    customer_lastname VARCHAR (50),
    email VARCHAR (50),
    phone_number VARCHAR (50),
    store_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);