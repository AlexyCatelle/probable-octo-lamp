USE formation_sql;

SELECT first_name,
last_name
FROM users
WHERE job IN("Engineer","Developper")
AND
birth_location IN('Londres','Paris','Berlin')
AND
age 
BETWEEN
25
AND
35
AND
salary >= 2500
;

SELECT first_name,
last_name,
age
FROM
users
ORDER BY
age DESC
LIMIT 5;

SELECT first_name,
last_name
FROM
users
ORDER BY
last_name ASC
LIMIT 5
OFFSET 5;

SELECT first_name,
last_name,
salary
FROM
users
ORDER BY
salary DESC
LIMIT 3;

