CREATE DATABASE Juego DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE ItemMaster;

CREATE TABLE Heroe (
	Id_heroe INT AUTO_INCREMENT NOT NULL,
	Nombre_heroe VARCHAR (50) NOT NULL,
    	Tipo_heroe VARCHAR (50) NOT NULL,
    	PRIMARY KEY(Id_heroe)
);

CREATE TABLE Item (
	Id_item INT AUTO_INCREMENT NOT NULL,
	Nombre_item VARCHAR (100) NOT NULL,
	Tipo_item VARCHAR (100) NOT NULL,
	Nivel_item VARCHAR (100) NOT NULL,
	PRIMARY KEY(Id_Item)
);

CREATE TABLE Roll (
	Id_roll INT AUTO_INCREMENT NOT NULL,
	Nombre_roll VARCHAR (100) NOT NULL,
    	Tipo_roll VARCHAR (100) NOT NULL,
    	Nivel_roll VARCHAR (100) NOT NULL,
    	PRIMARY KEY(Id_roll)
);


CREATE TABLE Armadura (
	Id_armadura INT AUTO_INCREMENT NOT NULL,
	Nombre_armadura VARCHAR (100) NOT NULL,
    	Tipo_armadura VARCHAR (100) NOT NULL,
    	Nivel_armadura VARCHAR (100) NOT NULL,
    	PRIMARY KEY(Id_armadura)
);

CREATE TABLE Resultados(
	Id_resultados INT NOT NULL AUTO_INCREMENT,
    	Id_rheroe INT NULL,
    	Id_ritem INT NULL,
    	Id_rroll INT NULL,
    	Id_rarmadura INT NULL,
    	PRIMARY KEY (ID_resultados)
);

ALTER TABLE Resultados ADD CONSTRAINT R_1 FOREIGN KEY (Id_rheroe) REFERENCES Heroe (Id_heroe);
ALTER TABLE Resultados ADD CONSTRAINT R_2 FOREIGN KEY (Id_ritem) REFERENCES Item (Id_item);
ALTER TABLE Resultados ADD CONSTRAINT R_3 FOREIGN KEY (Id_rroll) REFERENCES Roll (Id_roll);
ALTER TABLE Resultados ADD CONSTRAINT R_4 FOREIGN KEY (Id_rarmadura) REFERENCES Armadura (Id_armadura);