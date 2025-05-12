CREATE DATABASE legalfacil;
USE legalfacil;

-- Tabla de Usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(300) NOT NULL,
    apellidos VARCHAR(300) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    personal_path VARCHAR(255),  
    tipo_usuario ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario',  
    fecha_de_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Categorías
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion VARCHAR(300) NOT NULL
);

-- Tabla de Contratos
CREATE TABLE contratos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion VARCHAR(300) NOT NULL,
    categoria_id INT,
    file_path VARCHAR(255) NOT NULL,  
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
);

-- Tabla de Descargas
CREATE TABLE descargas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    contrato_id INT NOT NULL,
    fecha_de_descarga TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (contrato_id) REFERENCES contratos(id) ON DELETE CASCADE
);