create database datosBanco;
use datosBanco;
CREATE TABLE datos (
	nombre VARCHAR(100) NOT NULL,
	apellidos VARCHAR(100) NOT NULL,
   	DNI VARCHAR(100) NOT NULL,
   	telefono VARCHAR(100) NOT NULL,
	correo VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    saldo decimal
    );
    
select * from datos;

drop database datosBanco;