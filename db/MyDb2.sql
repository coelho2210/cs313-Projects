
DROP TABLE "state" CASCADE;
DROP TABLE city  CASCADE ;
DROP TABLE park    CASCADE;
DROP TABLE picture CASCADE;
DROP TABLE rating  CASCADE;




CREATE TABLE "state" (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE city (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL,
	state_id INTEGER,
	FOREIGN KEY (state_id) REFERENCES "state"(id)
);

CREATE TABLE park (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL,
	description VARCHAR(800),
	address VARCHAR(80) NOT NULL,
	city_id INTEGER,
	FOREIGN KEY (city_id) REFERENCES city(id)
);

CREATE TABLE picture (
	url VARCHAR(700) NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL,
	description VARCHAR(600),
	park_id INTEGER,
	FOREIGN KEY (park_id) REFERENCES park(id)
);

CREATE TABLE rating (
	id SERIAL NOT NULL PRIMARY KEY,
	reviewer_name VARCHAR(80) NOT NULL,
	rating INTEGER NOT NULL,
	description VARCHAR(200),
	park_id INTEGER,
	FOREIGN KEY (park_id) REFERENCES park(id)
);

INSERT INTO "state" (id, name) VALUES (DEFAULT, 'Idaho');
INSERT INTO "state" (id, name) VALUES (DEFAULT, 'Utah');

INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Orem', 2);
INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Rexburg', 1);
INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Idaho Falls', 1);

INSERT INTO park (id, name, description, address, city_id) VALUES (DEFAULT, 'Orem Park', 'Perfect place to play soccer with your kids', '34 S 714 W', 2);

INSERT INTO park (id, name, description, address, city_id) VALUES (DEFAULT, 'Porter Park', 'The best Park in town', '111 w 7Th S', 3);

INSERT INTO park (id, name, description, address, city_id) VALUES (DEFAULT, 'Water Park', 'Lets go swinning', '456 W 342 N', 1);

--INSERT INTO picture (url, picture_name, park_id) VALUES ('https://pandasthumb.org/uploads/2012/Ford.North%20Menan.jpg', 'Butte View 1', 1);
INSERT INTO picture (url, name, park_id) VALUES ('https://orem.org/wp-content/uploads/2016/06/7373224.jpg', 'Orem', 1);
--INSERT INTO picture (url, picture_name, park_id) VALUES ('https://www.yellowstonenationalparklodges.com/content/uploads/2017/04/YNP_emerald-pool-with-bison-roaming-in-background-445x290.jpg', 'Hot Spring 1', 2);
INSERT INTO picture (url, name, park_id) VALUES ('https://img.theculturetrip.com/768x432/wp-content/uploads/2018/06/shutterstock_1091299760.jpg', 'swim', 2);
INSERT INTO picture (url, name, park_id) VALUES ('https://img-aws.ehowcdn.com/700x/cdn.onlyinyourstate.com/wp-content/uploads/2016/08/Porter-Park-700x345.jpg', 'Porter', 3);





CREATE TABLE member (
	id SERIAL NOT NULL PRIMARY KEY,
	user_name VARCHAR(80) NOT NULL UNIQUE,
	password VARCHAR(300) NOT NULL UNIQUE,
	email VARCHAR(200),
	first_name VARCHAR(200),
	Last_name VARCHAR(200)
);











--INSERT INTO picture (url, picture_name, park_id) VALUES ('https://c2.staticflickr.com/8/7374/9181508846_9c403b8e0b_b.jpg', 'Bears 2', 3);
