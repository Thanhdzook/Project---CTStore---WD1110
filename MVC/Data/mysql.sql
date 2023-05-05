-- Drop database CTstore; 

create database CTstore;

use CTstore;

create table account(
	account_id int auto_increment primary key,
    full_name varchar(100) not null,
    phone_number varchar(10) not null,
	email varchar(100) not null,
    password varchar(100) not null,
    role int(1) not null
);

create table MobilePhone(
	mobilePhone_id int auto_increment primary key,
    mobilePhone_name varchar(50) not null,
    chip varchar(30) not null,
    memory varchar(50) not null,
    camera varchar(50) not null,
    operatingSystem varchar(20) not null,
    weight varchar(20) not null,
    pin varchar(10) not null,
    warrantyPeriod varchar(10) not null,
    price decimal(20,2) not null,
    amount int(10) not null,
    img varchar(100) not null
);