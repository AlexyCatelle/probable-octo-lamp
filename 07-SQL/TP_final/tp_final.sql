-- Étape 1 : Création de la Base de Données et des Tables
	-- 1. Créez une base de données appelée "tabletoptreasures_database".
 
		CREATE DATABASE IF NOT EXISTS tabletoptreasures_database;
		
        ALTER DATABASE tabletoptreasures_database
		CHARACTER SET utf8mb4
		COLLATE utf8mb4_unicode_ci;
 
	-- 2. À l'intérieur de cette base de données, créez les tables.

		CREATE TABLE Clients(
			ID INT PRIMARY KEY AUTO_INCREMENT,
			Nom VARCHAR(50) NOT NULL,
			Prenom VARCHAR(50) NOT NULL,
			Adresse_mail VARCHAR (50) NOT NULL,
			Adresse_de_livraison VARCHAR (200),
			Telephone VARCHAR(16)
			)
		;

		CREATE TABLE Categories(
			ID INT PRIMARY KEY AUTO_INCREMENT,
			Nom VARCHAR(50) NOT NULL
			)
		;

		CREATE TABLE Jeux(
			ID INT PRIMARY KEY AUTO_INCREMENT,
			Nom VARCHAR(50) NOT NULL,
			Description VARCHAR (500),
			Prix NUMERIC NOT NULL,
			ID_Categorie INT,
			FOREIGN KEY (ID_Categorie) REFERENCES Categories(ID)
			)
		;

		CREATE TABLE Commandes(
			ID INT PRIMARY KEY AUTO_INCREMENT,
			ID_Client INT NOT NULL,
			Date_de_commande TIMESTAMP NOT NULL,
			Adresse_de_livraison VARCHAR (200),
			Statut VARCHAR(50),
			FOREIGN KEY (ID_Client) REFERENCES Clients(ID)
			)
		;

-- Étape 2 : Opérations en DML
	-- 1. Insérez les enregistrements du fichier annexe dans les tables "Jeux",  "Categories" et "Clients".
    
		INSERT INTO 
			categories (Nom) 
		VALUES
			('Stratégie'),
			('Familial'),
			('Aventure')
		;
    
		INSERT INTO
			jeux (Nom, Description, Prix, ID_Categorie) 
		VALUES
			('Catan', 'Jeu de stratégie et de développement de colonies', 30, 1),
			('Dixit', 'Jeu d''association d''images', 25, 2),
			('Les Aventuriers', 'Jeu de plateau d''aventure', 40, 3),
			('Carcassonne', 'Jeu de placement de tuiles', 28, 1),
			('Codenames', 'Jeu de mots et d''indices', 20, 2),
			('Pandemic', 'Jeu de coopération pour sauver le monde', 35, 3),
			('7 Wonders', 'Jeu de cartes et de civilisations', 29, 1),
			('Splendor', 'Jeu de développement économique', 27, 2),
			('Horreur à Arkham', 'Jeu d''enquête et d''horreur', 45, 3),
			('Risk', 'Jeu de conquête mondiale', 22, 1),
			('Citadelles', 'Jeu de rôles et de bluff', 23, 2),
			('Terraforming Mars', 'Jeu de stratégie de colonisation de Mars', 55, 3),
			('Small World', 'Jeu de civilisations fantastiques', 32, 1),
			('7 Wonders Duel', 'Jeu de cartes pour 2 joueurs', 26, 2),
			('Horreur à l''Outreterre', 'Jeu d''aventure horrifique', 38, 3)
		;

		INSERT INTO
			clients (Nom, Prenom, Adresse_mail, Adresse_de_livraison, Telephone)
		VALUES
			('Dubois', 'Marie', 'marie.dubois@example.com', '123 Rue de la Libération, Ville', '+1234567890'),
			('Lefebvre', 'Thomas', 'thomas.lefebvre@example.com', '456 Avenue des Roses, Ville', '+9876543210'),
			('Martinez', 'Léa', 'lea.martinez@example.com', '789 Boulevard de la Paix, Ville', '+2345678901'),
			('Dupuis', 'Antoine', 'antoine.dupuis@example.com', '567 Avenue de la Liberté, Ville', '+3456789012'),
			('Morin', 'Camille', 'camille.morin@example.com', '890 Rue de l''Avenir, Ville', '+4567890123'),
			('Girard', 'Lucas', 'lucas.girard@example.com', '234 Avenue des Champs, Ville', '+5678901234'),
			('Petit', 'Emma', 'emma.petit@example.com', '123 Rue des Étoiles, Ville', '+6789012345'),
			('Sanchez', 'Gabriel', 'gabriel.sanchez@example.com', '345 Boulevard du Bonheur, Ville', '+7890123456'),
			('Rossi', 'Clara', 'clara.rossi@example.com', '678 Avenue de la Joie, Ville', '+8901234567'),
			('Lemoine', 'Hugo', 'hugo.lemoine@example.com', '456 Rue de la Nature, Ville', '+9012345678'),
			('Moreau', 'Eva', 'eva.moreau@example.com', '789 Avenue de la Créativité, Ville', '+1234567890'),
			('Fournier', 'Noah', 'noah.fournier@example.com', '234 Rue de la Découverte, Ville', '+2345678901'),
			('Leroy', 'Léa', 'lea.leroy@example.com', '567 Avenue de l''Imagination, Ville', '+3456789012'),
			('Robin', 'Lucas', 'lucas.robin@example.com', '890 Rue de la Création, Ville', '+4567890123'),
			('Marchand', 'Anna', 'anna.marchand@example.com', '123 Boulevard de l''Innovation, Ville', '+5678901234')
		;

	-- 2. Effectuez trois commandes en insérant une nouvelle entrée dans la table 
	-- "Commandes". Assurez-vous d'inclure l'ID du client (créé précédemment), la 
	-- date de commande, l'adresse de livraison et le statut de la commande.
 
		INSERT INTO
			commandes (ID_Client, Date_de_commande, Adresse_de_livraison, Statut)
		VALUES
			(4, '2025-05-01 10:30:00', '123 Rue des Lilas, Paris', 'En cours'),
			(7, '2025-05-02 15:45:00', '78 Avenue du Général, Lyon', 'Livrée'),
			(1, '2025-05-03 09:00:00', '5 Impasse des Oliviers, Marseille', 'Annulée')
		;
    
    -- 3. Mettez à jour le prix du jeu avec l'ID 3 (Les Aventuriers) pour le fixer à 35 €.
    
		UPDATE
			jeux
		SET
			prix = 35
		WHERE
			ID = 3
		;

	-- 4. Supprimez le jeu avec l'ID 2 (Dixit) de la table "Jeux".
    
		DELETE FROM
			jeux
		WHERE
			ID=2
		;
        
-- Étape 3 : Requêtes SQL simples
-- Table "Categories" :
	-- 1. Sélectionnez tous les noms de catégories distinctes.
    
		SELECT 
			Nom
		FROM
			categories
            ;
            
    -- 2. Montrez les catégories avec des noms commençant par "A" ou "S".
    
		SELECT
			Nom
		FROM
			categories
		WHERE
			Nom LIKE 'A%'
            OR
            Nom LIKE 'S%'
        ;
        
    -- 3. Quelles catégories ont un ID entre 2 et 5 inclus ?
    
		SELECT
			Nom
		FROM
			categories
		WHERE
			ID BETWEEN 2 AND 5
		;
     
    -- 4. Combien de catégories différentes existent ?
    
		SELECT
			COUNT(ID) AS total_categories
		FROM
			categories
        ;
        
    -- 5. Quelle est la catégorie ayant le nom le plus long ?
    
		SELECT
			Nom
		FROM
			categories
		ORDER BY 
			LENGTH(nom) DESC
		LIMIT 1
        ;
    
    -- 6. Montrez le nombre de jeux dans chaque catégorie.
    
		SELECT
			categories.nom AS nom_categorie,
			COUNT(jeux.ID) AS total_jeux
		FROM
			jeux
		JOIN
			categories 
		ON 
			jeux.ID_Categorie = categories.ID
		GROUP BY
			categories.nom
		ORDER BY
			total_jeux DESC
		;

    -- 7. Affichez les catégories triées par ordre alphabétique inversé.
    
		SELECT
			Nom
		FROM
			categories
		ORDER BY
			Nom DESC
		;
    
    -- Table "Jeux" :
	-- 1. Sélectionnez tous les noms de jeux distincts.
    
		SELECT
			Nom
		FROM
			jeux
		;
    
    -- 2. Montrez les jeux avec un prix entre 25 et 40.
    
		SELECT
			Nom,
			Prix
		FROM
			jeux
		WHERE
			prix BETWEEN 25 AND 40
        ;
        
    -- 3. Quels jeux appartiennent à la catégorie avec l'ID 3 ?
    
		SELECT
			Nom
		FROM
			Jeux
		WHERE
			ID_Categorie = 3
		;
    
    -- 4. Combien de jeux ont une description contenant le mot "aventure" ?
    
		SELECT
			COUNT(ID) AS total_aventure
		FROM
			jeux
		WHERE
			Description LIKE '%aventure%'
		;
    
    -- 5. Quel est le jeu le moins cher ?
    
		SELECT
			Nom,
			Prix
		FROM
			jeux
		ORDER BY
			Prix ASC
		LIMIT 1
		;
        
    -- 6. Montrez la somme totale des prix de tous les jeux.
    
		SELECT
			SUM(Prix) AS total_prix_jeux
		FROM
			jeux
		;
    
    -- 7. Affichez les jeux triés par ordre alphabétique des noms en limitant les résultats à 5.
    
		SELECT
			Nom
		FROM
			jeux
		ORDER BY
			Nom ASC
		LIMIT 5
		;
    
    	-- Table "Clients" :
	-- 1. Sélectionnez tous les prénoms des clients distincts.
    
		SELECT
			Prenom
		FROM
			clients
		;
        
    -- 2. Montrez les clients dont l'adresse contient "Rue" et dont le numéro de téléphone commence par "+1".
    
		SELECT
			*
		FROM
			clients
		WHERE
			Adresse_de_livraison LIKE '%Rue%'
			OR 
			Telephone LIKE '+1%'
		;
    
    -- 3. Quels clients ont un nom commençant par "M" ou "R" ?
    
		SELECT
			*
		FROM
			clients
		WHERE
			Nom LIKE 'R%'
			OR 
			Nom LIKE 'M%'
		;

    -- 4. Combien de clients ont une adresse e-mail valide (contenant "@") ?
    
		SELECT
			COUNT(ID) AS total_email_valide
		FROM
			clients
		WHERE
			Adresse_mail LIKE '%@%'
		;
        
    -- 5. Quel est le prénom le plus court parmi les clients ?
    
    		SELECT
				Prenom
			FROM
				clients
			ORDER BY 
				LENGTH(Prenom) ASC
			LIMIT 1
        ;
        
    -- 6. Montrez le nombre total de clients enregistrés.
		
        SELECT
			COUNT(ID) AS total_clients
		FROM
			clients
		;
        
    -- 7. Affichez les clients triés par ordre alphabétique des noms de famille, mais en excluant les premiers 3.
    
		SELECT
			Nom,
            Prenom
		FROM
			clients
		ORDER BY
			Nom ASC
		LIMIT 100
        OFFSET 3
        ;
        
        	-- Étape 4 : Requêtes SQL avancées
	-- 1. Sélectionnez les noms des clients, noms de jeux et date de commande pour chaque commande passée.
		
		CREATE TABLE liste_jeux_commandes (
			ID_commande INT NOT NULL,
			ID_jeu INT NOT NULL,
			Quantite INT DEFAULT 1,
			PRIMARY KEY (ID_commande, ID_jeu),
			FOREIGN KEY (ID_commande) REFERENCES Commandes(ID),
			FOREIGN KEY (ID_jeu) REFERENCES Jeux(ID)
);
		
			INSERT INTO
				liste_jeux_commandes (ID_commande, ID_jeu, Quantite)
			VALUES
				(1, 3, 1),
				(1, 7, 2),
                (2, 5, 1)
			;
    
		SELECT
			c.Nom AS Nom_Client,
			c.Prenom AS Prenom_Client,
			j.Nom AS Nom_Jeu,
			cmd.Date_de_commande
		FROM
			clients c
		JOIN
			commandes cmd ON c.ID = cmd.ID_client
		JOIN
			liste_jeux_commandes lc ON cmd.ID = lc.ID_commande
		JOIN
			jeux j ON lc.ID_Jeu = j.ID
		ORDER BY
			cmd.Date_de_commande DESC;
    
    -- 2. Sélectionnez les noms des clients et le montant total dépensé par chaque client. Triez les résultats par montant total décroissant.
		SELECT
			clients.Nom AS Nom,
            clients.Prenom AS Prenom,
            SUM(jeux.Prix * liste_jeux_commandes.Quantite) AS depenses_total
		FROM
			clients
		JOIN
			commandes
            ON
            clients.ID = commandes.ID_client
		JOIN
			liste_jeux_commandes
            ON
            commandes.ID = liste_jeux_commandes.ID_commande
		JOIN
			jeux
            ON
            liste_jeux_commandes.ID_jeu = jeux.ID
		GROUP BY
			clients.ID
		ORDER BY
			depenses_total
		;
        
    -- 3. Sélectionnez les noms des jeux, noms de catégories et prix de chaque jeu.
    
		SELECT
			jeux.Nom AS Nom,
            categories.Nom AS Categorie,
            jeux.prix AS prix
		FROM
			jeux
		JOIN
			categories
		ON
			jeux.ID_categorie = categories.ID
		;
            
    -- 4. Sélectionnez les noms des clients, date de commande et noms de jeux pour toutes les commandes passées.
    
		SELECT
			clients.Nom AS Nom_Client,
			clients.Prenom AS Prenom_Client,
			commandes.Date_de_commande,
			jeux.Nom AS Nom_Jeu
		FROM
			clients
		JOIN
			commandes
            ON 
            clients.ID = commandes.ID_client
		JOIN
			liste_jeux_commandes
            ON
            commandes.ID = liste_jeux_commandes.ID_commande
		JOIN
			jeux
            ON 
            liste_jeux_commandes.ID_jeu = jeux.ID
		ORDER BY
			commandes.Date_de_commande DESC
		;
    
    -- 5. Sélectionnez les noms des clients, nombre total de commandes par client et montant total dépensé par client.
		-- Incluez uniquement les clients ayant effectué au moins une commande.
        
        SELECT
			clients.Nom AS Nom_Client,
			clients.Prenom AS Prenom_Client,
			COUNT(DISTINCT commandes.ID) AS Nombre_Commandes,
			SUM(jeux.Prix * liste_jeux_commandes.Quantite) AS Montant_Total
		FROM
			clients
		JOIN
			commandes
            ON
            clients.ID = commandes.ID_Client
		JOIN
			liste_jeux_commandes
            ON
            commandes.ID = liste_jeux_commandes.ID_commande
		JOIN
			jeux
            ON
            liste_jeux_commandes.ID_jeu = jeux.ID
		GROUP BY
			clients.ID
		HAVING
			Nombre_Commandes > 0
		ORDER BY
			Montant_Total DESC
		;
    