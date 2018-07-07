

SELECT users.username, songs.name, albums.name FROM users JOIN songs ON(


SELECT songs.title, albums.name, artists.name FROM songs JOIN albums JOIN artists ON(songs.album_id = albums.id && albums.artists_id = artists.id);

DB NAME classicsmodel.sql
ERD classicsmodel.jpg

********************************************************************************
SELECT <table>/<alias>.none.column FROM <table> <alias> WHERE <cond>;

CONDITIONS:
table/alias/none.column = <value> OR
table/alias/none.column LIKE <Pattern>

Example:

SELECT * FROM <table>; //selects all column from employees
SELECT <table>.<col> FROM <table> //selects a table to get the data from
alias
SELECT e.<col> FROM <table> //creates alias e for employees table

JOINS

SELECT <table1>.<col>, <table2>.<col> FROM <table1> (w/ alias) JOIN <table2> (w/ alias) ON <Joining Cond> WHERE <cond> // joining condition typical foreign/primary or any col common to both

Example:

SELECT users.name, playlists.playlist_id FROM users
JOIN playlists ON (users.id = playlists.user_id) 
WHERE (user_id = 1);

LIKE "<key>%" - any number of characters, "<key>_" -single characters, but can also be used depending on the number of _.
EXAMPLE:
SELECT boss.lastName AS bossLastName, 
boss.firstName AS bossFirstName, 
sub.firstName AS subLastName, 
sub.lastName AS subLastName 
FROM employees AS boss 
JOIN employees AS sub 
ON (boss.employeeNumber = sub.reportsTo) 
WHERE sub.firstName LIKE "A%"; //search items starting letter; 

LIMIT and ORDER BY <col> (ASC//this is default or DESC)
EXAMPLE:
SELECT customers.customerName FROM customers ORDER BY DESC LIMIT 5; //with limit
SELECT DISTINCT cu.country FROM customers cu ORDER BY cu.country ASC;


********************************************************************************
CREATE TABLE movie_casts (
	id INT AUTO_INCREMENT NOT NULL,
	title VARCHAR (255),
	year INT,
	star VARCHAR(255),
	PRIMARY KEY(id)
);

INSERT INTO movie_casts(title, year, star) VALUES ("Star Wars", 1977, "Carrie Fisher");
INSERT INTO movie_casts(title, year, star) VALUES ("Star Wars", 2015, "Carrie Fisher");
INSERT INTO movie_casts(title, year, star) VALUES ("Star Wars", 2015, "Daisy Ridley");
INSERT INTO movie_casts(title, year, star) VALUES ("Star Wars", 1977, "Harrison Fords");
INSERT INTO movie_casts(title, year, star) VALUES ("Star Wars", 2015, "Harrison Fords");

SELECT * FROM songs length DESC;

DISTINCT KEY WORD
SELECT DISTINCT year FROM movie_casts;


IN KEY WORD (=)
SELECT * FROM songs WHERE album_id IN (2, 3, 4);
//This is a shortcut for WHERE (val1 = col) OR (val2=col) OR (val3 = col);

ANY KEY WORD (val1, val2, val3) <, > THEN uses OR //used mostly by numbers
ALL KEYWORD (val1, val2, val3) <, > THEN uses AND // used mostly by anything
//IN and ALL is used mostly. ANY not so much

********************************************************************************
PROBLEM SET
RETRIEVING INFOS

SELECT customerName FROM customers WHERE country = "philippines"; Cruz and Sons Co;

SELECT contactLastName, contactFirstName FROM customers WHERE customerName = "La Rochelle Gifts"; Labrune Janine;

SELECT productName, MSRP FROM products WHERE productName = "The Titanic"; 100.17;

SELECT lastName, firstName, email FROM employees WHERE email = "jfirrelli@classicmodelcars.com";Firelli Jeff and Julie;

SELECT customerName FROM customers WHERE state IS NULL; 73 results;

SELECT email, lastName, firstName FROM employees WHERE firstName ="Steve" && lastName="Patterson"; spatterson@classicmodelcars.com;

SELECT customerName, country, creditLimit FROM customers WHERE country <> "USA" && creditLimit > 3000; 63 results;

SELECT productName, quantityInStock, productLine FROM products WHERE quantityInStock < 1000 || productLine = "Planes"; 22 results;

SELECT employees.firstName, employees.lastName, offices.city FROM employees JOIN offices ON(employees.officeCode=offices.officeCode) WHERE offices.city = "Tokyo";

SELECT customerName, employees.firstName, employees.lastName FROM customers JOIN employees ON (customers.salesRepEmployeeNumber = employees.employeeNumber) 
WHERE employees.firstname = "Leslie" && employees.lastName = "Thompson";

SELECT products.productName, customerName FROM products JOIN orderdetails JOIN orders JOIN customers 
ON (products.productCode = orderdetails.productCode && orderdetails.orderNumber = orders.orderNumber && orders.customerNumber = customers.customerNumber) 
WHERE customers.customerName = "Baane Mini Imports";

SELECT employees.lastName, employees.firstName, offices.country, customers.country FROM employees JOIN customers JOIN offices 
ON (customers.salesRepEmployeeNumber = employees.employeeNumber && offices.officeCode = employees.officeCode) WHERE (offices.country = customers.country);

SELECT boss.lastName AS bossLastName, boss.firstName AS bossFirstName, sub.firstName AS subLastName, sub.lastName AS subLastName FROM employees AS boss JOIN employees AS sub 
ON (boss.employeeNumber = sub.reportsTo) WHERE boss.firstName = "Anthony" && boss.lastName = "Bow";

SELECT boss.lastName AS bossLastName, boss.firstName AS bossFirstName, sub.firstName AS subLastName, sub.lastName AS subLastName FROM employees AS boss JOIN employees AS sub 
ON (boss.employeeNumber = sub.reportsTo) WHERE sub.firstName = "Anthony" && sub.lastName = "Bow"; 

*********************************************

*********************************************
LIKE
SELECT customers.customerName FROM customers WHERE customers.customerName NOT LIKE "A%";

SELECT cu.customerName, ord.comments FROM customers cu JOIN orders ord ON( cu.customerNumber = ord.customerNumber) WHERE ord.comments LIKE "%FedEx Ground%";

SELECT prod.productLine, prodl.textDescription FROM products prod JOIN productlines prodl ON (prod.productLine = prodl.productLine) WHERE prodl.textDescription 
LIKE "%state of the art%"; 

*********************************************

*********************************************
DISTINCT WITH ORDER BY

SELECT DISTINCT cu.country FROM customers cu ORDER BY cu.country ASC;

SELECT DISTINCT ord.status FROM orders ord ORDER BY ord.status ASC;

IN, ANY, ALL
SELECT cu.customerName, cu.country FROM customers cu WHERE cu.country IN ("USA", "FRANCE", "CANADA", "UK", "ITALY") ORDER BY cu.country ASC;
*********************************************

*********************************************
SUBQUERY
SELECT customerName, amount FROM customers WHERE customerNumber = 
(SELECT customerNumber FROM payments ORDER BY amount DESC LIMIT 1);

SELECT firstName, lastName FROM employees WHERE employeeNumber NOT IN (SELECT DISTINCT salesRepEmployeeNumber FROM customers WHERE salesRepEmployeeNumber IS NOT NULL);
*********************************************

*********************************************
AGGREGATES

SUM()
COUNT()
MAX()
MIN()
AVG()

SELECT DISTINCT COUNT(*) FROM movie_casts WHERE title= "Star Wars" && year = "2015";
SELECT SUM(amount) FROM payments;

GROUP BY <col> HAVING <condition>;
EXAMPLE:
SELECT COUNT(*) FROM customers GROUP BY country HAVING country = "UK";
SELECT customerNumber, SUM(amount) FROM payments GROUP BY customerNumber HAVING customerNumber IN (141, 103);
SELECT customerNumber, COUNT(customerNumber) FROM orders GROUP BY customerNumber ORDER BY COUNT(customerNumber) DESC LIMIT 10;
**********************************************
**********************************************
EXERCISE
GROUP BY
SELECT COUNT(quantityInStock), productLine FROM products GROUP BY productLine; 
SELECT (COUNT(customerNumber)) AS NumberOfClients, e.firstName, e.lastName FROM customers c JOIN employees e ON (c.salesRepEmployeeNumber = e.employeeNumber) 
GROUP BY salesRepEmployeeNumber ORDER BY NumberOfClients DESC;
**********************************************







