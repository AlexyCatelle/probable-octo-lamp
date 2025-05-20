USE formation_sql;

SELECT
last_name,
first_name
FROM
users
WHERE
first_name
LIKE
'd%'
ORDER BY last_name ASC;


SELECT
last_name,
first_name
FROM
users
WHERE
last_name
LIKE
'%son'
ORDER BY
last_name ASC;

SELECT
last_name,
first_name
FROM
users
WHERE
first_name
LIKE
'_____'
ORDER BY
last_name ASC;

SELECT
last_name,
first_name,
job
FROM
users
WHERE
job
LIKE
'%doctor%'
ORDER BY
last_name ASC;
