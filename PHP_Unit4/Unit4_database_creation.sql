use hadam;

DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXists product;

CREATE TABLE customer(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    first_name VARCHAR(255), 
    last_name VARCHAR(255), 
    email VARCHAR(255)
);

INSERT INTO customer(first_name, last_name, email) VALUES
    ('Mickey', 'Mouse', 'mmouse@mines.edu'),
    ('Hunter', 'Adam', 'hadam@mines.edu');

CREATE TABLE product(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    image_name VARCHAR(255),
    price DECIMAL(6, 2),
    in_stock INT
);

INSERT INTO product(product_name, image_name, price, in_stock) VALUES
    ('A Court of Thorns and Roses', 'images/ACourtOfThornsAndRoses.webp', 10, 0),
    ('A Court of Mist and Fury', 'images/ACourtOfMistAndFury.webp', 15, 3),
    ('A Court of Wings and Ruin', 'images/ACourtOfWingsAndRuin.jpg', 20, 10);

CREATE TABLE orders(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT, 
    customer_id INT, 
    quantity INT, 
    price DECIMAL(6, 2),
    tax DECIMAL (6, 2),
    donation DECIMAL (6, 2),
    timestamp BIGINT,
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (customer_id) REFERENCES customer(id)
);