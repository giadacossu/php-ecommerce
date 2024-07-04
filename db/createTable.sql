<?php

CREATE TABLE CART (
    id int NOT NULL AUTO_INCREMENT,
    client_id varchar(50) NOT NULL,
    PRIMARY KEY (id) 
    );

    CREATE TABLE cart_item
    (
        id int NOT NULL AUTO_INCREMENT,
        cart_id int NOT NULL,
        product_id int NOT NULL,
        quantity int NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (cart_id) REFERENCES cart(id)
        FOREIGN KEY ( product_id) REFERENCES  product(id)
    );

//sintassi corretta

CREATE TABLE user_type (
    id int IDENTITY(1,1) PRIMARY KEY,
    name varchar(255) NOT NULL
);
INSERT INTO user_type( name) VALUES('Administrator');
INSERT INTO user_type( name) VALUES('Regular');



CREATE TABLE [user] (
    id int IDENTITY(1,1) PRIMARY KEY,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    user_type_id int NOT NULL,
    FOREIGN KEY (user_type_id) REFERENCES user_type(id)
);
INSERT INTO [user](email, password, user_type_id)
VALUES
    ('admin@email.com', CONVERT(varchar(32), HASHBYTES('MD5', 'password'), 2), 1),
    ('regular@email.com', CONVERT(varchar(32), HASHBYTES('MD5', 'password'), 2), 1);
	 
	 
	 UPDATE [user] SET user_type_id=2 WHERE id=2;