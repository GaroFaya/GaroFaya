CREATE DATABASE mi_base_datos;

USE mi_base_datos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100),
    apellidos VARCHAR(100),
    sexo ENUM('masculino', 'femenino'),
    email VARCHAR(100) UNIQUE,
    direccion VARCHAR(255),
    usuario VARCHAR(50) UNIQUE,
    clave VARCHAR(255),
    celular VARCHAR(20),
    plan VARCHAR(50),
    tipoPlan VARCHAR(50),
    estado ENUM('activo', 'inactivo') DEFAULT 'inactivo'
);
