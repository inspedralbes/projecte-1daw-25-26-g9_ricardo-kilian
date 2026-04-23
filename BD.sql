

CREATE TABLE TIPO(
    idTipo INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(200)

);


CREATE table DEPARTAMENT(
	idDepartament INT(11) AUTO_INCREMENT PRIMARY KEY,
     nom VARCHAR(200)
);



CREATE table TECNIC(
	idTecnic INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(200)
);



CREATE table INCIDENCIA(
	idIncidencia INT(11) AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(2000),
    data TIMESTAMP,
    departament INT(11) ,
    tecnic INT(11) ,
    tipo INT(11) ,
    datafinalitzacio DATE,
    prioritat ENUM ('Alta' , 'Mitja' ,'Baixa'),
    FOREIGN KEY (tecnic) REFERENCES TECNIC(idTecnic),
    FOREIGN KEY (departament) REFERENCES DEPARTAMENT(idDepartament),
    FOREIGN KEY (tipo) REFERENCES TIPO(idTipo)
);



CREATE TABLE ACTUACIO (
    idActuacio INT(11) AUTO_INCREMENT PRIMARY KEY,
    descripcio VARCHAR(2000),
    data TIMESTAMP ,
    temps INT(11),
    incidencia INT(11),
    visible INT(1),
    FOREIGN KEY(incidencia) REFERENCES INCIDENCIA(idIncidencia)
);

