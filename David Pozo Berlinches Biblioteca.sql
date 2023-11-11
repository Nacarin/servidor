-- Añadirme como socio 
INSERT INTO socio (dni, nombre) VALUES ('77777777N', 'David Pozo Berlinches');

-- Añadir 2 libros
-- Libro con 1 ejemplar
INSERT INTO libros (isbn, titulo)VALUES ('978-8417373795', 'Bakemonogatari 1');
INSERT INTO ejemplar (isbn, numEjemplar, prestado) VALUES ('978-8417373795', 1, 0);

-- Libro con 2 ejemplares
INSERT INTO libros (isbn, titulo) VALUES ('978-8467918892', 'Tokyo Ghoul 1');
INSERT INTO ejemplar (isbn, numEjemplar, prestado) VALUES ('978-8467918892', 1, 0);
INSERT INTO ejemplar (isbn, numEjemplar, prestado) VALUES ('978-8467918892', 2, 0);

-- Prestamos
-- Primero
INSERT INTO prestamo (fechaPrestamo, idLector, isbn, numEjemplar)
VALUES (CURRENT_TIMESTAMP, 3, '0-7645-2641-5', 1);

-- Segundo 
INSERT INTO prestamo (fechaPrestamo, idLector, isbn, numEjemplar)
VALUES (CURRENT_TIMESTAMP, 3, '978-8467918892', 2);

--Consulta tabla prestamos
SELECT numPrestamo, isbn, numEjemplar, idLector, nombre
    FROM prestamo
    JOIN socio  ON idLector = id;

