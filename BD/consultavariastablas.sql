-- Mostrar nombre del jesuita,lugar que ha visitado y la fecha
SELECT nombre, lugar, fechaHora
FROM jesuita
JOIN visita ON jesuita.idJesuita = visita.idJesuita
JOIN lugar ON visita.ip = lugar.ip;

-- Mostrar el nombre del jesuita,el lugar y la ip
SELECT nombre, lugar.ip, lugar.lugar
FROM lugar
INNER JOIN visita ON lugar.ip = visita.ip
INNER JOIN jesuita ON jesuita.idJesuita=visita.idJesuita;
