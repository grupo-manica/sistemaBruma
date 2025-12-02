create database sistemaBruma;
use sistemaBruma;

create table usuario
    (
        codigo int primary key auto_increment,
        nome char(30) not null,
        email char(50) not null,
        login char(20) not null,
        senha char(20) not null
    );

select * from usuario;