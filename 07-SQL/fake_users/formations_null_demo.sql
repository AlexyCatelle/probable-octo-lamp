-- Créer la base de données si elle n'existe pas
CREATE DATABASE IF NOT EXISTS formation_sql;
USE formation_sql;

-- Supprimer la table Products si elle existe déjà
DROP TABLE IF EXISTS Products;

-- Créer la table Products
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    stock INT
);

-- Insérer des enregistrements avec des champs NULL
INSERT INTO Products (product_name, description, price, stock)
VALUES
    ('Laptop', 'Portable computer', 1200.00, 10),
    ('Smartphone', NULL, 699.99, 25),          -- Description NULL
    ('Desk Chair', 'Comfortable office chair', NULL, 15),  -- Prix NULL
    ('Monitor', '24 inch HD monitor', 299.99, NULL),  -- Stock NULL
    ('Keyboard', NULL, NULL, 50);              -- Description et prix NULL

-- Sélectionner tous les produits pour vérifier les champs NULL
SELECT * FROM Products;
