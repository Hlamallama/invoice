CREATE TABLE customer (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    street_address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    contact_number VARCHAR(15) NOT NULL,
    contact_city VARCHAR(255) NOT NULL,
    contact_address VARCHAR(255) NOT NULL,
    created TIMESTAMP,
    modified TIMESTAMP
);


INSERT INTO customer (
    name, 
    email, 
    phone_number, 
    street_address, 
    city, 
    contact, 
    contact_number,
    contact_city,
    contact_address)
VALUES (
    'Company One',
    'companyone@gmail.com',
    '0731051452', 
    '42 Harley Stureet', 
    'Johanesburg', 
    'Hlami', 
    '0731051452',
    'Johanessburg',
    '42 Harley Stureet'
    );
    
   
   
CREATE TABLE product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    is_taxed BOOLEAN DEFAULT FALSE,
    created TIMESTAMP
);


INSERT INTO product (
    name,
    price,
    is_taxed)
VALUES (
    'Banana',
    '10.00',
    FALSE
    );

INSERT INTO product (
    name,
    price,
    is_taxed)
VALUES (
    'Apple',
    '15.00',
    FALSE
    );

INSERT INTO product (
    name,
    price,
    is_taxed)
VALUES (
    'Eggs',
    '30.00',
    True
    );




CREATE TABLE invoice (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id INT UNSIGNED,
    created TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(id)
);

INSERT INTO invoice (
    customer_id,
    created
)
VALUES (
    1,
    now()
    );



CREATE TABLE invoice_item (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT UNSIGNED,
    product_id INT UNSIGNED,
    qty INT NOT NULL,
    created TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES product(id)
);

INSERT INTO invoice_item (
    invoice_id, 
    product_id, 
    qty,
    created)
VALUES (
    1,
    1,
    1,
    now()
    );

INSERT INTO invoice_item (
    invoice_id, 
    product_id, 
    qty,
    created)
VALUES (
    1,
    2,
    2,
    now()
    );






