-- Create the database
CREATE DATABASE IF NOT EXISTS inventory_db;
USE inventory_db;

-- Create the items table
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO items (name, quantity, price) VALUES 
('Laptop', 10, 45000.00),
('Mouse', 50, 500.00),
('Keyboard', 30, 1200.00),
('Monitor', 20, 7000.00);
