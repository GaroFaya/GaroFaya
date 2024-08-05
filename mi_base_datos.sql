CREATE DATABASE athletic;

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

CREATE TABLE medidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pecho FLOAT,
    brazos FLOAT,
    cintura FLOAT,
    piernas FLOAT,
    gemelos FLOAT
);

CREATE TABLE cliente (
    id_usuario INT,
    peso FLOAT,
    talla FLOAT,
    isotipo ENUM('hectomorfo', 'mesomorfo', 'endomorfo'),
    edad INT,
    actividad_fisica VARCHAR(100),
    indice_masa FLOAT,
    indice_grasa FLOAT,
    id_medidas INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_medidas) REFERENCES medidas(id)
);