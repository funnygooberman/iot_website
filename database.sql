CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    name varchar(255),
    image_path varchar(255),
    location varchar(255),
    message varchar(1000),
    pi_id varchar(1000),
    PRIMARY KEY (id)
);

CREATE TABLE displays (
    pi_id VARCHAR(100) NOT NULL,
    user_id INT,
    PRIMARY KEY (pi_id)
);

CREATE TABLE admin (
    admin_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (admin_id)
);


