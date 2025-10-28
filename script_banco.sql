CREATE DATABASE IF NOT EXISTS login_system;
USE login_system;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('candidato', 'empresa') NOT NULL,
    nif VARCHAR(30) DEFAULT NULL,
    empresa_nome VARCHAR(100) DEFAULT NULL,
    empresa_endereco VARCHAR(150) DEFAULT NULL
);