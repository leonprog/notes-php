CREATE DATABASE IF NOT EXISTS enot;
USE enot;

CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL
);
