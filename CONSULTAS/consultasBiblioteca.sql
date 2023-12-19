-- Consulta libros prestados,que libro se ha prestado,quien se lo ha llevado(nºejemplar)
SELECT numPrestamo, titulo, numEjemplar, idLector, nombre
    FROM prestamo
    JOIN socio  ON idLector = id
    JOIN libros ON libros.isbn=prestamo.isbn



-- Libros que estan actualmente prestados
SELECT titulo
    FROM libros
    WHERE isbn IN (
        SELECT isbn
        FROM ejemplar
        WHERE prestado = 1
);

-- Consulta para obtener información sobre un préstamo con detalles de libro y lector
SELECT numPrestamo, titulo AS tituloLibro, nombre AS nombreLector
    FROM prestamo
    JOIN libros ON prestamo.isbn = libros.isbn
    JOIN socio ON idLector = id
WHERE prestamo.numPrestamo = 1;

-- Consulta para listar los libros prestados y sus lectores:
SELECT titulo AS tituloLibro, nombre AS nombreLector
    FROM prestamo
    JOIN libros ON prestamo.isbn = libros.isbn
    JOIN socio ON prestamo.idLector = socio.id;

-- Consulta para obtener la fecha de devolución de un préstamo específico
SELECT prestamo.numPrestamo, libros.titulo AS tituloLibro, socio.nombre AS nombreLector, prestamo.fechaDevolucion
    FROM prestamo
    JOIN libros ON prestamo.isbn = libros.isbn
    JOIN socio ON prestamo.idLector = socio.id
WHERE prestamo.numPrestamo = 1;

-- Mostrar el titulo del libro,el isb,el nombre del socio y el ejemplar prestado
SELECT libros.titulo AS tituloLibro, prestamo.isbn, socio.nombre AS nombreLector, ejemplar.prestado
    FROM prestamo
    JOIN libros ON prestamo.isbn = libros.isbn
    JOIN socio ON prestamo.idLector = socio.id
    JOIN ejemplar ON ejemplar.isbn = libros.isbn
WHERE prestado=1






