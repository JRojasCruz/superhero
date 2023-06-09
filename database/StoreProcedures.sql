SELECT * FROM superhero;

SELECT * FROM race;
SELECT * FROM gender;


USE superhero
DROP DATABASE restaurant
-- Procedimiento listar
DELIMITER $$
CREATE PROCEDURE spu_listar_superheros(IN _publisher_id INT)
BEGIN
	SELECT
		superhero.`id`,
		superhero.`superhero_name`,
		superhero.`full_name`,
		gender.`gender`,
		c1.colour 'eye_colour',
		c2.colour 'hair_colour',
		c3.colour 'skin_colour',
		race.`race`,
		publisher.`publisher_name`,
		alignment.`alignment`,
		superhero.`height_cm`,
		superhero.`weight_kg`
	FROM superhero
		INNER JOIN gender ON gender.`id`= superhero.`gender_id`
		INNER JOIN colour c1 ON c1.`id`= superhero.`eye_colour_id`
		INNER JOIN colour c2 ON c2.`id`=superhero.`hair_colour_id`
		INNER JOIN colour c3 ON c3.`id`= superhero.`skin_colour_id`
		LEFT JOIN race ON race.id=superhero.`race_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN alignment ON alignment.`id`= superhero.`alignment_id`
	WHERE superhero.`publisher_id` = _publisher_id
	ORDER BY superhero.`id`;
END $$

CALL spu_listar_superheros(3);

DELIMITER $$
CREATE PROCEDURE spu_filtrar_superheros
(
	IN _race_id INT, 
	IN _gender_id INT,
	IN _alignment_id INT
)
BEGIN
	SELECT 
		superhero.`id`,
		superhero.`superhero_name`,
		c1.colour 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`,
		race.`race`,
		gender.`gender`,
		alignment.`alignment`
	FROM superhero
		INNER JOIN colour c1 ON c1.`id`=superhero.`hair_colour_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN race ON race.id=superhero.`race_id`
		INNER JOIN gender ON gender.`id`= superhero.`gender_id`
		LEFT JOIN alignment ON alignment.`id`= superhero.`alignment_id`
		WHERE race.`id` = _race_id AND gender.`id`=_gender_id AND alignment.`id`= _alignment_id;
END$$

CALL spu_filtrar_superheros(1,1,1);




SELECT * FROM superhero WHERE race_id = 1 AND gender_id = 1 AND alignment_id = 1;

DELIMITER $$
CREATE PROCEDURE spu_alignment_graphic()
BEGIN
	SELECT	alignment.`id`,
				alignment.`alignment`,
				COUNT(*) 'amount'
		FROM superhero
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		GROUP BY alignment.`id`, alignment.`alignment`;
END$$


DELIMITER $$
CREATE PROCEDURE spu_listar_faction(IN _publisher_id INT)
BEGIN
SELECT 
		alignment.`id`,
		alignment.`alignment`,
		COUNT(*) 'amount'
	FROM superhero
		LEFT JOIN alignment ON alignment.`id` = superhero.`alignment_id`
		WHERE superhero.`publisher_id` = _publisher_id AND superhero.`alignment_id` IN ('1','2')
		GROUP BY alignment.`id`, alignment.`alignment`;
END$$

CALL spu_listar_faction(4);

DELIMITER $$
CREATE PROCEDURE spu_listar_eyecolour()
BEGIN
SELECT 
		publisher.`id`,
		publisher.`publisher_name`,
		colour.`colour`,
		COUNT(*) 'amount'
	FROM superhero
		LEFT JOIN colour ON colour.`id` = superhero.`eye_colour_id`
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		WHERE superhero.`publisher_id` IN ('4','13')
		GROUP BY publisher.`publisher_name`, colour.`colour`
		ORDER BY colour.`colour`;
END$$

CALL spu_listar_eyecolour();
SELECT * FROM colour;


SELECT 
		publisher.`id`,
		publisher.`publisher_name`,
		alignment.`alignment`,
		COUNT(*)
	FROM superhero
		LEFT JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT JOIN alignment ON alignment.`id`= superhero.`alignment_id`
		WHERE publisher.`id` IN ('2','5','11','18','24') AND alignment.`id` IN ('1','2','3','4')
		GROUP BY publisher.`publisher_name`, alignment.`alignment`
		ORDER BY publisher.`publisher_name`,alignment.`alignment`;
		
SELECT * FROM superhero WHERE publisher_id = 5 
