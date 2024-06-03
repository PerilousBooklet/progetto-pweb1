 CREATE TABLE `Regione` (
    `codice` int NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`codice`)
);

CREATE TABLE `Provincia` (
    `sigla` VARCHAR(255) NOT NULL,
    `regione` int NOT NULL,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`sigla`)
);

CREATE TABLE `Comune` (
    `codice` VARCHAR(255) NOT NULL,
    `provincia` VARCHAR(255) NOT NULL,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`codice`)
);

CREATE TABLE `Autostrada` (
    `cod_naz` VARCHAR(255) NOT NULL,
    `cod_eu` VARCHAR(255) NOT NULL,
    `nome` VARCHAR(255) NOT NULL,
    `lunghezza` int NOT NULL,
    PRIMARY KEY (`cod_naz`)
);

CREATE TABLE `Casello` (
    `codice` int NOT NULL AUTO_INCREMENT,
    `cod_naz` VARCHAR(255) NOT NULL,
    `comune` VARCHAR(255) NOT NULL,
    `nome` VARCHAR(255) NOT NULL,
    `x` double NOT NULL,
    `y` double NOT NULL,
    `is_automatico` bool NOT NULL,
    `data_automazione` DATE NOT NULL,
    PRIMARY KEY (`codice`)
);

ALTER TABLE `Provincia` ADD CONSTRAINT `Provincia_fk0` FOREIGN KEY (`regione`) REFERENCES `Regione`(`codice`);

ALTER TABLE `Comune` ADD CONSTRAINT `Comune_fk0` FOREIGN KEY (`provincia`) REFERENCES `Provincia`(`sigla`);

ALTER TABLE `Casello` ADD CONSTRAINT `Casello_fk0` FOREIGN KEY (`cod_naz`) REFERENCES `Autostrada`(`cod_naz`);

ALTER TABLE `Casello` ADD CONSTRAINT `Casello_fk1` FOREIGN KEY (`comune`) REFERENCES `Comune`(`codice`);