Drop DROP TABLE member;
DROP TABLE product;
DROP TABLE order1;
DROP TABLE category;


CREATE TABLE brand (
    brand_id           Integer,
    brand_name         VARCHAR (45) NOT NULL ,

    PRIMARY kEY(brand_id)
);

CREATE TABLE category (
    category_id           Integer,
    category_name         VARCHAR (45) NOT NULL ,

    PRIMARY kEY(category_id)
);

CREATE TABLE product (
    product_id           Integer,
    product_name         VARCHAR (45) NOT NULL,
    category_id          Integer,
    brand_id             Integer,
    price                Integer,

    PRIMARY kEY(product_id),
    FOREIGN KEY(category_id) REFERENCES category (category_id),
    FOREIGN KEY(brand_id)    REFERENCES brand (brand_id)

);

CREATE TABLE order1 (
    order_id           Integer,
    product_id         Integer,

    PRIMARY KEY(order_id),
    FOREIGN KEY(product_id) REFERENCES product (product_id)

);


CREATE TABLE member (
    member_id            Integer,
    password             VARCHAR (45) NOT NULL,
    first_name           VARCHAR (45) NOT NULL,
    email                VARCHAR (45) NOT NULL,
    last_name            VARCHAR (45) NOT NULL,
    phone_numer          VARCHAR (45) NOT NULL,
    order_id             Integer,
    PRIMARY KEY (member_id)
    );

    ALTER TABLE  member
    ADD FOREIGN KEY (order_id) REFERENCES order (order_id);
