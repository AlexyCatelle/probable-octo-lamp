USE jointure_exo;

SELECT *
FROM
customers;

SELECT *
FROM
orders;

 -- 1. Récupérez la liste des noms de clients et la date de leurs commandes. Assurez-vous de n'afficher que les clients qui ont passé des commandes.
 
 SELECT
 customers.name,
 orders.order_date
 FROM
 customers
 JOIN
 orders
 ON 
 customers.id =orders.customer_id;
 
 -- 2. Affichez la liste des clients qui n'ont pas encore passé de commande.
 
 SELECT
 customers.id,
 customers.name
 FROM
 customers
 LEFT JOIN
 orders
  ON 
 customers.id =orders.customer_id
 WHERE
 orders.id IS NULL
 ;
 
 -- 3. Affichez la liste complète des clients, ainsi que les informations de leurs commandes s'ils en ont passées.
	-- Si un client n'a pas passé de commande, ses informations doivent tout de même être affichées.
 
 SELECT
customers.id,
customers.name,
customers.email,
customers.city,
orders.id,
orders.order_date,
orders.total_amount

 FROM
 customers
 LEFT JOIN
 orders
  ON 
 customers.id =orders.customer_id;

 -- 4. Quel est le total des montants des commandes par client ?
 SELECT 
 customers.name,
 SUM(total_amount) AS sum_total_amount
 FROM
 customers
 JOIN
 orders
 ON
 customers.id =orders.customer_id
 GROUP BY
 customers.id;