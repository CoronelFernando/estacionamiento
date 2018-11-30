use estacionamientodb;
INSERT INTO estatus (est_id, est_descripcion) VALUES
(1, 'Disponible'),
(2, 'Ocupado'),
(3, 'Reservado');

INSERT INTO secciones (sec_id, sec_descripcion) 
VALUES (1, 'Seccion A'), 
(2, 'Seccion B');
/*(3, 'Seccion C');*/

INSERT INTO cajones (caj_id, caj_descripcion, caj_seccion_id, caj_status_id) 
VALUES ('1', 'Cajon 1', '1', '1'), ('2', 'Cajon 2', '1', '2'); 
/*('3', 'Cajon 3', '1'), 
('4', 'Cajon 4', '2'), ('5', 'Cajon 5 ', '2'), ('6', 'Cajon 6', '2'); */
/*,('7', 'Cajon 7', '1'), ('8', 'Cajon 8', '1'), ('9', 'Cajon 9', '3'), ('10', 'Cajon 10', '3');*/

INSERT INTO usuarios (usu_matricula, usu_nombre, usu_contrasena, usu_tipo)
VALUES (0316113444, 'Fernando Coronel', '123', 0), (0315109256, 'Carlos Cardona', '123', 0), (0315311281, 'Pablo Martinez', '123', 1), (0316111485, 'Mirna Valdivia', '123', 1);

INSERT INTO estadisticasCajones(estCaj_id, estCaj_cajon_id, estCaj_fecha, estCaj_hora, estCaj_disponible)
VALUES(1, 1, CURDATE(), CURTIME(), 1), (2, 1, CURDATE(), CURTIME(), 1), (3, 1, CURDATE(), CURTIME(), 1)
,(4, 2, CURDATE(), CURTIME(), 1), (5, 2, CURDATE(), CURTIME(), 1), (6, 2, CURDATE(), CURTIME(), 1);
/*,(7, 3, CURDATE(), CURTIME(), 1), (8, 3, CURDATE(), CURTIME(), 1), (9, 3, CURDATE(), CURTIME(), 1)
,(10, 4, CURDATE(), CURTIME(), 1), (11, 4, CURDATE(), CURTIME(), 1), (12, 4, CURDATE(), CURTIME(), 1)
,(13, 5, CURDATE(), CURTIME(), 1), (14, 5, CURDATE(), CURTIME(), 1), (15, 5, CURDATE(), CURTIME(), 1)
,(16, 6, CURDATE(), CURTIME(), 1), (17, 6, CURDATE(), CURTIME(), 1), (18, 6, CURDATE(), CURTIME(), 1);*/