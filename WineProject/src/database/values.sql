


USE SKWD;


insert into Address(country, city, zip, street)
values
('Australia', 'Mornington', 'VIC 3931', 'St. Barkly 5' ),
('France', 'Paris', '75002', '62 Square de la Couronne'),
('France', 'Bagneux', '92220', '34 Rue Joseph Vernet'),
('Germany', 'Erfurt', '99105', 'Nordhauser Straße 63'),
('Italy', 'Musocco', '20151', 'Via San Cosmo fuori Porta Nolana 25'),
('Spain', 'Fene', '15500', 'Quevedo 68');
-- ---------------------------------------------------------

insert into Vendor(name, description, phoneNumber, email, addressID)
values
('Florence Voo', null, '098372618','froe@gmail.com', 2),
('Fransua Filk', null, '654346688', 'frasua@gmail.com', 1),
('Gloun Meis',   null, '0123456765','gloun@gmail.com', 4),
('Mavretti Long', null, '087646764', 'mavretti@gmail.com',6),
('Adrian Tram', null, '0876789067','adr@gmail.com', 5),
('Munloc Fred', null, '0984832618','mun@gmail.com', 3)
;

-- ---------------------------------------------------------

insert into Product(prodName, description, standardPrice, productType, vendorID)
values
('Simonsvlei Zenzela Charming Red', 'A well rounded, medium-bodied, easy drinking wine with spicy/smoky aromas.', 5.20, 'Drink',2 ),
('Plaimont Fleur de d`Artagnan Saint Mont La Réserve', 'Wine with intense purple color with aromas resembling fruit such as blueberries, blackberries.', 12.20, 'Drink',3 ),
('Gouguenheim Estaciones del Valle Cabernet Sauvignon', 'Deep ruby colour with purple hints. ', 8.50, 'Drink',1),
('Pierre Jourdan Brut', 'The lime characteristics of the Chardonnay are leading and are well backed up by the Pinot Noir. ', 16.20, 'Drink',4),
('Casa Valduga Brut Rosé', ' It presents a fine and fascinating perlage with unforgettable bouquet of tropical fruit and almonds.',14.20, 'Drink',4),
('Ferrari Brut', 'This wine embodies the entire history of the Ferrari Estate', 24.20, 'Drink',2 ),
('Messias Vinho Verde', 'Pale citrus colour. Intense and fresh aroma. Medium sweet and a fresh acidity in mouth.', 5.25, 'Drink',3 ),
('Château Pesquié Terrasses Blanc', 'This word comes from the Latin terras, meaning "lump of earth".', 8.50, 'Drink',6),
('Marisco The Kings Desire Pinot Rosé', 'A delicate, pale pink hue. Crunchy red summer berries.', 18.95, 'Drink',4),
('Heumann Rosé', 'Fresh raspberries and cherries on the palate with a hint of vanilla.', 7.57, 'Drink',2 ),
('Stilo Set 2 pieces', 'Stilo Set', 43.99, 'Accessory',5),
('Bottle Packaging Pro', null, 3.20, 'Accessory',5);



-- Picture

INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_1_.jpg',1,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_2_.jpg',2,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_3_.jpg',3,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_4_.jpg',4,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_5_.jpg',5,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_6_.jpg',6,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_7_.jpg',7,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_8_.jpg',8,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_9_.jpg',9,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_10_.jpg',10,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/product_11_.jpg',11,NULL,NULL);

-- ---------------------------------------------------------

/*
-- Query: 
-- Date: 2019-11-30 21:16
*/
-- Types of categories: Red Wine,  White Wine, Rose Wine, Sparkling Wine, Accessory
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'category',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'year',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'alcoholPercentage',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'residualSugar',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'bottleSize',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'color',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'alcohol',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'country',NULL,NULL);

-- ---------------------------------------------------------

/*
-- Query: 
-- Date: 2019-11-30 21:22
*/
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,1,'Red Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,2,'2017',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,3,'14,50%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,4,'dry',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,5,'0,75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,6,'red',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,7,'12.0%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,8,'Germany',NULL,NULL);

-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,1,'White Wine',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,2,'2015',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,3,'13,00',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,4,'medium-sweet',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,5,'0,75',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,6,'Rose Wine',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,7,'12.5%',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,8,'Italy',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,7,'12.0%',NULL,NULL);
-- INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,8,'France',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,1,'Sparkling Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,2,'2013',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,3,'14.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,4,'8,5 g/L',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,7,'12.5%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,8,'Italy',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,1,'Sparkling Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,2,'2015',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,3,'24.90',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,4,'brut',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,7,'12.5%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,8,'Italy',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,1,'White Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,2,'2000',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,3,'30.99',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,4,'9.6 g/L',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,7,'11.5%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,8,'USA',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,1,'White Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,2,'2001',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,3,'350.99',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,4,'9.6 g/L',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,7,'11.5%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,8,'France',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,1,'Rose Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,2,'2001',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,3,'4.99',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,4,'9.6 g/L',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,6,'rose',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,7,'15.5%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,8,'New Zealand',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,1,'Rose Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,2,'1999',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,3,'55.99',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,4,'9.6 g/L',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,6,'rose',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,7,'15.5%',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,8,'New Zealand',NULL,NULL);
























