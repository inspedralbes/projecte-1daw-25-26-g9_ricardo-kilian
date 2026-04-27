CREATE TABLE TIPUS (
    idTipus INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(200)
);

CREATE TABLE DEPARTAMENT (
    idDepartament INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(200)
);

CREATE TABLE TECNIC (
    idTecnic INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(200)
);

CREATE TABLE INCIDENCIA (
    idIncidencia INT AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(2000),
    data TIMESTAMP,
    idDepartament INT,
    idTecnic INT,
    idTipus INT,
    dataFinalitzacio DATE,
    prioritat ENUM ('Alta', 'Mitja', 'Baixa'),
    FOREIGN KEY (idTecnic) REFERENCES TECNIC(idTecnic),
    FOREIGN KEY (idDepartament) REFERENCES DEPARTAMENT(idDepartament),
    FOREIGN KEY (idTipus) REFERENCES TIPUS(idTipus)
);

CREATE TABLE ACTUACIO (
    idActuacio INT AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(2000),
    data TIMESTAMP,
    temps INT,
    idIncidencia INT,
    visible INT(1),
    FOREIGN KEY (idIncidencia) REFERENCES INCIDENCIA(idIncidencia)
);


-- INSERTS

INSERT INTO TIPUS (nom) VALUES
    ('Hardware'),
    ('Software'),
    ('Xarxa'),
    ('Altres');

INSERT INTO DEPARTAMENT (nom) VALUES
    ('Informàtica'),
    ('Català'),
    ('Castellano'),
    ('Laboratori');

INSERT INTO TECNIC (nom) VALUES
    ('Kilian'),
    ('Ricardo'),
    ('Marc'),
    ('Laura');

INSERT INTO INCIDENCIA (descripcio, data, idDepartament, idTecnic, idTipus, dataFinalitzacio, prioritat) VALUES
    ('Ordinador no arrenca', NOW(), 1, 1, 1, NULL, 'Alta'),
    ('Error en aplicació interna', NOW(), 1, 2, 2, NULL, 'Mitja'),
    ('Problema de connexió a internet', NOW(), 4, 3, 3, NULL, 'Alta'),
    ('Revisió de sistema', NOW(), 2, 4, 4, NULL, 'Baixa');

INSERT INTO ACTUACIO (descripcio, data, temps, idIncidencia, visible) VALUES
    ('Revisió inicial', NOW(), 30, 1, 1),
    ('Reinici del sistema', NOW(), 15, 2, 1),
    ('Configuració de xarxa', NOW(), 45, 3, 1),
    ('Tasques de manteniment', NOW(), 60, 4, 0);