use portafoliote;


INSERT INTO `carrera` (`id`, `CodCarrera`, `NombreCarrera`) VALUES
(1, 'IE', 'Informatica Educativa'),
(2, 'OVT', 'Orientacion Vocacional y Tecnica'),
(3, 'DGM', 'Diseño Grafico y Multimedia');



INSERT INTO `turno` (`id`, `descripcion`) VALUES
(1, 'Matutino'),
(2, 'Vespertino'),
(3, 'Sabatino');


INSERT INTO `lineainvestigacion` (`id`, `nombrelineainvestigacion`) VALUES
(1, 'Evaluación y Desarrollo de Software Educativo'),
(2, 'Impacto del uso de las TIC en la Educación'),
(3, 'Integración Curricular de las TIC en la Educación'),
(4, 'Software Libre'),
(5, 'Educación en Línea');


INSERT INTO `asignatura`(`codasignatura`,`nombreasignatura`) VALUES
('PEM01','Modalidad de Graduacion'),
('DGM02','Diseño grafico y multimedia'),
('ISE03','Ing Software Educativo'),
('BD04','Base de Datos'),
('MI05','Metodologia de la investigacion');

