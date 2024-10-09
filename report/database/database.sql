CREATE DATABASE wit;
USE wit;

CREATE TABLE role (
    role_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50)
);

CREATE TABLE major (
    major_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    major_name VARCHAR(50)
);

CREATE TABLE user (
    user_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    id_num VARCHAR(50) NULL,
    email VARCHAR(100),
    birthday DATE,
    role INT,
    major INT,
    ph_num VARCHAR(20),
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(150) NOT NULL,
    profile VARCHAR(50) default 'profile.png',
    attempt_date DATE null,
	attempt_count INT DEFAULT 0,
    CONSTRAINT primary_keys primary key (user_id, username),
    FOREIGN KEY (role) REFERENCES role(role_id),
    FOREIGN KEY (major) REFERENCES major(major_id)
);

CREATE TABLE category (
    category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    happiness INT DEFAULT 0,
    anxiety INT DEFAULT 0,
    workload_mgmt INT DEFAULT 0,
    input_date DATE,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE announcement (
    announcement_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    major_id INT,
    title VARCHAR(100),
    description TEXT,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (major_id) REFERENCES major(major_id)
);

INSERT INTO role (role_name) VALUES 
('Student'),
('Employee'),
('Professor'),
('Principal');

INSERT INTO major (major_name) VALUES 
('Computer Network'),
('Electrical and Electronic Engineering'),
('Mechatronics and Autonomous Systems');





