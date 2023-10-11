CREATE DATABASE Biblioteca;
USE Biblioteca;
Create table libro(
    isbn char(13) PRIMARY KEY,
    titulo varchar(255) NOT NULL
)

Create table socio(
    idSocio smallint UNSIGNED PRIMARY KEY,
    nombre varchar (100) NOT NULL,
    DNI char (9) NOT NULL
)

Create table ejemplar(
    isbn char(13) NOT NULL,
    nEjemplar tinyint UNSIGNED NOT NULL,
    prestamo BIT
)

Create table prestamo(
    idPrestamo bigint unsigned PRIMARY KEY,
    fechaPrestamo timestamp NOT NULL,
    fechaDevolucion timestamp NOT NULL,
    idSocio smallint UNSIGNED NOT NULL,
    isbn char(13) NOT NULL,
    nEjemplar tinyint UNSIGNED NOT NULL
)
