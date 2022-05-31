SET FOREIGN_KEY_CHECKS=0;
drop table User;
drop table Album;

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
    PRIMARY KEY(AlbumID),
    CONSTRAINT ALBUM_USER_FOREIGN_KEY FOREIGN KEY(UserID) REFERENCES User(UserID)
);

SET FOREIGN_KEY_CHECKS=1;

# Calum Password
# admin Rupertpoopert12
INSERT INTO User (Username,Password,Address) VALUES ("Calum","$2y$10$2e3388MFNiS.trij6rOm8.jq/SaCBBNIi2FN2w5.dQXrIpSoC0nci","Sombrero Land, Upside Down Isle, Legoland, LE6 9GO");
INSERT INTO User (Username,Password,Address) VALUES ("admin","$2y$10$ippRDC3u2YfQ7gWjZPZEBu9sEzfpBlPszCKzaa5S0pk5fxRSKZLu6","The Moon"); 

INSERT INTO Album (UserID, Title, Artist, Price, `Condition`, Genre, Image) VALUES
(1,"Call Me If You Get Lost","Tyler, The Creator",29.99,"New","Rap","assets/vinylcovers/callMeIfYouGetLost.png");
INSERT INTO Album (UserID, Title, Artist, Price, `Condition`, Genre, Image) VALUES
(1,"Dance Fever","Florence + The Machine",29.99,"New","Rock","assets/vinylcovers/danceFever.png");

# ??? UPDATE User SET AlbumOfWeek = 1 where UserID = 1;