create database wit;
use wit;

CREATE TABLE user (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45),
    email VARCHAR(100),
    birthday DATE,
    role INT,
    major INT,
    ph_num VARCHAR(20),
    username VARCHAR(50) NOT NULL,
    password VARCHAR(150) NOT NULL,
    profile TEXT,
    FOREIGN KEY (role) REFERENCES role(role_id),
    FOREIGN KEY (major) REFERENCES major(major_id)
);

CREATE TABLE role (
    role_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50)
);

INSERT INTO role (role_name) VALUES 
('student'),
('employee'),
('professor'),
('principal');

CREATE TABLE major (
    major_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    major_name VARCHAR(50)
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
    create_date DATE,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (major_id) REFERENCES major(major_id)
);

INSERT INTO major (major_name) VALUES 
('Computer Network'),
('Electrical and Electronic Engineering'),
('Mechatronics and Autonomous Systems');

select * from user;

update user set name = 'Min Ko Naing', email = '@gmail.com' , birthday = '1999-01-15' , role = 1, major=1, ph_num = 10
where username = 'mkn';


-- name email birthday role major ph_num username password profile -> user
-- category_id user_id happiness anxiety workload_mgmt input_date -> category
-- announcement_id user_id major_id title description create_date -> announcement
select * from role;
insert into major(major_id,major_name) values (7,null);

use wit;
select * from category;
select * from category;
update category set happiness = 4, anxiety = 3, workload_mgmt = 4 where user_id = 1;