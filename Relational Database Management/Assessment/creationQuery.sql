-- -----------------------------------------------------
-- Create Tables
-- -----------------------------------------------------


-- PaymentType Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PaymentType` (
  -- Define field
  `PaymentType` VARCHAR(10) NOT NULL,


  -- Define primary key
  PRIMARY KEY (`PaymentType`));
-- -----------------------------------------------------


-- ProvisionType Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProvisionType` (
  -- Define field
  `ProvisionType` VARCHAR(10) NOT NULL,


  -- Define primary key
  PRIMARY KEY (`ProvisionType`));
-- -----------------------------------------------------

-- SubMenu Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SubMenu` (
  -- Define field
  `SubMenu` VARCHAR(30) NOT NULL,


  -- Define primary key
  PRIMARY KEY (`SubMenu`));
-- -----------------------------------------------------

-- Role Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Role` (
  -- Define field
  `Role` VARCHAR(30) NOT NULL,


  -- Define primary key
  PRIMARY KEY (`Role`));
-- -----------------------------------------------------


-- Customer Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Customer` (
  -- Define fields
  `CustomerID` INT NOT NULL,
  `ContactNumber` VARCHAR(20) NOT NULL,


  -- Define primary key
  PRIMARY KEY (`CustomerID`));
-- -----------------------------------------------------


-- StaffMember Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `StaffMember` (
  -- Define fields
  `StaffMemberID` INT NOT NULL AUTO_INCREMENT,
  `Forename` VARCHAR(45) NOT NULL,
  `Surname` VARCHAR(45) NOT NULL,
  `Role` VARCHAR(30) NOT NULL,


  -- Define primary key
  PRIMARY KEY (`StaffMemberID`),

  CONSTRAINT `fk_StaffMember_Role`
    FOREIGN KEY (`Role`)
    REFERENCES `Role` (`Role`));
-- -----------------------------------------------------


-- Provision Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Provision` (
  -- Define fields
  `ProvisionID` INT NOT NULL AUTO_INCREMENT,
  `StockLevel` SMALLINT NOT NULL,
  `Name` VARCHAR(50) NOT NULL,
  `Price` DECIMAL(5,2) NOT NULL,
  `SubMenu` VARCHAR(30) NOT NULL,
  `ProvisionType` VARCHAR(10) NOT NULL,


  -- Define primary and foreign keys
  PRIMARY KEY (`ProvisionID`, `ProvisionType`),

  CONSTRAINT `fk_Provision_ProvisionType`
    FOREIGN KEY (`ProvisionType`)
    REFERENCES `ProvisionType` (`ProvisionType`),

  CONSTRAINT `fk_Provision_SubMenu`
    FOREIGN KEY (`SubMenu`)
    REFERENCES `SubMenu` (`SubMenu`));
-- -----------------------------------------------------


-- Order Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Order` (
  -- Define fields
  `OrderID` INT NOT NULL AUTO_INCREMENT,
  `StaffMemberID` INT NOT NULL,
  `CustomerID` INT NOT NULL,
  `PaymentType` VARCHAR(10) NOT NULL,
  `OrderTime` DATETIME NOT NULL,
  `GroupSize` SMALLINT NOT NULL,


  -- Define primary and foreign keys
  PRIMARY KEY (`OrderID`, `PaymentType`, `CustomerID`, `StaffMemberID`),

  CONSTRAINT `fk_Order_PaymentType`
    FOREIGN KEY (`PaymentType`)
    REFERENCES `PaymentType` (`PaymentType`),

  CONSTRAINT `fk_Order_Customer`
    FOREIGN KEY (`CustomerID`)
    REFERENCES `Customer` (`CustomerID`),

  CONSTRAINT `fk_Order_StaffMember`
    FOREIGN KEY (`StaffMemberID`)
    REFERENCES `StaffMember` (`StaffMemberID`));
-- -----------------------------------------------------


-- OrderEntry Table
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrderEntry` (
  -- Define fields
  `ProvisionID` INT NOT NULL,
  `OrderID` INT NOT NULL,
  `Quantity` SMALLINT NOT NULL,


  -- Define primary and foreign keys
  PRIMARY KEY (`ProvisionID`, `OrderID`),

  CONSTRAINT `fk_OrderEntry_Provision`
    FOREIGN KEY (`ProvisionID`)
    REFERENCES `Provision` (`ProvisionID`),

  CONSTRAINT `fk_OrderEntry_Order`
    FOREIGN KEY (`OrderID`)
    REFERENCES `Order` (`OrderID`));
-- -----------------------------------------------------




-- -----------------------------------------------------
-- Insert Data
-- -----------------------------------------------------


-- Payment Type Data
-- -----------------------------------------------------
INSERT INTO `PaymentType` VALUES ("Cash");
INSERT INTO `PaymentType` VALUES ("Card");
-- -----------------------------------------------------


-- ProvisionType Data
-- -----------------------------------------------------
INSERT INTO `ProvisionType` VALUES ("Food");
INSERT INTO `ProvisionType` VALUES ("Drink");
-- -----------------------------------------------------


-- SubMenu Data
-- -----------------------------------------------------
INSERT INTO `SubMenu` VALUES ("Special Menu");
INSERT INTO `SubMenu` VALUES ("Standard Menu");
INSERT INTO `SubMenu` VALUES ("Veggie Menu");
-- -----------------------------------------------------


-- Role Data
-- -----------------------------------------------------
INSERT INTO `Role` VALUES ("Cook");
INSERT INTO `Role` VALUES ("Manager");
INSERT INTO `Role` VALUES ("Sales");
-- -----------------------------------------------------


-- Customer Data
-- -----------------------------------------------------
INSERT INTO `Customer` VALUES (333,"07741511271");
INSERT INTO `Customer` VALUES (876,"01942741598");
INSERT INTO `Customer` VALUES (95521,"01587555211");
INSERT INTO `Customer` VALUES (100592,"07748555155");
INSERT INTO `Customer` VALUES (105858,"01587584217");
INSERT INTO `Customer` VALUES (155822,"01942018596");
-- -----------------------------------------------------


-- StaffMember Data
-- -----------------------------------------------------
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Euan","Robertson","Sales");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Ben","Davidson","Sales");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Jill","Blackburn","Manager");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Forbes","Johnson","Manager");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Stuart","Davies","Sales");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Jenny","Irvine","Cook");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Adrian","Summerfield","Cook");
INSERT INTO `StaffMember` (`Forename`,`Surname`,`Role`) VALUES ("Andrea","Burns","Sales");
-- -----------------------------------------------------


-- Provision Data
-- -----------------------------------------------------
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (52,"Chai",1.1,"Special Menu","Drink");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (412,"Mexican Burger",1.75,"Special Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (127,"Chicken Wings",1.75,"Special Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (39,"Bacon Pancakes",2.2,"Special Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (122,"Milkshake",1.0,"Special Menu","Drink");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (0,"Spicy Seaweed",0.9,"Special Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (250,"Curly Fries",1.3,"Veggie Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (111,"Carrot Cake",1.5,"Veggie Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (25,"Banana Split",1.55,"Veggie Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (66,"Veggie Burger",1.6,"Veggie Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (123,"Tea",0.9,"Standard Menu","Drink");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (200,"Coffee",1.2,"Standard Menu","Drink");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (300,"Bacon Burger",1.6,"Standard Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (158,"Sausage Roll",1.5,"Standard Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (150,"Cheeseburger",1.75,"Standard Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (100,"Chips",1.2,"Standard Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (0,"Sticky Cake",1.5,"Standard Menu","Food");
INSERT INTO `Provision` (`StockLevel`,`Name`,`Price`,`SubMenu`,`ProvisionType`) VALUES (0,"Cola",1.1,"Standard Menu","Drink"); 
-- -----------------------------------------------------


-- Order Data
-- -----------------------------------------------------
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (1,876,"Card","2020-05-31 14:00:00",2);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (3,333,"Cash","2020-06-01 10:30:00",2);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (5,876,"Cash","2020-06-01 09:30:00",3);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (4,105858,"Card","2020-06-02 15:00:00",2);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (3,100592,"Card","2020-06-02 10:40:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (5,876,"Card","2020-06-09 10:45:00",2);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (2,876,"Card","2020-06-12 13:15:00",2);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (8,155822,"Cash","2020-06-13 09:30:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (8,95521,"Cash","2020-06-22 15:00:00",3);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (4,155822,"Cash","2020-06-22 09:30:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (8,105858,"Card","2020-06-30 15:00:00",4);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (1,105858,"Card","2020-07-12 10:40:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (2,333,"Cash","2020-07-15 10:45:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (8,333,"Card","2020-07-15 13:15:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (2,876,"Card","2020-07-16 09:30:00",2);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (8,333,"Cash","2020-07-17 09:35:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (3,333,"Cash","2020-10-10 09:00:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (1,105858,"Card","2020-10-15 11:45:00",1);
INSERT INTO `Order` (`StaffMemberID`,`CustomerID`,`PaymentType`,`OrderTime`,`GroupSize`) VALUES (8,155822,"Cash","2020-10-23 15:30:00",1);
-- ----------------------------------------------------- 


-- Order Entry Data 
-- ----------------------------------------------------- 
INSERT INTO `OrderEntry` VALUES (2,1,2);  -- Order 1
INSERT INTO `OrderEntry` VALUES (7,1,2);
INSERT INTO `OrderEntry` VALUES (18,1,2);
INSERT INTO `OrderEntry` VALUES (5,2,2);  -- Order 2
INSERT INTO `OrderEntry` VALUES (14,2,1);
INSERT INTO `OrderEntry` VALUES (16,3,3); -- Order 3
INSERT INTO `OrderEntry` VALUES (13,3,3);
INSERT INTO `OrderEntry` VALUES (8,4,1);  -- Order 4
INSERT INTO `OrderEntry` VALUES (11,4,2);
INSERT INTO `OrderEntry` VALUES (17,4,1);
INSERT INTO `OrderEntry` VALUES (9,5,1);  -- Order 5
INSERT INTO `OrderEntry` VALUES (16,6,2); -- Order 6
INSERT INTO `OrderEntry` VALUES (3,6,1);
INSERT INTO `OrderEntry` VALUES (15,6,1);
INSERT INTO `OrderEntry` VALUES (4,7,2);  -- Order 7
INSERT INTO `OrderEntry` VALUES (6,7,1);
INSERT INTO `OrderEntry` VALUES (18,7,2);
INSERT INTO `OrderEntry` VALUES (15,8,1); -- Order 8
INSERT INTO `OrderEntry` VALUES (16,8,1);
INSERT INTO `OrderEntry` VALUES (7,9,3);  -- Order 9
INSERT INTO `OrderEntry` VALUES (15,9,3);
INSERT INTO `OrderEntry` VALUES (18,9,3);
INSERT INTO `OrderEntry` VALUES (15,10,1);-- Order 10
INSERT INTO `OrderEntry` VALUES (16,10,1);
INSERT INTO `OrderEntry` VALUES (17,11,2);-- Order 11
INSERT INTO `OrderEntry` VALUES (12,11,2);
INSERT INTO `OrderEntry` VALUES (16,11,4);
INSERT INTO `OrderEntry` VALUES (17,12,1);-- Order 12
INSERT INTO `OrderEntry` VALUES (8,12,1);
INSERT INTO `OrderEntry` VALUES (16,13,1);-- Order 13
INSERT INTO `OrderEntry` VALUES (10,13,1);
INSERT INTO `OrderEntry` VALUES (3,14,1); -- Order 14
INSERT INTO `OrderEntry` VALUES (6,14,1);
INSERT INTO `OrderEntry` VALUES (16,14,1);
INSERT INTO `OrderEntry` VALUES (1,15,2); -- Order 15
INSERT INTO `OrderEntry` VALUES (16,15,1);
INSERT INTO `OrderEntry` VALUES (15,16,1);-- Order 16
INSERT INTO `OrderEntry` VALUES (7,16,1);
INSERT INTO `OrderEntry` VALUES (16,17,1);-- Order 17
INSERT INTO `OrderEntry` VALUES (4,18,1); -- Order 18
INSERT INTO `OrderEntry` VALUES (12,19,1);-- Order 19
-- ----------------------------------------------------- 