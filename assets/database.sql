create table brands(
br_id int auto_increment primary key,
br_name varchar(100) 
);

create table categories(
ca_id int auto_increment primary key,
ca_name varchar(100)
);



create table users(
us_id int auto_increment primary key, 
us_name varchar(100), 
us_mobile bigint, 
us_email varchar(100), 
us_time timestamp
);


create table wishlist(
wi_id int auto_increment primary key,
wi_uid int,
wi_pid int
);