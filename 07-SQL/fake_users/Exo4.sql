USE formation_sql;

-- QUESTION 1

SELECT 
last_name,
first_name
FROM
users
WHERE
last_name
LIKE
's%'
ORDER BY 
last_name ASC
LIMIT 5
;

-- QUESTION 2

SELECT *
FROM
products
WHERE
description is NULL
;

-- QUESTION 3

SELECT *
FROM products
WHERE
stock <20
ORDER BY stock DESC
;

-- QUESTION 4

SELECT *
FROM
products
WHERE
product_name
LIKE
'%phone%'
;

-- QUESTION 5

SELECT *
FROM
products
WHERE 
price IS NULL
;

-- QUESTION 6

SELECT 
*,
price - 50 AS 'marge'
FROM 
products
WHERE
price <= 500
;

-- QUESTION 7

SELECT 
*,
ROUND(price * 1.15) AS 'new_price'
FROM
products
;

-- QUESTION 8

SELECT
product_name,
price,
MOD(price,100) AS 'MOD_price',
SQRT(price) AS 'SQUARE_price',
POWER(price,3) AS 'POWER3_price',
ROUND(price) AS 'ROUND_price',
FLOOR(price) AS 'FLOOR_price',
CEIL(price) AS 'CEIL_price'
FROM
products
;