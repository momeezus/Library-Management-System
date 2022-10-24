

INSERT INTO LIBRARY (LNAME)
VALUES ('Lake Forest Library');

INSERT INTO BRANCH (BNAME, ADDRESS, PHNUM, LIBID)
VALUES ('LF Branch', 'Lake Forest', 7355555, 1);




INSERT INTO MEMBER (NAME, PHONE, EMAIL, ADDRESS, PASSWORDS, ADMIN, BRID)
VALUES
	('Animesa Puri',2242859269,'puria@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','12345Ab890',false,1),
	('Mohamed Diallo',2242859270,'diallom@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','12344abc90',false,1),
	('Sam Rogers',2282059269,'rogerss@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','1238egdh0',false,1),
	('Parker Jude',2453459269,'judep@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','123434f858',false,1),
	('Chloe Li',2242785469,'lic@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','172acds890',false,1),
	('Keano Chicalia',9658859269,'chicaliak@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','123abh490',false,1),
	('Ola Busari',2242858849,'busario@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','123abgs90',false,1),
	('Wontuma Sadiq',2242885888,'sadiqw@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','12dvgs790',false,1),
	('Ragnar Lothbrok', 2242888889, 'lothbrokr@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','196abhf890',false,1),
	('Grodungus Grolungus',2245269889,'grolungusg@mx.lakeforest.edu','555 N Sheridan Rd, Lake Forest, IL','48583asd890',false,1),
	('Sugata Banerji', '6099690420', 'banerjis@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', 'bloodybeetles',true,1),
	('Arthur Bousquet', '8477356969', 'bousqueta@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', 'fromagebaguette',true,1);



INSERT INTO DOCUMENT (BRID, TYPE, TITLE, CREATOR)
VALUES
	(1, 'B', 'The Adventures of Huckleberry Finn','Mark Twain'),
	(1, 'B', 'The Adventures of Huckleberry Finn','Mark Twain'),
	(1, 'B', 'The Adventures of Huckleberry Finn','Mark Twain'),
	(1, 'B', 'Bhabiswya ko Bipana', 'Prithu'),
	(1, 'B', 'Bhabiswya ko Bipana', 'Prithu'),
	(1, 'B', 'Bhabiswya ko Bipana', 'Prithu'),
	(1, 'B', 'Harry Potter and Gula', 'Ravenclaw'),
	(1, 'B', 'Harry Potter and Gula', 'Ravenclaw'),
	(1, 'B', 'Fiery Tings', 'Herald Goliath'),
	(1, 'B', 'Fiery Tings', 'Herald Goliath'),
	(1, 'B', 'Faaaccktts of Life', 'SHECK'),
	(1, 'B', 'How to be a GOZA', 'SHECK'),
	(1, 'B', "Sheckin' The Shyack Shcj Shck-tyle", 'SHECK'),
	(1, 'J', 'Awakened Reptiles', 'Crock Dillion'),
	(1, 'J', 'Hungry Reptiles', 'Crock Dillion'),
	(1, 'J', 'Tire Fashion', 'Leah Ther'),
	(1, 'J', 'Nailing the Pin', 'Harold Mumford'),
	(1, 'J', 'The Table Over the Shed', 'Griffith'),
	(1, 'J', 'Blooming Blues', 'Blufford Blue'),
	(1, 'J', 'Grlling Right', 'Gordon Ramtell'),
	(1, 'D', 'Sleeping Reptiles', 'Crock Dillion'),
	(1, 'D', 'Wedding Escape Plans', 'Chum Lord'),
	(1, 'D', 'Escape Plots After Capture', 'Chum Lord'),
	(1, 'D', 'Catching a Chum', 'Law Wahd'),
	(1, 'D', 'Catching a Chum Again', 'Law Wahd');


INSERT INTO PUBLISHER (NAME, DOCID)
VALUES
	('Book Ltd',1),
	('Fireball Pub',2),
	('Toei Ltd Inc', 3),
	('Mugiwara Pub', 4),
	('Book Ltd', 5),
	('Fireball Pub', 6),
	('Toei Ltd Inc', 7),
	('Mugiwara Pub', 8),
	('Fireball Pub', 9),
	('Toei Ltd Inc', 10),
	('Mugiwara Pub', 11),
	('Book Ltd', 12),
	('Fireball Pub', 13),
	('Toei Ltd Inc', 14),
	('Mugiwara Pub', 15),
	('Book Ltd', 16),
	('Fireball Pub', 17),
	('Toei Ltd Inc', 18),
	('Mugiwara Pub', 19),
	('Fireball Pub', 20),
	('Toei Ltd Inc', 21),
	('Mugiwara Pub', 22),
	('Book Ltd', 23),
	('Fireball Pub', 24),
	('Toei Ltd Inc', 25);



INSERT INTO BORROWS (BORROWED_ON, RETURNED_ON, MEMBERID, DOCID)
VALUES
	('2022-04-18 10:34:09', '2022-04-20 10:34:09',1,1),
	('2022-04-18 11:04:09', NULL, 1 , 2),
	('2022-04-18 15:34:09', '2022-04-20 09:34:09', 4, 3),
	('2022-04-18 15:34:09', '2022-04-21 10:34:09', 7, 7),
	('2022-02-18 15:34:09', NULL, 8, 14);


INSERT INTO BOOK( ISBN, DOCID)
VALUES
	('1234-1', 1),
	('1234-2', 2),
	('1234-3', 3),
	('0000-1', 4),
	('0000-2', 5),
	('0000-3', 6),
	('0001-1', 7),
	('0001-2', 8),
	('0002-1', 9),
	('0002-2', 10),
	('0003-1', 11),
	('0004-1', 12),
	("0005-1", 13);


INSERT INTO JOURNAL( JOURNALID, DOCID)
VALUES
	(1, 14),
	(2, 15),
	(3, 16),
	(4, 17),
	(5, 18),
	(6, 19),
	(7, 20);


INSERT INTO DVD( DVDID, DOCID)
VALUES
	(1, 21),
	(2, 22),
	(3, 23),
	(4, 24),
	(5, 25);