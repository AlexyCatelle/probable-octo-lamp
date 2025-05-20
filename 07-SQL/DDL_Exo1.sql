CREATE DATABASE IF NOT EXISTS fake_library
;

 ALTER DATABASE fake_library
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci
  ;

-- TABLE "LIVRES"

CREATE TABLE livres
(
id_livre INT PRIMARY KEY,
titre VARCHAR(200) NOT NULL,
auteur VARCHAR(50) NOT NULL,
année_publication YEAR,
genre VARCHAR(50) NOT NULL,
exemplaires_disponibles TINYINT NOT NULL
)
;
-- TABLE "MEMBRES"

CREATE TABLE membres
(
id_membre INT PRIMARY KEY,
nom VARCHAR(50) NOT NULL,
prenom  VARCHAR(50) NOT NULL,
date_naissance DATE,
adresse  VARCHAR(200),
email VARCHAR(50),
téléphone VARCHAR(16)
)
;

DROP DATABASE IF EXISTS fake_library;
