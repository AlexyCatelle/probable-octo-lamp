CREATE DATABASE IF NOT EXISTS fake_streaming
;

ALTER DATABASE ma_base_de_donnees
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
  ;
  
CREATE TABLE utilisateurs 
(
id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
nom_utilisateur VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
date_inscription DATE NOT NULL,
pays VARCHAR(50) NOT NULL
)
;

CREATE TABLE Chansons
(
id_chanson INT PRIMARY KEY AUTO_INCREMENT,
titre VARCHAR(50) NOT NULL,
artiste VARCHAR(50) NOT NULL,
album VARCHAR(50) NOT NULL,
durée TIME NOT NULL,
genre VARCHAR(50) DEFAULT 'Non spécifié',
année_sortie YEAR NOT NULL
)
;

CREATE TABLE playlists
(
id_playlist INT PRIMARY KEY AUTO_INCREMENT,
nom_playlist VARCHAR(50) NOT NULL,
date_creation DATE NOT NULL,
FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
)
;

DROP DATABASE IF EXISTS fake_streaming;