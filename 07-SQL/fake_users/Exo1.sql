SHOW DATABASES;

USE formation_sql;

SHOW tables;

SELECT 
first_name,
last_name,
job,
birth_location,
salary
FROM users
WHERE
birth_location = 'New York'
AND
salary >= 3000
AND
salary <= 3500
AND NOT
(job='Doctor'
OR
job='Lawyer');