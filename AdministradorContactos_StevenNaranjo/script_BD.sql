create database if not exists B55008_Rolosa_BD;
USE  B55008_Rolosa_BD;

CREATE TABLE if not exists usuario (

id_Usuario 			int					not null auto_increment ,
nickName 			VARCHAR(10) 		not null unique,
contrasena 			VARCHAR(20) 		not null ,
nombre 				VARCHAR(50),
correo	 			VARCHAR(30),
telefono 			VARCHAR(12),
edad 				int,
provincia 			VARCHAR(20),
Genero				VARCHAR(10),
CONSTRAINT usuario_pk PRIMARY KEY (id_Usuario)	
 )engine = INNODB;
-- DROP TABLE usuario;
 
select * from usuario;
 
insert into usuario (nickName , contrasena)values("steven","qwe");

-- PROCEDIMIENTOS ALMACENADOS

DELIMITER //
  create procedure consultaUsuarios(in nick_ varchar(10),in contrasena_ varchar(20))
	begin
		select nickName from usuario where nick_ like nickName and contrasena_ like  contrasena;
    end;
DELIMITER;
-- DROP procedure consultaUsuarios

DELIMITER //
  create procedure sp_registrar_usuario (in nick_ varchar(10),in contrasena_ varchar(20))
	begin
		insert into usuario (nickName , contrasena,nombre,correo, telefono, edad, provincia,Genero)values(nick_,contrasena_, "-","-","-",0,"-","-");
    end;
DELIMITER;
 -- DROP procedure sp_registrar_usuario

DELIMITER //
  create procedure sp_lista_usuario ()
	begin
		select * from usuario;
    end;
DELIMITER;
-- DROP procedure sp_lista_usuario


DELIMITER //
  create procedure sp_Infor_contacto(in nick_ varchar(10))
	begin
		select * from usuario where nick_ like nickName;
    end;
DELIMITER


DELIMITER //
  create procedure sp_actualizar_Usuario(in nick_ varchar(10),in nombre_ varchar(50),in correo_ varchar(30),in telefono_ varchar(12), in edad_ int, in provincia_ varchar(20), in genero_ varchar(10))
	begin
		update usuario
        SET nombre = nombre_ ,  correo = correo_ , telefono=telefono_ , edad = edad_ , provincia = provincia_ , genero = genero_
        where nickName=nick_; 
    end;
DELIMITER

DELIMITER //
  create procedure sp_eliminar_Usuario(in nick_ varchar(10))
	begin
		delete from  usuario where nickName=nick_;
    end;
DELIMITER

-- DROP procedure sp_actualizar_Usuario



select * from usuario;
call consultaUsuarios ("steven", "qwe");
call sp_registrar_usuario ("sebas", "qwe");
call sp_lista_usuario
call sp_Infor_contacto("steven")
call sp_actualizar_Usuario("steven", 'StevenJafet', "sjnm3008@gmail.com", "83766048", 23, "Cartago", "Masculino")
call sp_actualizar_Usuario("Maria", 'maria Eugenia', "eugemoga.com", "45871288", 34, "Cartago", "Femenino")
call sp_eliminar_Usuario ("steven97")


insert into usuario (nombre) values ("Steven Naranjo") where  "steven" like nickName;

update usuario SET nombre = "Steven Jafet" where nickName="steven"; 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 