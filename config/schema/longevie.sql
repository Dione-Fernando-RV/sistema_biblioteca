/*
SQLyog Ultimate
MySQL - 10.5.9-MariaDB : Database - longevie
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `agenda_cursos` */

CREATE TABLE `agenda_cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT '0 - curso 1 - palestra',
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativo  2 - desativado',
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `valor_curso` decimal(11,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `situacao_id` (`situacao_id`),
  KEY `turma_id` (`turma_id`),
  CONSTRAINT `agenda_cursos_ibfk_3` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `agenda_cursos_ibfk_4` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `agenda_cursos_ibfk_5` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `agenda_cursos_ibfk_6` FOREIGN KEY (`turma_id`) REFERENCES `cursos_turmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `agenda_cursos` */

insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (1,1,'2021-09-01','2021-09-03',200,'MS','CG','VERTICO',0,1,1,'2021-07-15 23:06:31',1,'2021-07-21 02:34:04',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (3,1,'2021-07-26','2021-07-29',34,'MS','','',0,1,NULL,'2021-07-26 20:11:04',NULL,'2021-07-26 20:11:04',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (4,1,'2021-07-28','2021-07-31',NULL,'','','',0,1,NULL,'2021-07-26 20:19:22',NULL,'2021-07-26 20:19:22',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (5,1,'2021-07-27','2021-07-28',6,'MS','CG.','',0,1,NULL,'2021-07-27 08:40:13',NULL,'2021-07-27 08:40:13',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (6,3,'2021-07-27','2021-07-28',6,'MS','CG.','',0,1,NULL,'2021-07-27 08:40:57',NULL,'2021-07-27 08:40:57',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (7,3,NULL,NULL,NULL,'','CG.','',0,1,NULL,'2021-07-27 21:21:29',NULL,'2021-07-27 21:21:29',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (8,3,NULL,NULL,NULL,'','CG.','',0,1,NULL,'2021-07-27 21:26:02',NULL,'2021-07-27 21:26:02',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (9,3,NULL,NULL,NULL,'','CG.','',0,1,NULL,'2021-07-27 21:28:19',NULL,'2021-07-27 21:28:19',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (10,3,NULL,NULL,1000000,'mt','c','ttteeet',0,1,NULL,'2021-07-27 21:28:41',NULL,'2021-07-27 21:28:41',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (11,1,NULL,NULL,23232323,'sdsds','ssds','sdsd',NULL,NULL,NULL,'2021-07-27 21:31:00',NULL,'2021-07-27 21:31:00',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (12,3,NULL,NULL,350,'mt','','',0,1,NULL,'2021-07-27 21:41:58',NULL,'2021-07-27 21:41:58',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (13,3,NULL,NULL,NULL,'','','',0,1,NULL,'2021-07-27 21:43:43',NULL,'2021-07-27 21:43:43',0.00);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (14,1,NULL,NULL,NULL,'','','',0,1,NULL,'2021-07-27 21:45:33',NULL,'2021-07-27 21:45:33',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (15,1,NULL,'2021-07-28',NULL,'','','teste',0,1,NULL,'2021-07-27 21:48:31',NULL,'2021-07-27 21:48:31',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (16,1,NULL,NULL,NULL,'','','',0,1,NULL,'2021-07-28 21:01:10',NULL,'2021-07-28 21:01:10',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (17,1,NULL,NULL,6,'ii','lk','turma 01 - com novo metodo',0,1,NULL,'2021-07-28 21:21:07',NULL,'2021-07-28 21:23:00',500.80);
insert  into `agenda_cursos`(`id`,`turma_id`,`data_inicio`,`data_fim`,`carga_horaria`,`estado`,`cidade`,`local`,`tipo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor_curso`) values (18,3,NULL,NULL,89,'','','Minha casa dos sonhos',0,1,NULL,'2021-07-28 21:21:54',NULL,'2021-07-28 21:21:54',0.00);

/*Table structure for table `alunos` */

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(250) DEFAULT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `cidade` varchar(250) DEFAULT NULL,
  `bairro` varchar(250) DEFAULT NULL,
  `rua` varchar(250) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `escolaridade_id` int(11) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativo  2 - desativado',
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `situacao_id` (`situacao_id`),
  KEY `escolaridade_id` (`escolaridade_id`),
  CONSTRAINT `alunos_ibfk_3` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `alunos_ibfk_4` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `alunos_ibfk_5` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `alunos_ibfk_6` FOREIGN KEY (`escolaridade_id`) REFERENCES `escolaridades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `alunos` */

insert  into `alunos`(`id`,`nome`,`data_nascimento`,`cpf`,`telefone`,`cep`,`estado`,`cidade`,`bairro`,`rua`,`numero`,`escolaridade_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (1,'Roberto dias','1994-01-20','459.574.259-78','6799584789',745866105,'Mato Grosso do Sul','Campo Grande','Monte Libano','Da paz',78,1,1,2,'2021-07-15 22:48:34',2,'2021-07-23 03:06:29');
insert  into `alunos`(`id`,`nome`,`data_nascimento`,`cpf`,`telefone`,`cep`,`estado`,`cidade`,`bairro`,`rua`,`numero`,`escolaridade_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (2,'Maria Eduarda','1994-01-20','459.574.259-78','6799584789',745866105,'Mato Grosso do Sul','Campo Grande','Monte Libano','Da paz',78,1,1,2,'2021-07-15 22:48:34',2,'2021-07-15 22:48:38');

/*Table structure for table `curso_disciplinas` */

CREATE TABLE `curso_disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL,
  `cadastrado_por` int(11) DEFAULT NULL,
  `create` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `curso_id` (`curso_id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `curso_disciplinas_ibfk_1` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `curso_disciplinas_ibfk_2` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `curso_disciplinas_ibfk_3` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `curso_disciplinas_ibfk_4` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `curso_disciplinas` */

insert  into `curso_disciplinas`(`id`,`nome`,`curso_id`,`situacao_id`,`cadastrado_por`,`create`,`modeificado_por`,`modified`) values (1,'Longevidade na vida adulta',3,1,1,'2021-07-15 22:51:22',1,'2021-07-25 19:20:39');
insert  into `curso_disciplinas`(`id`,`nome`,`curso_id`,`situacao_id`,`cadastrado_por`,`create`,`modeificado_por`,`modified`) values (2,'Longevidade na empresa ',1,1,1,'2021-07-15 22:51:24',1,'2021-07-15 22:51:28');
insert  into `curso_disciplinas`(`id`,`nome`,`curso_id`,`situacao_id`,`cadastrado_por`,`create`,`modeificado_por`,`modified`) values (3,'teste ',3,1,NULL,NULL,NULL,'2021-07-25 19:24:54');

/*Table structure for table `curso_disciplinas_instrutores` */

CREATE TABLE `curso_disciplinas_instrutores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_disciplina_id` int(11) DEFAULT NULL,
  `instrutores_id` int(11) DEFAULT NULL,
  `curso_turma_id` int(11) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativo  2 - desativado',
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `instrutores_id` (`instrutores_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `curso_disciplina_id` (`curso_disciplina_id`),
  KEY `curso_turma_id` (`curso_turma_id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `curso_disciplinas_instrutores_ibfk_2` FOREIGN KEY (`instrutores_id`) REFERENCES `instrutores` (`id`),
  CONSTRAINT `curso_disciplinas_instrutores_ibfk_3` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `curso_disciplinas_instrutores_ibfk_4` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `curso_disciplinas_instrutores_ibfk_5` FOREIGN KEY (`curso_disciplina_id`) REFERENCES `curso_disciplinas` (`id`),
  CONSTRAINT `curso_disciplinas_instrutores_ibfk_6` FOREIGN KEY (`curso_turma_id`) REFERENCES `cursos_turmas` (`id`),
  CONSTRAINT `curso_disciplinas_instrutores_ibfk_7` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `curso_disciplinas_instrutores` */

insert  into `curso_disciplinas_instrutores`(`id`,`curso_disciplina_id`,`instrutores_id`,`curso_turma_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (1,1,1,1,1,1,'2021-07-15 22:52:03',1,'2021-07-25 19:53:45');
insert  into `curso_disciplinas_instrutores`(`id`,`curso_disciplina_id`,`instrutores_id`,`curso_turma_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (2,2,2,1,1,1,'2021-07-15 22:54:19',1,'2021-07-15 22:54:23');
insert  into `curso_disciplinas_instrutores`(`id`,`curso_disciplina_id`,`instrutores_id`,`curso_turma_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (3,2,1,1,1,NULL,'2021-07-25 20:00:52',NULL,'2021-07-25 20:00:52');
insert  into `curso_disciplinas_instrutores`(`id`,`curso_disciplina_id`,`instrutores_id`,`curso_turma_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (4,3,2,3,1,1,'2021-07-27 08:57:28',1,'2021-07-27 08:57:32');

/*Table structure for table `cursos` */

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativivo 2 - desativado',
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `valor` decimal(11,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `cursos_ibfk_3` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `cursos` */

insert  into `cursos`(`id`,`nome`,`descricao`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor`) values (1,'Longevidade ....','Tornando-nos uma Clínica referência no quesito qualidade de vida!',1,1,'2021-07-15 22:50:04',1,'2021-07-25 18:41:52',500.80);
insert  into `cursos`(`id`,`nome`,`descricao`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor`) values (2,'teste','Tornando-nos uma Clínica referência no quesito qualidade de vida!',1,1,'2021-07-15 22:50:04',1,'2021-07-15 22:50:07',0.00);
insert  into `cursos`(`id`,`nome`,`descricao`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor`) values (3,'Novo curso saindo do forme','Esse curso será top',1,1,'2021-07-23 19:56:28',1,'2021-07-23 19:56:28',0.00);
insert  into `cursos`(`id`,`nome`,`descricao`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor`) values (4,'Novo curso saindo do forme 10','teste .',1,1,'2021-07-23 20:00:15',NULL,'2021-07-25 18:41:44',0.00);
insert  into `cursos`(`id`,`nome`,`descricao`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor`) values (5,'Cleyton Goulart','sdsds',1,1,'2021-07-23 20:13:02',NULL,'2021-07-23 20:13:02',0.00);
insert  into `cursos`(`id`,`nome`,`descricao`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`valor`) values (6,'Cleyton Goulart','sdsds',1,1,'2021-07-23 21:44:34',NULL,'2021-07-23 21:44:34',0.00);

/*Table structure for table `cursos_alunos` */

CREATE TABLE `cursos_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_id` int(11) DEFAULT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `certificado_emitido` int(11) DEFAULT 1 COMMENT '1 - sim 2 - não',
  `certificado_codigo` varchar(255) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT 1 COMMENT '1 - ativo  2 - desativado\r\ncadastrado_por',
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `agenda_id` (`agenda_id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `cursos_alunos_ibfk_2` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `cursos_alunos_ibfk_3` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `cursos_alunos_ibfk_4` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `cursos_alunos_ibfk_6` FOREIGN KEY (`agenda_id`) REFERENCES `agenda_cursos` (`id`),
  CONSTRAINT `cursos_alunos_ibfk_7` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cursos_alunos` */

insert  into `cursos_alunos`(`id`,`agenda_id`,`aluno_id`,`certificado_emitido`,`certificado_codigo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (1,1,1,1,NULL,1,2,'2021-07-15 23:01:54',1,'2021-07-15 23:01:56');
insert  into `cursos_alunos`(`id`,`agenda_id`,`aluno_id`,`certificado_emitido`,`certificado_codigo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (2,1,2,2,'122959we89ewew988fdgf8rrrt',1,2,'2021-07-15 23:04:23',2,'2021-07-15 23:04:30');
insert  into `cursos_alunos`(`id`,`agenda_id`,`aluno_id`,`certificado_emitido`,`certificado_codigo`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (3,6,2,2,'122959we89ewew988fdgf8rrrt',1,2,'2021-07-15 23:04:23',2,'2021-07-15 23:04:30');

/*Table structure for table `cursos_turmas` */

CREATE TABLE `cursos_turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma` varchar(255) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL,
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `situacao_id` (`situacao_id`),
  KEY `curso_id` (`curso_id`),
  CONSTRAINT `cursos_turmas_ibfk_2` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `cursos_turmas_ibfk_3` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `cursos_turmas_ibfk_4` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `cursos_turmas_ibfk_5` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cursos_turmas` */

insert  into `cursos_turmas`(`id`,`turma`,`curso_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (1,'Turma 01',1,1,1,'2021-07-15 22:55:47',1,'2021-07-27 10:37:20');
insert  into `cursos_turmas`(`id`,`turma`,`curso_id`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`) values (3,'Turma 02',3,1,1,'2021-07-15 22:55:47',1,'2021-07-27 10:35:13');

/*Table structure for table `escolaridades` */

CREATE TABLE `escolaridades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativo 2 - desativado',
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `escolaridades_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `escolaridades` */

insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (1,'Superior completo.',1);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (2,'Superior em andamento',1);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (3,'Pós-graduado',1);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (4,'Mestre',1);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (5,'Doutor',1);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (6,'Pós-Doc',1);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (7,'Cleyton Goulart',2);
insert  into `escolaridades`(`id`,`nome`,`situacao_id`) values (8,'',2);

/*Table structure for table `grupo_usuario` */

CREATE TABLE `grupo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativo  2 - desativado',
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `grupo_usuario_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `grupo_usuario` */

insert  into `grupo_usuario`(`id`,`nome`,`situacao_id`) values (1,'Administrador',1);
insert  into `grupo_usuario`(`id`,`nome`,`situacao_id`) values (2,'Aluno',1);

/*Table structure for table `instrutores` */

CREATE TABLE `instrutores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(250) DEFAULT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `cep` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `cidade` varchar(250) DEFAULT NULL,
  `rua` varchar(250) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(250) DEFAULT NULL,
  `formacao` varchar(255) DEFAULT NULL,
  `escolaridade_id` int(11) DEFAULT NULL,
  `curriculo_lattes` text DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL,
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modeificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `escolaridade_id` (`escolaridade_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modeificado_por`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `instrutores_ibfk_1` FOREIGN KEY (`escolaridade_id`) REFERENCES `escolaridades` (`id`),
  CONSTRAINT `instrutores_ibfk_2` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `instrutores_ibfk_3` FOREIGN KEY (`modeificado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `instrutores_ibfk_4` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `instrutores` */

insert  into `instrutores`(`id`,`nome`,`data_nascimento`,`cpf`,`telefone`,`cep`,`estado`,`cidade`,`rua`,`numero`,`bairro`,`formacao`,`escolaridade_id`,`curriculo_lattes`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`email`) values (1,'Carlos Roberto','1990-07-01','123.598.365.75','6799587415','5844065','Mato Grosso do Sul','Campo Grande','Alves Pereira',78,'São Francisco','Engenheiro Civil',6,NULL,1,1,'2021-07-15 22:46:29',1,'2021-07-15 22:46:34','email@email.com');
insert  into `instrutores`(`id`,`nome`,`data_nascimento`,`cpf`,`telefone`,`cep`,`estado`,`cidade`,`rua`,`numero`,`bairro`,`formacao`,`escolaridade_id`,`curriculo_lattes`,`situacao_id`,`cadastrado_por`,`created`,`modeificado_por`,`modified`,`email`) values (2,'João Gomes','1994-07-01','458.982.365.15','6798562534','5844065','Mato Grosso do Sul','Campo Grande','Alves Pereira',78,'São Francisco','Enfermeiro',5,NULL,1,1,'2021-07-15 22:46:29',1,'2021-07-23 19:46:51','teste@email.com');

/*Table structure for table `phinxlog` */

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `phinxlog` */

insert  into `phinxlog`(`version`,`migration_name`,`start_time`,`end_time`,`breakpoint`) values (20210723233059,'InstrutoresEmail','2021-07-23 19:33:12','2021-07-23 19:33:12',0);
insert  into `phinxlog`(`version`,`migration_name`,`start_time`,`end_time`,`breakpoint`) values (20210726234828,'AddValorCurso','2021-07-26 20:04:08','2021-07-26 20:04:08',0);
insert  into `phinxlog`(`version`,`migration_name`,`start_time`,`end_time`,`breakpoint`) values (20210727014011,'AddTruma','2021-07-26 21:49:48','2021-07-26 21:49:48',0);

/*Table structure for table `situacoes` */

CREATE TABLE `situacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `situacoes` */

insert  into `situacoes`(`id`,`nome`) values (1,'Ativo');
insert  into `situacoes`(`id`,`nome`) values (2,'Desativado');
insert  into `situacoes`(`id`,`nome`) values (3,'Encerrado');

/*Table structure for table `usuarios` */

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_usuario_id` int(11) DEFAULT 1,
  `nome` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL COMMENT '1 - ativo 2 - desativado',
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  KEY `grupo_usuario_id` (`grupo_usuario_id`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`grupo_usuario_id`) REFERENCES `grupo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`grupo_usuario_id`,`nome`,`email`,`senha`,`situacao_id`) values (1,1,'admin','admin@dev.com','admin',1);
insert  into `usuarios`(`id`,`grupo_usuario_id`,`nome`,`email`,`senha`,`situacao_id`) values (2,2,'aluno','aluno@dev.com','aluno',1);
insert  into `usuarios`(`id`,`grupo_usuario_id`,`nome`,`email`,`senha`,`situacao_id`) values (3,2,'Cleyton Goulart','goulart@gmail.com','1234',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
