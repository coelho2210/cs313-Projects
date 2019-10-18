CREATE TABLE "state" (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE county (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL,
	land_covered INTEGER,
	state_id INTEGER,
	FOREIGN KEY (state_id) REFERENCES "state"(id)
);

CREATE TABLE site (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL,
	description VARCHAR(600),
	location VARCHAR(80) NOT NULL,
	trail_length REAL,
	county_id INTEGER,
	FOREIGN KEY (county_id) REFERENCES county(id)
);

CREATE TABLE picture (
	url VARCHAR(200) NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL,
	description VARCHAR(600),
	date_taken DATE,
	site_id INTEGER,
	FOREIGN KEY (site_id) REFERENCES site(id)
);

CREATE TABLE rating (
	id SERIAL NOT NULL PRIMARY KEY,
	reviewer_name VARCHAR(80) NOT NULL,
	rating INTEGER NOT NULL,
	description VARCHAR(200),
	site_id INTEGER,
	FOREIGN KEY (site_id) REFERENCES site(id)
);

INSERT INTO "state" (id, name) VALUES (DEFAULT, 'Idaho');
INSERT INTO "state" (id, name) VALUES (DEFAULT, 'Wyoming');

INSERT INTO county (id, name, land_covered, state_id) VALUES (DEFAULT, 'Madison', 813, 1);
INSERT INTO county (id, name, land_covered, state_id) VALUES (DEFAULT, 'Jefferson', 1124, 1);
INSERT INTO county (id, name, land_covered, state_id) VALUES (DEFAULT, 'Park County', 2211, 2);

INSERT INTO site (id, name, description, location, county_id) VALUES (DEFAULT, 'Menan Buttes', 'The Menan Buttes are two small hills which sit right next to rural farmland in Menan. There is a trail on one of the Buttes which allows visitors to visit the top. This is a highly recommended outdoor location for hikers eager to experience some natural Idaho desert scenery!', 'Menan', 2);

INSERT INTO site (id, name, description, location, county_id) VALUES (DEFAULT, 'Yellowstone National Park', 'Yellowstone national park is an extraordinary site to visit. There are geisers (Old Faithful being the most notable), hot springs, and other cool features. This is definitely one of the coolest places to visit!', 'Northwest Wyoming', 3);

INSERT INTO site (id, name, description, location, county_id) VALUES (DEFAULT, 'Yellowstone Bear World', 'This is a great place for viewing some of the wildlife that lives around the midwest States. There are bears, elk, and many other exciting animals. This is definitely worth the cost!', '6010 S 4300 W, Rexburg, ID 83440', 1);

INSERT INTO picture (url, name, site_id) VALUES ('https://pandasthumb.org/uploads/2012/Ford.North%20Menan.jpg', 'Butte View 1', 1);
INSERT INTO picture (url, name, site_id) VALUES ('http://www.americansouthwest.net/idaho/photographs700/menan3.jpg', 'Butte View 2', 1);
INSERT INTO picture (url, name, site_id) VALUES ('https://www.yellowstonenationalparklodges.com/content/uploads/2017/04/YNP_emerald-pool-with-bison-roaming-in-background-445x290.jpg', 'Hot Spring 1', 2);
INSERT INTO picture (url, name, site_id) VALUES ('http://jacksonhole-traveler-production.s3.amazonaws.com/wp-content/uploads/2014/05/old-faithful-4OFS1059-1280x853.jpg', 'Old Faithful', 2);
INSERT INTO picture (url, name, site_id) VALUES ('https://media-cdn.tripadvisor.com/media/photo-s/01/f4/27/db/yellowstone-bear-world.jpg', 'Bears', 3);
INSERT INTO picture (url, name, site_id) VALUES ('https://