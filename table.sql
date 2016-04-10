CREATE TABLE IF NOT EXIST products (
	id int primary key auto_increment unique not null,
	product_code varchar(255) unique not null,
	price int not null
) ENGINE=INNODB;

CREATE TABLE IF NOT EXIST register (
	id int primary key auto_increment unique not null,
	mob varchar(10) unique not null,
	name varchar(255) not null,
	customer id varchar(255) unique not null,
	FOREIGN KEY (id) REFERENCES shop(id)
) ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS shop (
	id int primary key not null,
	p_code varchar(255) not null,
	price int not null
) ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS shop_reg (
	id int primary key not null,
	name varchar(255) not null,
	shop_id int not null,
) ENGINE=INNODB;