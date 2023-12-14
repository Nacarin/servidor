CREATE TABLE `admin` (
	`idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
	`correo` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`pw` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nombre` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`perfil` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`idUsuario`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=8
;

INSERT INTO tUsuario (correo, pw, nombre, perfil) VALUES
('admin@gmail.com', 'admin', 'admin', '0');

