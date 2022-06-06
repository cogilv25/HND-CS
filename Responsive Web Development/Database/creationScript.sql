SET FOREIGN_KEY_CHECKS=0;
drop table if exists User;
drop table if exists Album;
drop table if exists `Order`;
drop table if exists OrderEntry;

create table User ( 
	UserID INT NOT NULL AUTO_INCREMENT,
    Username VARCHAR(64) NOT NULL,
    Password VARCHAR(256) NOT NULL,
    Address VARCHAR(256) NOT NULL,
    Blocked BOOLEAN DEFAULT FALSE NOT NULL,
    AlbumOfWeek INT,
    PRIMARY KEY (UserID),
    CONSTRAINT USER_AOTW_FOREIGN_KEY FOREIGN KEY(AlbumOfWeek) REFERENCES Album(AlbumID)
);

create table Album (
	AlbumID INT NOT NULL AUTO_INCREMENT,
    UserID INT NOT NULL,
    Title VARCHAR(64) NOT NULL,
    Artist VARCHAR(64) NOT NULL,
    Price DECIMAL(5,2) NOT NULL,
    `Condition` VARCHAR(12) NOT NULL,
    Genre VARCHAR(20) NOT NULL,
    Image VARCHAR(256),
    Quantity INT NOT NULL,
    PRIMARY KEY(AlbumID),
    CONSTRAINT ALBUM_USER_FOREIGN_KEY FOREIGN KEY(UserID) REFERENCES User(UserID)
);

create table `Order` (
	OrderID INT NOT NULL AUTO_INCREMENT,
    UserID INT NOT NULL,
    PRIMARY KEY(OrderID),
    CONSTRAINT ORDER_USER_FOREIGN_KEY FOREIGN KEY(UserID) REFERENCES User(UserID)
);

create table OrderEntry (
	OrderID INT NOT NULL,
    AlbumID INT NOT NULL,
    Quantity INT NOT NULL,
    CONSTRAINT ORDERENTRY_COMPOSITE_PRIMARY_KEY PRIMARY KEY(OrderID, AlbumID),
    CONSTRAINT ORDERENTRY_ALBUM_FOREIGN_KEY FOREIGN KEY(AlbumID) REFERENCES Album(AlbumID),
    CONSTRAINT ORDERENTRY_ORDER_FOREIGN_KEY FOREIGN KEY(OrderID) REFERENCES `Order`(OrderID)
);

SET FOREIGN_KEY_CHECKS=1;

# Calum mulaC
# admin Password
INSERT INTO User (Username,Password,Address) VALUES ("Calum","$2y$10$nNLt.aFcUND4ideNec3MBOiXWc8lu2OlBBwOpD9ZYLNF6pDwy2wbm","SOMBRERO LAND, UPSIDE DOWN ISLE, LEGOLAND, LE6 9GO");
INSERT INTO User (Username,Password,Address) VALUES ("admin","$2y$10$2e3388MFNiS.trij6rOm8.jq/SaCBBNIi2FN2w5.dQXrIpSoC0nci","THE MOON"); 

INSERT INTO Album (UserID, Title, Artist, Price, `Condition`, Genre, Image,Quantity) VALUES
(1,"Call Me If You Get Lost","Tyler, The Creator",29.99,"New","Rap","assets/vinylcovers/callMeIfYouGetLost.png",5);
INSERT INTO Album (UserID, Title, Artist, Price, `Condition`, Genre, Image,Quantity) VALUES
(1,"Dance Fever","Florence + The Machine",29.99,"New","Rock","assets/vinylcovers/danceFever.png",22);



UPDATE User SET AlbumOfWeek=1 where UserID=2;