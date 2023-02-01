CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    pi_id varchar(100),
    PRIMARY KEY (id),
    FOREIGN KEY (pi_id) REFERENCES displays (pi_id)
);

CREATE TABLE display_data (
    name varchar(255),
    image_path varchar(255),
    location varchar(255),
    message varchar(1000),
    title varchar(100),
    userID int,
    pi_id VARCHAR(100),
    PRIMARY KEY (userID),
    FOREIGN KEY (userID) REFERENCES users(id),
);

CREATE TABLE displays (
    pi_id VARCHAR(100) NOT NULL,
    PRIMARY KEY (pi_id)
);

CREATE TABLE admins (
    admin_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (admin_id)
);

CREATE TABLE pi_ping_data (
    hostname VARCHAR(100),
    network  VARCHAR(100),
    ip_addr  VARCHAR(100),
    timestamp VARCHAR(100),
    payload   VARCHAR(100),
    PRIMARY KEY (hostname)
);

CREATE TABLE ring_data (
    device_id VARCHAR(100),
    device_type VARCHAR(100),
    device_room VARCHAR(100),
    device_state VARCHAR(100),
    PRIMARY KEY (device_id)
);

CREATE TABLE bluetooth_data (
    bluetooth_id VARCHAR(100),
    owner VARCHAR(100),
    location VARCHAR(100),
    timestamp VARCHAR(100),
    rssi VARCHAR(100),
    pi_id VARCHAR(100),
    PRIMARY KEY (bluetooth_id)    
);
