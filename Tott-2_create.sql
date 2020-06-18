-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-06-16 09:52:50.832

-- tables
-- Table: ARVE
CREATE TABLE ARVE (
    arve_id int NOT NULL AUTO_INCREMENT,
    kuupaev date NOT NULL,
    ISIK_isik_id int NOT NULL,
    CONSTRAINT ARVE_pk PRIMARY KEY (arve_id)
);

-- Table: ARVE_RIDA
CREATE TABLE ARVE_RIDA (
    ARVE_arve_id int NOT NULL,
    TALU_TOODE_talu_toote_id int NOT NULL,
    arve_rida_id int NOT NULL AUTO_INCREMENT,
    summa decimal(12,2) NOT NULL,
    kogus int NOT NULL,
    CONSTRAINT ARVE_RIDA_pk PRIMARY KEY (arve_rida_id)
);

-- Table: ISIK
CREATE TABLE ISIK (
    isik_id int NOT NULL AUTO_INCREMENT,
    email varchar(255) NOT NULL,
    myyja bool NOT NULL DEFAULT 0,
    eesnimi varchar(255) NULL,
    perenimi varchar(255) NULL,
    google_id varchar(255) NOT NULL,
    kapp varchar(255) NULL,
    CONSTRAINT ISIK_pk PRIMARY KEY (isik_id)
);

-- Table: TALU
CREATE TABLE TALU (
    talu_id int NOT NULL AUTO_INCREMENT,
    nimi varchar(255) NOT NULL,
    aadress varchar(255) NULL,
    email varchar(255) NOT NULL,
    CONSTRAINT TALU_pk PRIMARY KEY (talu_id)
);

-- Table: TALU_TOODE
CREATE TABLE TALU_TOODE (
    talu_toote_id int NOT NULL AUTO_INCREMENT,
    kogus int NOT NULL,
    TALU_talu_id int NOT NULL,
    TOODE_toote_id int NOT NULL,
    CONSTRAINT TALU_TOODE_pk PRIMARY KEY (talu_toote_id)
);

-- Table: TOODE
CREATE TABLE TOODE (
    toote_id int NOT NULL AUTO_INCREMENT,
    kategooria varchar(255) NOT NULL,
    nimi varchar(255) NOT NULL,
    hind decimal(12,2) NOT NULL,
    yhik_kg_mitte_tk bool NOT NULL,
    pilt varchar(255) NOT NULL,
    CONSTRAINT TOODE_pk PRIMARY KEY (toote_id)
);

-- foreign keys
-- Reference: ARVE_ISIK (table: ARVE)
ALTER TABLE ARVE ADD CONSTRAINT ARVE_ISIK FOREIGN KEY ARVE_ISIK (ISIK_isik_id)
    REFERENCES ISIK (isik_id);

-- Reference: ARVE_RIDA_ARVE (table: ARVE_RIDA)
ALTER TABLE ARVE_RIDA ADD CONSTRAINT ARVE_RIDA_ARVE FOREIGN KEY ARVE_RIDA_ARVE (ARVE_arve_id)
    REFERENCES ARVE (arve_id);

-- Reference: ARVE_RIDA_TALU_TOODE (table: ARVE_RIDA)
ALTER TABLE ARVE_RIDA ADD CONSTRAINT ARVE_RIDA_TALU_TOODE FOREIGN KEY ARVE_RIDA_TALU_TOODE (TALU_TOODE_talu_toote_id)
    REFERENCES TALU_TOODE (talu_toote_id);

-- Reference: TALU_TOODE_TALU (table: TALU_TOODE)
ALTER TABLE TALU_TOODE ADD CONSTRAINT TALU_TOODE_TALU FOREIGN KEY TALU_TOODE_TALU (TALU_talu_id)
    REFERENCES TALU (talu_id);

-- Reference: TALU_TOODE_TOODE (table: TALU_TOODE)
ALTER TABLE TALU_TOODE ADD CONSTRAINT TALU_TOODE_TOODE FOREIGN KEY TALU_TOODE_TOODE (TOODE_toote_id)
    REFERENCES TOODE (toote_id);

-- End of file.

