DROP DATABASE victor;
CREATE DATABASE IF NOT EXISTS victor;
SHOW DATABASES;
USE victor;

SHOW TABLES;
CREATE TABLE IF NOT EXISTS notas2 (
    id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
    nota TEXT
);

INSERT INTO notas2(id, nota) VALUES 
    ('1', 'Hola'),
    ('2', 'Mundo'),
    ('3', 'Persona');