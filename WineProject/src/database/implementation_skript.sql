

DROP DATABASE IF EXISTS SKWD;
CREATE DATABASE IF NOT EXISTS SKWD;
USE SKWD;

-- 

DROP TABLE IF EXISTS Address;
CREATE TABLE IF NOT EXISTS Address(
id			int			NOT NULL	AUTO_INCREMENT,
country				varchar(50)	NOT NULL,
city				varchar(50)	NOT NULL,
zip					varchar(15)	NOT NULL,
street				varchar(50)	NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Address_PK PRIMARY KEY (id)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Customer;
CREATE TABLE IF NOT EXISTS Customer(
id			int			NOT NULL	AUTO_INCREMENT,
firstName			varchar(50)	NOT NULL,
lastName			varchar(50)	NOT NULL,
gender              enum('m', 'f', 'd') not null,
dateOfBirth			date		NOT NULL,
phoneNumber			varchar(20)		NULL,
addressID			int			NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Customer_PK PRIMARY KEY (id),
CONSTRAINT Customer_FK FOREIGN KEY (addressID) REFERENCES Address (id)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Account;
CREATE TABLE IF NOT EXISTS Account(
id			int			NOT NULL	AUTO_INCREMENT,
email				varchar(50)	NOT NULL,
password			varchar(255)NOT NULL,
customerID			int			NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Account_PK PRIMARY KEY (id),
CONSTRAINT Account_FK FOREIGN KEY (customerID) REFERENCES Customer (id),
CONSTRAINT Customer_UQ unique (email)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Vendor;
CREATE TABLE IF NOT EXISTS Vendor(
vendorID			int			NOT NULL	AUTO_INCREMENT,
name				varchar(50)	NOT NULL,
description			varchar(100)	NULL,
phoneNumber			varchar(20) NOT NULL,
email				varchar(50) NOT NULL,
addressID			int			NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Vendor_PK PRIMARY KEY (vendorID),
CONSTRAINT Vendor_FK FOREIGN KEY (addressID) REFERENCES Address (id),
CONSTRAINT Vendor_UQ unique (email)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Product;
CREATE TABLE IF NOT EXISTS Product(
id			int			NOT NULL	AUTO_INCREMENT,
prodName				varchar(100)NOT NULL,
description			    text	NULL,
standardPrice		decimal(7,2)NOT NULL,
productType			enum('Drink','Accessory') NOT NULL,	
vendorID			int			NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Product_PK PRIMARY KEY (id),
CONSTRAINT Product_FK FOREIGN KEY (vendorID) REFERENCES Vendor (vendorID)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Picture;
CREATE TABLE IF NOT EXISTS Picture(
id			int			NOT NULL	AUTO_INCREMENT,
path				varchar(200)NOT NULL,
productID			int			NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Pictur_PK PRIMARY KEY (id),
CONSTRAINT Picture_FK FOREIGN KEY (productID) REFERENCES Product (id)
);

-- ---------------------------------------------------------

--



DROP TABLE IF EXISTS Property;
CREATE TABLE IF NOT EXISTS Property(
id			int			NOT NULL	AUTO_INCREMENT,
name				varchar(50)	not null,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Property_PK PRIMARY KEY (id)
);
-- ---------------------------------------------------------

 DROP TABLE IF EXISTS PropertyProProduct;
CREATE TABLE IF NOT EXISTS PropertyProProduct(
id			int			NOT NULL	AUTO_INCREMENT,
productID		int			not null,
propertyID		int 		not null,
value			varchar(60)	not null,
createdAt 		TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 		TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT ppp_PK PRIMARY KEY (id),
CONSTRAINT product_FKK FOREIGN KEY(productID) references Product(id),
CONSTRAINT property_FKK FOREIGN KEY(propertyID) references Property(id)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Orders;
CREATE TABLE IF NOT EXISTS Orders(
id				int			NOT NULL	AUTO_INCREMENT,
orderDate			date		NOT NULL,
shipDate			date			NULL,
shipPrice           decimal(9,2)not null,
payStatus			enum('unpaid','paid')	NOT NULL,	
payMethod			enum('transfer','cash on delivery','paypal')	NOT NULL,	
payDate				date 			NULL,
customerID			int			NOT NULL,
addressID			int			    NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,	
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Order_PK PRIMARY KEY (id),
CONSTRAINT Basket_FK_Customer FOREIGN KEY (customerID) REFERENCES Customer (id),
CONSTRAINT Basket_FK_Address FOREIGN KEY (addressID) REFERENCES Address (id)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS OrderItem;
CREATE TABLE IF NOT EXISTS OrderItem(
id					int			NOT NULL	AUTO_INCREMENT,
actualPrice			decimal(9,2)NOT NULL,
qty					int(5)		NOT NULL,
productID			int			NOT NULL,
orderID				int			NOT NULL,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

CONSTRAINT Basket_PK PRIMARY KEY (id),
CONSTRAINT Basket_FK_Product FOREIGN KEY (productID) REFERENCES Product (id),
CONSTRAINT Basket_FK_Order FOREIGN KEY (orderID) REFERENCES Orders (id)
);


-- ----
DROP TABLE IF EXISTS ShoppingCart;
CREATE TABLE IF NOT EXISTS ShoppingCart(
id					int			not null 	AUTO_INCREMENT,
accountId			int			not null,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
constraint ShoppingCart_pk primary key(id),
constraint ShoppingCart_fk_Account foreign key(accountId) references Account(id)
);
-- ---------
CREATE OR REPLACE TABLE ShoppingCartItem(
id					int			not null 	AUTO_INCREMENT,
qty					int			not null,
actualPrice			decimal(9,2)not null,
productID			int			not null,
shoppingCartId		int			not null,
createdAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP,
updatedAt 			TIMESTAMP 	DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
constraint ShoppingCartItem_pk primary key(id),
constraint ShoppingCartItem_fk_Product foreign key(productId) references Product(id),
constraint ShoppingCartItem_fk_ShoppingCart foreign key(shoppingCartId) references ShoppingCart(id));


CREATE OR REPLACE VIEW AllProducts as
select  ppt.productID, prop.name, ppt.value
from property prop
join PropertyProProduct ppt on prop.id =ppt.propertyID





















