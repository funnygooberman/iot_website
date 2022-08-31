CREATE TABLE users {
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    image_path VARCHAR(255),
    location VARCHAR(255),
    message VARCHAR(10000),
    pi_id VARCHAR(10000),
    PRIMARY KEY (id),
};

CREATE TABLE displays {
    pi_id VARCHAR(10000) NOT NULL,
    user_id INT,
    PRIMARY KEY (pi_id)
};

CREATE TABLE admin {
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
};


