# tabla Password Resets
create table password_reset
(
    id tinyint unsigned auto_increment primary key not null,
    codigo varchar(8) not null,
    email varchar(45) not null,
    fecha timestamp not null default( current_timestamp() ),
    activo boolean not null default(1)
);