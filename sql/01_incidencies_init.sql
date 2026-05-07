USE gestorIncidencia;

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

CREATE TABLE PRIORITAT (
    idPrioritat INT AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(100)
);

CREATE TABLE INCIDENCIA (
    idIncidencia INT AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(2000),
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idDepartament INT,
    idTecnic INT,
    idTipus INT,
    dataFinalitzacio DATE,
    idPrioritat INT,
    FOREIGN KEY (idTecnic) REFERENCES TECNIC(idTecnic),
    FOREIGN KEY (idDepartament) REFERENCES DEPARTAMENT(idDepartament),
    FOREIGN KEY (idTipus) REFERENCES TIPUS(idTipus),
    FOREIGN KEY (idPrioritat) REFERENCES PRIORITAT(idPrioritat)
);

CREATE TABLE ACTUACIO (
    idActuacio INT AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(2000),
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    temps INT,
    idIncidencia INT,
    visible TINYINT(1) DEFAULT 1,
    resolta TINYINT(1) DEFAULT 0,
    idTecnic INT,
    FOREIGN KEY (idTecnic) REFERENCES TECNIC(idTecnic),
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

INSERT INTO PRIORITAT (descripcio) VALUES
    ('Alta'),
    ('Mitja'),
    ('Baixa');

INSERT INTO INCIDENCIA (descripcio, data, idDepartament, idTecnic, idTipus, dataFinalitzacio, idPrioritat) VALUES
    ('Ordinador no arrenca', NOW(), 1, 1, 1, NULL, 1),
    ('Error en aplicació interna', NOW(), 1, 2, 2, NULL, 2),
    ('Problema de connexió a internet', NOW(), 4, 3, 3, NULL, 1),
    ('Revisió de sistema', NOW(), 2, 4, 4, NULL, 3);

INSERT INTO ACTUACIO (descripcio, data, temps, idIncidencia, visible, resolta, idTecnic) VALUES
    ('Revisió inicial', NOW(), 30, 1, 1, 0, 1),
    ('Reinici del sistema', NOW(), 15, 2, 1, 1, 2),
    ('Configuració de xarxa', NOW(), 45, 3, 1, 0, 3),
    ('Tasques de manteniment', NOW(), 60, 4, 0, 1, 4);