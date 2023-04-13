CREATE DATABASE centre_de_formation;

CREATE TABLE Formation (
ID_formation int AUTO_INCREMENT,
Sujet varchar(20),
Categorie varchar(20),
Masse_horaire varchar(10),
PRIMARY KEY(ID_formation)
);

CREATE TABLE Formateur (
ID_formateur int NOT NULL AUTO_INCREMENT,
Nom varchar(20),
Prenom varchar(20),
Email varchar(20),
Telephone varchar(20),
Mot_de_passe varchar(20),
PRIMARY KEY(ID_formateur)
);

CREATE TABLE Session (
ID_session int NOT NULL AUTO_INCREMENT,
Date_debut DATETIME,
Date_fin DATETIME,
Nbr_places_max int,
Etat varchar(20),
ID_formation int,
ID_formateur int,
PRIMARY KEY(ID_session),
FOREIGN KEY(ID_formation) REFERENCES Formation(ID_formation),
FOREIGN KEY(ID_formateur) REFERENCES Formateur(ID_formateur)
);

CREATE TABLE Apprenant (
ID_apprenant int NOT NULL AUTO_INCREMENT,
Prenom varchar(20),
Nom varchar(20),
Email varchar(20),
Telephone varchar(20),
Mot_de_passe varchar(20)
PRIMARY KEY(ID_apprenant)
);

CREATE TABLE Apprenant_session (
resultat varchar(20),
date_evaluation DATETIME,
ID_session int,
ID_apprenant int,
FOREIGN KEY(ID_session) REFERENCES Session(ID_session),
FOREIGN KEY(ID_apprenant) REFERENCES Apprenant(ID_apprenant),
PRIMARY KEY(ID_session, ID_apprenant);
)