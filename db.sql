USE courseapp;

CREATE TABLE login (
id int(9) NOT NULL auto_increment,
name varchar(100) NOT NULL,
email varchar(100) NOT NULL,
username varchar(100) NOT NULL,
password varchar(100) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE courses (
id int(11) NOT NULL auto_increment,
name varchar(100) NOT NULL,
description VARCHAR(100) NOT NULL,
framework VARCHAR(100) NOT NULL,
cost decimal(10,2) NOT NULL,
login_id int(11) NOT NULL,
PRIMARY KEY (id),
CONSTRAINT FK_courses_1
FOREIGN KEY (login_id) REFERENCES login(id)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;