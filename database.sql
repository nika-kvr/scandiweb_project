CREATE DATABASE productsDB;

CREATE TABLE products(
    id INT PRIMARY KEY AUTO_INCREMENT,
    SKU VARCHAR(60),
    name VARCHAR(60),
    price VARCHAR(60),
    product_type VARCHAR(60),
    type_value VARCHAR(60)
);
