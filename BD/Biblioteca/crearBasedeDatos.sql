-- David Pozo Berlinches
CREATE DATABASE Biblioteca;
USE Biblioteca;
Create table libro(
    isbn char(13) PRIMARY KEY,
    titulo varchar(255) NOT NULL
);

Create table socio(
    idSocio smallint UNSIGNED PRIMARY KEY,
    nombre varchar (100) NOT NULL,
    DNI char (9) NOT NULL
);

Create table ejemplar(
    isbn char(13) NOT NULL,
    nEjemplar tinyint UNSIGNED NOT NULL,
    prestamo BIT,
    CONSTRAINT fk_isbn FOREIGN KEY(isbn) REFERENCES libro(isbn),
    PRIMARY KEY (isbn,nEjemplar)
);

Create table prestamo(
    idPrestamo bigint unsigned PRIMARY KEY,
    fechaPrestamo timestamp NOT NULL,
    fechaDevolucion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idSocio smallint UNSIGNED NOT NULL,
    isbn char(13) NOT NULL,
    nEjemplar tinyint UNSIGNED NOT NULL,
    CONSTRAINT fk_idEjemplar FOREIGN KEY (isbn,nEjemplar) REFERENCES ejemplar(isbn,nEjemplar),
    CONSTRAINT fk_socio FOREIGN KEY (idSocio) REFERENCES socio (idSocio)
);




