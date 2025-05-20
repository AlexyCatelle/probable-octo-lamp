USE formation_sql;
 
DROP VIEW employee_departments;
DROP VIEW hight_earners;
 
SELECT * from departments;
-- 1. Créez une vue appelée employee_departments qui affiche le prénom, le nom et le nom du département de chaque employé.

CREATE VIEW
	employee_departments AS
SELECT
	employees.first_name AS Prénom,
	employees.last_name AS Nom,
	departments.name AS Département
FROM
	employees
JOIN
	departments
ON
	employees.department = departments.id
ORDER BY 
	Nom
;
 
-- 2. Testez la vue en affichant tout son contenu

SELECT
	*
FROM
	employee_departments
ORDER BY
	Nom
;
 
-- 3. Créez une nouvelle requête qui sélectionne tous les employés travaillant dans le département "Sales",
-- en utilisant la vue employee_departments au lieu de réécrire une jointure complexe.

SELECT
	*
FROM
	employee_departments
WHERE
	Département = "Sales"
ORDER BY
	Nom
;

-- 4. Exercice supplémentaire : Vous voulez maintenant une liste de tous les employés ayant un salaire
-- supérieur à 50 000, et la vue employee_departments ne contient pas la colonne salary. Créez une
-- nouvelle vue appelée high_earners qui réutilise les informations de employee_departments et y
-- ajoute une condition pour inclure seulement les employés avec un salaire supérieur à 50 000.
 
CREATE VIEW
	hight_earners AS
SELECT
    ed.Prénom,
    ed.Nom,
    ed.Département,
    e.salary
FROM
    employee_departments ed
JOIN
    employees e ON ed.Prénom = e.first_name AND ed.Nom = e.last_name
WHERE
    e.salary > 50000
ORDER BY
	Nom
;
 
SELECT
	* 
FROM 
	hight_earners
    ;