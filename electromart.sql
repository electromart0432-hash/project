-- =====================================================
-- ELECTROMART E-COMMERCE DATABASE
-- =====================================================

-- Create Database
CREATE DATABASE IF NOT EXISTS electromart;
USE electromart;

-- =====================================================
-- USERS TABLE - For Customer Registration & Login
-- =====================================================
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =====================================================
-- CATEGORIES TABLE - Product Categories
-- =====================================================
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- PRODUCTS TABLE - Product Inventory
-- =====================================================
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(150) NOT NULL,
    category_id INT NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- =====================================================
-- ORDERS TABLE - Customer Orders
-- =====================================================
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    customer_name VARCHAR(100),
    shipping_address VARCHAR(255),
    city VARCHAR(100),
    product_name VARCHAR(150),
    product_price DECIMAL(10, 2),
    quantity INT DEFAULT 1,
    total_amount DECIMAL(10, 2),
    payment_status VARCHAR(50) DEFAULT 'pending',
    payment_method VARCHAR(50),
    delivery_status VARCHAR(50) DEFAULT 'pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- =====================================================
-- ORDER ITEMS TABLE - Items in Each Order
-- =====================================================
CREATE TABLE IF NOT EXISTS order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- =====================================================
-- PAYMENTS TABLE - Payment Information
-- =====================================================
CREATE TABLE IF NOT EXISTS payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL UNIQUE,
    payment_method VARCHAR(100),
    amount DECIMAL(10, 2) NOT NULL,
    transaction_id VARCHAR(100) UNIQUE,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

-- =====================================================
-- CONTACT MESSAGES TABLE - Contact Form Submissions
-- =====================================================
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- CART TABLE - Shopping Cart (Optional)
-- =====================================================
CREATE TABLE IF NOT EXISTS cart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_product (user_id, product_id)
);

-- =====================================================
-- SAMPLE DATA - Categories
-- =====================================================
INSERT INTO categories (category_name, description) VALUES
('Air Conditioners', 'Cooling systems for homes and offices'),
('Fans', 'Ceiling and pedestal fans for air circulation'),
('Geysers', 'Water heaters for hot water supply');

-- =====================================================
-- SAMPLE DATA - Products
-- =====================================================
INSERT INTO products (product_name, category_id, description, price, stock_quantity, image_url) VALUES
-- Air Conditioners
('Window AC 1.5 Ton', 1, 'Energy efficient window mounted air conditioner', 25000.00, 15, 'image/ac.jfif'),
('Split AC 2 Ton', 1, 'Modern split air conditioning unit', 35000.00, 10, 'image/ac1.jfif'),
('Inverter AC 1.5 Ton', 1, 'Power saving inverter AC', 42000.00, 8, 'image/ac2.jfif'),
('Central AC System', 1, 'Whole house cooling solution', 120000.00, 5, 'image/ac3.jfif'),

-- Fans
('Ceiling Fan 1200 mm', 2, 'Standard ceiling fan with remote', 3500.00, 50, 'image/f1.jfif'),
('Pedestal Fan 400 mm', 2, 'Portable pedestal fan', 2500.00, 60, 'image/f3.jfif'),
('Table Fan 300 mm', 2, 'Compact table fan', 1200.00, 40, 'image/f4.jfif'),
('Tower Fan', 2, 'Oscillating tower fan', 4500.00, 25, 'image/f5.jfif'),

-- Geysers
('Electric Geyser 15L', 3, 'Compact electric water heater', 4500.00, 30, 'image/gysers.jfif'),
('Solar Geyser 100L', 3, 'Energy efficient solar water heater', 18000.00, 12, 'image/ac\ and\ gyser.jfif'),
('Gas Geyser 10L', 3, 'Instant hot water gas heater', 12000.00, 20, 'image/gysers.jfif');

-- =====================================================
-- SAMPLE DATA - Test User
-- =====================================================
INSERT INTO users (fullname, email, phone, address, password) VALUES
('John Doe', 'john@example.com', '9876543210', '123 Main Street, City', '$2y$10$F3b2.z8d8K8z8z8z8z8z8z8z8z8z8z8z8z8z8z8z8z'); 

-- =====================================================
-- CREATE INDEXES FOR BETTER PERFORMANCE
-- =====================================================
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_products_category ON products(category_id);
CREATE INDEX idx_orders_user ON orders(user_id);
CREATE INDEX idx_orders_date ON orders(order_date);
CREATE INDEX idx_order_items_order ON order_items(order_id);
CREATE INDEX idx_order_items_product ON order_items(product_id);
CREATE INDEX idx_cart_user ON cart(user_id);
CREATE INDEX idx_payments_order ON payments(order_id);
CREATE INDEX idx_contact_email ON contact_messages(email);

-- =====================================================
-- DATABASE SETUP COMPLETE
-- =====================================================
