-- 1. List all customers.

SELECT LPAD(`CustomerID`,6,0) AS "CustomerID" FROM `Customer`;
 

-- 2. List staff forenames, surnames and their role.

SELECT `Forename`, `Surname`, `Role` FROM `StaffMember`;
 

-- 3. List the description and price of Items that cost less than £1.60.

SELECT `Name`, CONCAT("£",`Price`) AS "Price"
FROM  `Provision` WHERE `Price` < 1.6;
 

-- 4. List staff members whose surname is Robertson.

SELECT `Forename`, `Surname`, `Role` FROM  `StaffMember`
WHERE `Surname` = "Robertson";
 

-- 5. List all orders that are paid for by cash.

SELECT `OrderID`, `OrderTime`, `GroupSize`
FROM  `Order` WHERE `PaymentType` = "Cash";
 

-- 6. Count how many orders were taken in total in October.

SELECT COUNT(`OrderID`) AS "October Orders" FROM `Order` WHERE
`OrderTime` > "2020-09-30 23:59:59" AND `OrderTime` < "2020-11-01 00:00:00";
 

-- 7. List the Order ID, and staff first name and surname where the order payment type was card.

SELECT DISTINCT `OrderID`,`Forename`,`Surname` FROM `Order` INNER JOIN `StaffMember`
ON `Order`.`StaffMemberID` = `StaffMember`.`StaffMemberID`
WHERE `PaymentType` = "Card";
 

-- 8. List the average price of all items.

SELECT CONCAT("£",FORMAT(AVG(`Price`),2)) AS "Average price" FROM `Provision`;
 

-- 9. List all stock items where stock quantity is less than 120.

SELECT `ProvisionID`, `Name`, `StockLevel` FROM `Provision` WHERE `StockLevel` < 120;
 

-- 10. List all customers and indicate what payment type they have used to place an order.  List these by cash, then by card.

SELECT DISTINCT LPAD(`CustomerID`,6,0) AS "CustomerID",
`PaymentType`, `OrderID` FROM `Order`
ORDER BY `PaymentType` DESC;
 

-- 11. Using an appropriate JOIN, list the customers who have placed an order.

SELECT DISTINCT LPAD(`Order`.`CustomerID`,6,0) AS "CustomerID"
FROM  `Order` INNER JOIN `Customer`
ON `Order`.`CustomerID` = `Customer`.`CustomerID`;
 

-- 12. Using an appropriate JOIN, list the staff managers who have taken cash orders.

SELECT DISTINCT `Forename`, `Surname`
FROM  `Order` INNER JOIN `StaffMember`
ON `Order`.`StaffMemberID` = `StaffMember`.`StaffMemberID`
WHERE `PaymentType` = "Cash" AND `StaffMember`.`Role` = "Manager";
 

-- 13. List the customers, orders, payment type and the staff who have taken their orders.  Order by payment type. Demonstrate the use of an ALIAS.

SELECT DISTINCT LPAD(`CustomerID`,6,0) AS "CustomerID",
`OrderID`, `OrderTime`, `PaymentType`,
CONCAT(`Forename`," ",`Surname`)  AS "Staff Member"
FROM `Order` INNER JOIN `StaffMember`
ON `StaffMember`.`StaffMemberID` = `Order`.`StaffMemberID`
ORDER BY `PaymentType`;
 

-- 14. Create a View called [Cash Orders] that lists all the orders paid by cash.

CREATE OR REPLACE VIEW `Cash Orders` AS
SELECT `OrderID`, `OrderTime`, `GroupSize`
FROM  `Order` WHERE `PaymentType` = "Cash";
SELECT * FROM `Cash Orders`;