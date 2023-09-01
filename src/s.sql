create database sha;
use  sha;
-- Create Product table
CREATE TABLE Product (
    ProductCode INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(255),
    ProductType VARCHAR(50),
    Description TEXT,
    Quantity INT,
    Price DECIMAL(10, 2),
    Image VARCHAR(255)
);

-- Create User table
CREATE TABLE User (
    UID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) UNIQUE,
    Password VARCHAR(255),
    UserType VARCHAR(20)
);

INSERT INTO Product (ProductName, ProductType, Description, Quantity, Price, Image)
VALUES
    ('Red Bicycle', 'Sports & Outdoors', 'High-quality red bicycle suitable for all ages.', 20, 249.99, 'https://images.pexels.com/photos/7930382/pexels-photo-7930382.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Wireless Headphones', 'Electronics', 'Bluetooth wireless headphones with noise cancellation.', 100, 129.99, 'https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Blue Jeans', 'Apparel', 'Classic blue jeans with a comfortable fit.', 150, 39.99, 'https://images.pexels.com/photos/1082529/pexels-photo-1082529.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Coffee Maker', 'Appliances', 'Programmable coffee maker for brewing your favorite beverages.', 50, 79.99, 'https://images.pexels.com/photos/4349727/pexels-photo-4349727.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Smartphone Case', 'Accessories', 'Protective case for popular smartphone models.', 200, 19.99, 'https://images.pexels.com/photos/5592309/pexels-photo-5592309.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Running Shoes', 'Footwear', 'Lightweight running shoes designed for performance.', 75, 89.99, 'https://images.pexels.com/photos/1027130/pexels-photo-1027130.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Leather Wallet', 'Accessories', 'Genuine leather wallet with multiple card slots.', 80, 29.99, 'https://images.pexels.com/photos/17674670/pexels-photo-17674670/free-photo-of-man-holding-wallet.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Digital Camera', 'Electronics', '12MP digital camera with advanced features.', 30, 199.99, 'https://images.pexels.com/photos/2229671/pexels-photo-2229671.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Wooden Desk', 'Furniture', 'Elegant wooden desk for home office or study.', 25, 149.99, 'https://images.pexels.com/photos/2312369/pexels-photo-2312369.jpeg?auto=compress&cs=tinysrgb&w=600'),
    ('Fitness Tracker', 'Health & Fitness', 'Track your daily activities with this fitness tracker.', 120, 49.99, 'https://images.pexels.com/photos/437038/pexels-photo-437038.jpeg?auto=compress&cs=tinysrgb&w=600');

select * from Product;
drop table Product;

INSERT INTO User (Username, Password, UserType)
VALUES
    ('admin', 'adminpassword', 'admin'),
    ('johndoe', 'securepass123', 'user'),
    ('janedoe', 'password456', 'user'),
    ('mike.smith', 'mikespass789', 'user'),
    ('emilyjones', 'emilysafe789', 'user'),
    ('alexwilson', 'alexpass123', 'user'),
    ('sarahbrown', 'sarahspassword', 'user'),
    ('chriswilliams', 'securechrispass', 'user'),
    ('laurasmith', 'laurapass456', 'user'),
    ('davidmiller', 'david123pass', 'user');
drop table user;
select * from user;

