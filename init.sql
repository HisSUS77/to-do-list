CREATE DATABASE IF NOT EXISTS root;

-- Create a user that can connect from any container
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY 'rootpass';

-- Grant all privileges
GRANT ALL PRIVILEGES ON root.* TO 'root'@'%';
FLUSH PRIVILEGES;

USE todo;
CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  task VARCHAR(255) NOT NULL,
  status VARCHAR(50) DEFAULT 'Pending'
);