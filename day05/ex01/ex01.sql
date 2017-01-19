USE db_lmarques;
CREATE TABLE ft_table (id INT(8) NOT NULL AUTO_INCREMENT,
						login VARCHAR(8) NOT NULL,
						groupe ENUM('staff', 'student', 'other') NOT NULL,
						date_de_creation date NOT NULL,
						PRIMARY KEY (id));