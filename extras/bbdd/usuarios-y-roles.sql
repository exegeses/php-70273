-- creación de tabla roles

create table roles
(
    idRol tinyint unsigned auto_increment primary key not null,
    rol varchar(30) unique not null
);

insert into roles
    VALUES
        (default, 'Adminstrador'),
        (default, 'Supervisor'),
        (default, 'Usuario'),
        (default, 'Invitado');

create table usuarios
(
    idUsuario smallint unsigned auto_increment primary key not null,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    email varchar(45) unique not null,
    clave varchar(72) not null,
    idRol tinyint unsigned default(3) not null,
    foreign key ( idRol ) references roles ( idRol ),
    activo boolean default(1) not null
);