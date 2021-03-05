DROP DATABASE ajax_practica;

CREATE DATABASE IF NOT EXISTS ajax_practica;
SHOW DATABASES;
USE ajax_practica;

CREATE TABLE IF NOT EXISTS ajax (
    id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    log_inicio INTEGER UNSIGNED
);

INSERT INTO ajax(log_inicio) VALUES ('1');
INSERT INTO ajax(log_inicio) VALUES ('3');
UPDATE ajax SET log_inicio = 0 WHERE id = 1 LIMIT 1;

