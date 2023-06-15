CREATE DATABASE stock;
USE stock;

CREATE TABLE article(
id int primary key auto_increment,
libelle varchar(45),
quantite int,
prix_unitaire int,
created_at datetime ,
updated_at  datetime ,
delete_at datetime
)ENGINE = INNODB;

CREATE TABLE categorie(
id int primary key auto_increment,
libelle varchar(45),
created_at datetime ,
updated_at  datetime ,
delete_at datetime

)ENGINE = INNODB;