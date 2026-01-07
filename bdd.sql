CREATE DATABASE IF NOT EXISTS niak
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE niak;

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    tel VARCHAR(20)
);

CREATE TABLE plante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    espece VARCHAR(150) NOT NULL,
    description TEXT,
    methode TEXT,
    image VARCHAR(255)
);

CREATE TABLE entreprise (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tel VARCHAR(20),
    email VARCHAR(150),
    lieu VARCHAR(255),
    logo VARCHAR(255)
);
