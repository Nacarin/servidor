-- David Pozo Berlinches
-- Crear Base de datos

BEGIN;

-- Creación de base de datos Trash Invaders.
CREATE DATABASE IF NOT EXISTS trashinvaders DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- Creación de tablas.
USE trashinvaders;

-- Creacion de la tabla usuario
CREATE TABLE IF NOT EXISTS usuario (
    idUsuario smallint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nickname char(3) NOT NULL,
    contrasenia varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Creacion de la tabla partida
CREATE TABLE IF NOT EXISTS partida (
    idPartida int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    puntuacion int UNSIGNED NOT NULL,
    idUsuario smallint UNSIGNED NOT NULL 
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Creacion de la tabla imagenes
CREATE TABLE IF NOT EXISTS imagen(
    idImagen int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    imagen MEDIUMBLOB NOT NULL,
    hash VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Creacion de la tabla mejora
CREATE TABLE IF NOT EXISTS mejora (
    idMejora tinyint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(120) NOT NULL,
    multiplicador TINYINT UNSIGNED NULL,
    duracion_mejora TINYINT UNSIGNED NULL,
    porcentaje_aparicion TINYINT UNSIGNED NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- Inserta tres mejoras en la tabla mejoras

INSERT INTO mejora (descripcion, multiplicador, duracionMejora) VALUES ('Multiplicador puntos', 2, 10);
INSERT INTO mejora (descripcion, multiplicador, duracionMejora) VALUES ('Te mueves mas rapido', 3, 10);
INSERT INTO mejora (descripcion, multiplicador, duracionMejora) VALUES ('La basura viene mas despacio', 4, 10);


-- Creacion de la tabla administrador
CREATE TABLE IF NOT EXISTS administrador(
    idAdmin char(3) NOT NULL,
    contrasenia varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS parametros(
    velocidad_basura tinyint unsigned NOT NULL,
    generacion_basura tinyint unsigned NOT NULL,
    tiempo_espera tinyint unsigned NOT NULL,
    prob_aparicion_mejora tinyint unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS usuario_imagen_mejora(
    id_usuario_imagen_mejora int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idUsuario smallint UNSIGNED NOT NULL,
    idImagen int UNSIGNED NOT NULL,
    idMejora tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- CONSTRAINTS A INCLUIR

ALTER TABLE partida ADD CONSTRAINT FK_partida_usuario FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE usuario_imagen_mejora ADD CONSTRAINT FK_usuario_imagen_mejora_usuario FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario);
ALTER TABLE usuario_imagen_mejora ADD CONSTRAINT FK_usuario_imagen_mejora_imagen FOREIGN KEY (idImagen) REFERENCES imagen(idImagen);
ALTER TABLE usuario_imagen_mejora ADD CONSTRAINT FK_usuario_imagen_mejora_mejora FOREIGN KEY (idMejora) REFERENCES mejora(idMejora);

ALTER TABLE usuario_imagen_mejora ADD CONSTRAINT unique_usuario_mejora UNIQUE (idUsuario, idMejora);
ALTER TABLE usuario_imagen_mejora ADD CONSTRAINT unique_usuario_imagen UNIQUE (idUsuario, idImagen);

ALTER TABLE imagen ADD CONSTRAINT unique_hash UNIQUE (hash);

COMMIT;


CREATE TABLE rankins (
    idRanking int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idUsuario VARCHAR(255) NOT NULL,
    puntuacion int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



-- Consultas

-- Contar cuantos usuarios hay en el ranking
SELECT COUNT(idUsuario)
FROM rankins

-- Contar cuantas mejoras tienen como descripcion 'Correr mas rapido'
SELECT COUNT(idMejora)
FROM mejora
where descripcion='Correr mas rapido'

-- Mostrar la puntuacion maxima
SELECT MAX(puntuacion)
FROM rankins

-- Mostrar la puntuacion minima
SELECT MIN(puntuacion)
FROM rankins

-- Mostrar la media de las puntuaciones
SELECT AVG(puntuacion)
FROM rankins

-- Mostrar mejoras con nombres diferentes
SELECT DISTINCT (descripcion)
FROM mejora

-- Contar cuantas mejoras con descripcion diferente hay
SELECT COUNT(DISTINCT descripcion)
FROM mejora

-- Mostrar las mejoras del usuario 6,con su nombre de usuario,descripcion de la mejora y el nombre de imagen
SELECT usuario.nickname,mejora.descripcion AS descripcion_mejora,imagen.nombre AS nombre_imagen
FROM usuario
    JOIN usuario_imagen_mejora  ON usuario.idUsuario = usuario_imagen_mejora.idUsuario
    JOIN mejora ON usuario_imagen_mejora.idMejora = mejora.idMejora
    JOIN imagen ON usuario_imagen_mejora.idImagen = imagen.idImagen
WHERE usuario.idUsuario=6

-- Mostrar el nombre del usuario,la id y cuantas mejoras tiene asociadas

SELECT usuario.nickname AS nombre_usuario,usuario.idUsuario,COUNT(*) AS cantidad_mejoras 
FROM usuario
    JOIN usuario_imagen_mejora ON usuario.idUsuario = usuario_imagen_mejora.idUsuario
GROUP BY
    usuario.idUsuario

-- Supongamos que tenemos una tabla con un registro de los juegos que han jugado los usuarios,el having filtra
-- despues de agrupar,el where(filtra una operacion normal) se pone antes del group by,el having(filtra el resultado del group by) se pone despues del group by

SELECT usuario.nickname AS nombre_usuario,usuario.idUsuario,COUNT(*) AS cantidad_mejoras 
FROM usuario
    JOIN usuario_imagen_mejora ON usuario.idUsuario = usuario_imagen_mejora.idUsuario
GROUP BY
    usuario.idUsuario
HAVING cantidad_mejoras >1

-- Usuario que tenga la mayor puntuacion
SELECT idUsuario, puntuacion AS max_puntuacion
    FROM rankins
WHERE puntuacion = (SELECT MAX(puntuacion) FROM rankins);


















-- Subconsulta,lo normal es usarla en el where como parte de una condicion,las subconsultas van entre parentesis
-- select from where campo1(select)
-- Las subconsultas van a tener 1 sola columna.Una subconsulta que se usa en el where solo puede tener 1 columna.
-- La cantidad de filas que devuelve una subconsulta depende del operador,por ejemplo,el operador = solo puede devolver 1 fila,
-- el operador IN puede devolver mas de 1 fila
-- El order by siempre va al final
-- Se pueden usar subconsultas para sustituir una columna,una tabla,y se usan en el where y en el having
-- Las subconsultas se usan mucho con insert into(añadir filas a una tabla de otra)

-- Operador Exists devuelve verdadero si la subconsulta devuelve alguna fila,false si no devuelve ninguna
-- Se suele usar mas el not Exists
-- Primera fila de la tabla principal,para esa fila hace la subconsulta del where.
-- En la subconsulta puedo usar un campo de la tabla principal sin inner join,en la tabla principal no puedo usar ningun campo de la subconsulta
-- =ANY es lo mismo que IN,ANY es para comparar con otros operadores.

/*
SELECT DepartmentID, Name   
FROM HumanResources.Department   
WHERE EXISTS (SELECT subconsulta)  
ORDER BY Name ASC ; 

*/