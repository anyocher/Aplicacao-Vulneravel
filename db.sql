-- db.sql
DROP DATABASE IF EXISTS mini_dvwa;
CREATE DATABASE mini_dvwa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mini_dvwa;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('admin', 'admin123'),
('user', 'password');
