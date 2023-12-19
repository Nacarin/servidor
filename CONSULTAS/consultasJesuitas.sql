-- Para cogerlo en php se suele usar un alias
-- Si una consulta lleva group by se puede poner el campo del group by y despues la funcion de agregado

-- Contar Jesuitas entre 10 y 20
SELECT COUNT(idJesuita)
FROM jesuita
WHERE idJesuita BETWEEN 10 AND 20

-- Sumar los numeros de puesto
SELECT SUM(idJesuita)
FROM jesuita

-- Mostrar la media de los numeros de puesto
SELECT AVG(idJesuita)
FROM jesuita

-- Mostrar el valor minimo de los puestos de jesuita
SELECT MIN(idJesuita)
FROM jesuita

-- Mostrar el valor maximo de los puestos de jesuita
SELECT MAX(idJesuita)
FROM jesuita

-- Contar los campos descripcion que no esten a NULL
SELECT COUNT(descripcion)
FROM lugar

-- Mostrar jesuitas diferentes que han hecho visitas
SELECT DISTINCT (idjesuita)
FROM visita

-- Contar que jesuitas diferentes han hecho consultas
SELECT COUNT(DISTINCT idJesuita )
FROM visita

-- Cuantas visitas a hecho cada jesuita y mostrar su nombre
SELECT nombre,visita.idJesuita, COUNT(*) AS cantidadDeVisitas
FROM visita
JOIN jesuita ON jesuita.idJesuita=visita.idJesuita
GROUP BY idJesuita

-- Cuantas visitas a hecho cada jesuita y mostrar su nombre,el nombre del lugar visitado
SELECT nombre,lugar, COUNT(*) AS cantidadDeVisitas
FROM visita
JOIN jesuita ON jesuita.idJesuita=visita.idJesuita
JOIN lugar ON lugar.ip=visita.ip
GROUP BY jesuita.idJesuita

-- Muestra información sobre las visitas, incluyendo el ID de la visita, el nombre del jesuita, el lugar visitado, la descripción del lugar y la fecha y hora de la visita.
SELECT
    visita.idVisita,jesuita.nombre AS nombreJesuita,lugar.lugar,lugar.descripcion AS descripcionLugar,visita.fechaHora  
FROM visita
    JOIN jesuita ON visita.idJesuita = jesuita.idJesuita
    JOIN lugar ON visita.ip = lugar.ip;

-- Muestra información sobre las visitas,el nombre del jesuita, el lugar visitado, la descripción del lugar(Solo si hay descripcion) y la fecha y hora de la visita.
SELECT
    jesuita.nombre AS nombreJesuita,lugar.lugar,lugar.descripcion AS descripcionLugar,visita.fechaHora  
FROM visita
    JOIN jesuita ON visita.idJesuita = jesuita.idJesuita
    JOIN lugar ON visita.ip = lugar.ip
WHERE descripcion IS NOT NULL;

-- Insertar los datos de jesuita en una tabla llamada jesuita2
INSERT INTO jesuita2 (idJesuita, nombre, firma)
SELECT idJesuita, nombre, firma
FROM jesuita;

-- Muestra el nombre de los jesuitas que han visitado una ip específico.
SELECT nombre
FROM jesuita
WHERE idJesuita IN (
    SELECT idJesuita
    FROM visita
    WHERE ip = '10.3.43.20'
);

-- Mostrar las ip de los lugares que su nombre comience por C
SELECT ip
FROM lugar
WHERE ip IN (
    SELECT ip
    FROM lugar
    where lugar LIKE 'C%'
);

-- Mostrar  el nombre de los jesuitas y la fecha de su última visita.
SELECT nombre, fechaHora AS ultimaVisita
FROM jesuita 
LEFT JOIN visita  ON jesuita.idJesuita = visita.idJesuita
WHERE fechaHora = (
    SELECT MAX(fechaHora)
    FROM visita 
    WHERE idJesuita = jesuita.idJesuita
);




