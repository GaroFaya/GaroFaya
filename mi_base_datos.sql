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

CREATE TABLE isotipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre ENUM('hectomorfo', 'mesomorfo', 'endomorfo') UNIQUE
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
    id_isotipo INT,
    edad INT,
    actividad_fisica VARCHAR(100),
    indice_masa FLOAT,
    indice_grasa FLOAT,
    id_medidas INT,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_isotipo) REFERENCES isotipos(id),
    FOREIGN KEY (id_medidas) REFERENCES medidas(id)
);