create database if not exists portafoliote;
use portafoliote;

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `access_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_types` (`id`, `name`, `access_level`) VALUES
(1, 'Administrador', 100),
(2, 'Docente', 50);

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_type` int(11),
  KEY `users_id_type_fk` (`id_type`),
  CONSTRAINT `users_id_type_fk` FOREIGN KEY (`id_type`) REFERENCES `user_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `id_type`) VALUES
(1, 'Administrador', 'admin@admin.com', '$2y$10$0iVCZ/o1TWbQlhGsfy/OROYu8UzDzD9dGbiujFTORbCYetobsmj/i', '6M89cw5DMRROviuVV64EvRFuPZ6e4vYCt1vnZCci7WHDwKfWnM1vaHYe6Xqv', '2016-06-01 04:35:06', '2016-06-20 14:56:03', 1);

ALTER TABLE `users` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `users` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;



create table if not exists `turno`
(
`id` int auto_increment not null primary key,
`descripcion` varchar(45) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table if not exists `carrera`
(
`id` int auto_increment not null primary key,
`CodCarrera` varchar(30) not null  unique,
`NombreCarrera` varchar(45) not null

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table if not exists `carreraturno`
(

`id` Int not null auto_increment primary key,
`idcarrera` int not null,
`idturno` int not null,

constraint `idcarrera`
foreign key (`idcarrera`)
references `carrera`(`id`)
on delete cascade
on update cascade,

constraint `idturno`
foreign key (`idturno`)
references `turno`(`id`)
on delete cascade
on update cascade
);


create table if not exists `estudiante`
(
`id` int not null auto_increment primary key,
`Ncarnet` int not null unique,
`Nombre` varchar(45) not null,
`Apellido` varchar(45) not null,
`correo` varchar(30) null unique,
`idCarreraTurno` int not null,
constraint  `idCarreraTurno`
foreign key (`idCarreraTurno`)
references `carreraturno`(`id`)
on delete cascade
on update cascade

);

create table if not exists `lineainvestigacion`
(
`id` int auto_increment not null  primary key,
`nombrelineainvestigacion` varchar(300) not null

);

create table if not exists `asignatura`
(
`id` int not null auto_increment primary key,
`codasignatura` varchar(30) not null unique,
`nombreasignatura` varchar(50) not null

);

create table if not exists `linvestasignatura`
(
`id` int auto_increment not null primary key,
`idasig` int,
`idlineainvestigacion` int,

constraint `idlineainvestigacion`
foreign key (`idlineainvestigacion`)
references `lineainvestigacion`(`id`)
on delete cascade
on update cascade,

constraint `idasig`
foreign key (`idasig`)
references `asignatura`(`id`)
on delete cascade
on update cascade
);

create table if not exists `proyectos`
(
`id` int not null auto_increment primary key,
`nombreProyecto` varchar(30) not null,
`anorealizado` date not null,
`archivoadjunto` varchar(30) null null,
`semestre` int not null,
`idLInvestAsignatura` int,

 constraint `idLInvestAsignatura`
 foreign key (`idLInvestAsignatura`)
 references `linvestasignatura`(`id`)
 on delete cascade
 on update cascade

);


create table if not exists `estudiantehaceproyectos`
(
 `id` int not null auto_increment primary key,
 `idestudiante` int not null, 
 `idproyectos` int not null,
 
 constraint `idestudiante`
 foreign key (`idestudiante`)
 references `estudiante`(`id`)
 on delete cascade
on update cascade,

 constraint `idproyectos`
 foreign key (`idproyectos`)
 references `proyectos`(`id`)
on delete cascade
on update cascade
);

