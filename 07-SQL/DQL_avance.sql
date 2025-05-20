USE exo_dql_avance;

SHOW TABLES;

SELECT * FROM employees;

-- QUESTION 1. Extraction basique des informations
-- Affichez le prénom, le nom de famille et la date de naissance de tous les employés nés en décembre.
 
 SELECT
	first_name,
	last_name,
	birth_date
 FROM
	employees
 WHERE
	DATE_FORMAT(birth_date,'%m') ='12'
 ;
 
-- QUESTION 2. Formatage des dates
-- Récupérez la date d'embauche de chaque employé, en la formatant sous la forme "Jour(lettres), Jour Mois Année" (ex. : "Monday, 01 January 2023").

SELECT
	first_name,
	last_name,
	DATE_FORMAT(hire_date, '%W, %d %M %Y') AS hire_date_format
FROM
	employees
;
 
-- QUESTION 3. Calculs basés sur les dates
-- Affichez le prénom, le nom de famille et l’âge de chaque employé. Utilisez une fonction pour calculer l’âge (en années).

SELECT
	first_name,
    last_name,
    TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age
FROM
	employees
;

-- QUESTION 4. Requêtes filtrées
-- Trouvez les employés dont le salaire est supérieur à la moyenne des salaires de tous les employés. Affichez leur prénom, nom, département et salaire.

SELECT
	first_name,
    last_name,
    department,
    salary
FROM
	employees
WHERE
	salary > (
		SELECT 
			AVG(salary)
		FROM
			employees
	)
;

-- QUESTION 5. Analyse des salaires
-- Calculez le salaire moyen de chaque département, puis filtrez pour afficher uniquement les départements où le salaire moyen est supérieur à 3000.

SELECT
	department,
	AVG(salary) AS salaire_moyen
FROM
	employees
GROUP BY
	department
HAVING
	salaire_moyen > 3000
;

-- QUESTION 6. Comparaison de dates
-- Affichez les projets qui se sont terminés avant la fin de l'année 2022 en indiquant le nom du projet et le nombre de jours écoulés depuis la fin du projet.

SELECT 
	name,
    TIMESTAMPDIFF(DAY, end_date, CURDATE()) AS fini_depuis_J
FROM
	projects
WHERE
	end_date < CURDATE()
;

-- QUESTION 7. Groupement de données
-- Affichez pour chaque ville le nombre d’employés et le salaire moyen. Affichez les villes ayant au moins 5 employés et un salaire moyen supérieur à 3500.

SELECT
	city,
	COUNT(id) AS nombre_employees,
    AVG(salary) AS salaire_moyen
FROM
	employees
GROUP BY
	city
HAVING
	nombre_employees > 5
    AND
    salaire_moyen > 3500
;
	
-- QUESTION 8. Sous-requêtes
-- Affichez les employés ayant un salaire supérieur à la moyenne de leur propre département. Affichez leur prénom, nom, département et salaire.

SELECT
	first_name,
    last_name,
    department,
    salary
FROM
	employees e
WHERE
	salary > (
            SELECT AVG(salary)
        FROM employees
        WHERE department = e.department
    );

-- QUESTION 9. Opérations avec les dates
-- Utilisez DATE_ADD() pour calculer la date de fin d’une période de probation de 6 mois après la date d’embauche pour chaque employé et affichez les employés dont cette date est passée.
 
SELECT
	first_name,
	last_name,
	DATE_ADD(hire_date, INTERVAL 6 MONTH) AS end_probie
FROM
	employees
HAVING
	end_probie < CURDATE()
;

-- QUESTION 10. Travail avec les formats de date en français
-- Modifiez la langue du mois et du jour pour les employés de la table Employees. Affichez la date de naissance des employés en français, avec le format "Jour Mois Année" (ex. "5 février 1988")

SHOW VARIABLES LIKE 'lc_time_names';

SET lc_time_names='fr_FR';

SELECT
	first_name,
	last_name,
	DATE_FORMAT(birth_date, '%d %M %Y') AS date_naissance
FROM
	employees
;