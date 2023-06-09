-- Drop database CTstore; 

-- create database CTstore;

-- use CTstore;

-- create table account(
-- 	account_id int auto_increment primary key,
--     full_name varchar(100) not null,
--     phone_number varchar(10) not null,
-- 	email varchar(100) not null,
--     password varchar(100) not null,
--     role int(1) not null,
-- 	unique_id int(255) not null
-- );

-- create table MobilePhone(
-- 	mobilePhone_id int auto_increment primary key,
--     mobilePhone_name varchar(50) not null,
--     chip varchar(30) not null,
--     memory varchar(50) not null,
--     camera varchar(50) not null,
--     operatingSystem varchar(20) not null,
--     weight varchar(20) not null,
--     pin varchar(10) not null,
--     warrantyPeriod varchar(10) not null,
--     price decimal(20,2) not null,
--     amount int(10) not null,
--     img varchar(100) not null,
	-- color varchar(45) not null
-- );

-- create table Customer(
--     account_id int NOT NULL,
--     customer_name varchar(50) not null,
--     customer_phonenumber varchar(12)not null,
--     customer_address varchar(50),
--     CONSTRAINT fk_Customer_Account_accountId FOREIGN KEY (account_id) REFERENCES account (account_id)
-- );

-- create table Orders(
-- 	order_id int auto_increment primary key,
--     account_id int not null,
--     order_date datetime default now() not null,
--     status int(10) not null,
--     constraint fk_Orders_Customer FOREIGN KEY (account_id) REFERENCES account (account_id)
-- );

-- CREATE TABLE orderdetails (
--   order_id int NOT NULL,
--   mobilePhone_id int NOT NULL,
--   unit_price decimal(20,2) NOT NULL,
--   quantity int NOT NULL,
--   PRIMARY KEY (order_id,mobilePhone_id),
--   KEY fk_OrderDetails_Orders_mobileid_idx (mobilePhone_id),
--   CONSTRAINT fk_OrderDetails_Orders_mobileid FOREIGN KEY (mobilePhone_id) REFERENCES mobilephone (mobilePhone_id) ON UPDATE CASCADE,
--   CONSTRAINT fk_OrderDetails_Orders_orderid FOREIGN KEY (order_id) REFERENCES orders (order_id) ON UPDATE CASCADE
-- ) ;

-- CREATE TABLE messages(
-- 	msg_id int auto_increment primary key,
--     incomming_msg_id int(255) not null,
--     outcomming_msg_id int(255) not null,
--     msg varchar(1000) not null
-- );