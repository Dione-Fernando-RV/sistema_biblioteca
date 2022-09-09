/*
SQLyog Ultimate
MySQL - 10.3.13-MariaDB : Database - sistema_biblioteca
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `categorias` */

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`nome`,`situacao_id`) values (1,'Aventura ',NULL);
insert  into `categorias`(`id`,`nome`,`situacao_id`) values (2,'Terror',NULL);

/*Table structure for table `clientes` */

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `data_nascimento` date DEFAULT '1990-09-09',
  `cpf` varchar(250) DEFAULT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `cidade` varchar(250) DEFAULT NULL,
  `bairro` varchar(250) DEFAULT NULL,
  `rua` varchar(250) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cadastro_completo` int(11) DEFAULT NULL COMMENT '0 - não  1 - sim',
  `tipo_cadastro_id` int(11) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT 1 COMMENT '1 - ativo  2 - desativado',
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modeificado_por` (`modificado_por`),
  KEY `situacao_id` (`situacao_id`),
  KEY `tipo_cadastro_id` (`tipo_cadastro_id`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`tipo_cadastro_id`) REFERENCES `tipo_cadastro` (`id`),
  CONSTRAINT `clientes_ibfk_3` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `clientes_ibfk_4` FOREIGN KEY (`modificado_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

/*Table structure for table `editoras` */

CREATE TABLE `editoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL,
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modificado_por` (`modificado_por`),
  CONSTRAINT `editoras_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `editoras_ibfk_2` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `editoras_ibfk_3` FOREIGN KEY (`modificado_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `editoras` */

/*Table structure for table `grupo_usuario` */

CREATE TABLE `grupo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT 1 COMMENT '1 - ativo  2 - desativado',
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  CONSTRAINT `grupo_usuario_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `grupo_usuario` */

insert  into `grupo_usuario`(`id`,`nome`,`situacao_id`) values (1,'ADM',1);

/*Table structure for table `livros` */

CREATE TABLE `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `editora_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT NULL,
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `editora_id` (`editora_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `situacao_id` (`situacao_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modificado_por` (`modificado_por`),
  CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`editora_id`) REFERENCES `editoras` (`id`),
  CONSTRAINT `livros_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `livros_ibfk_3` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `livros_ibfk_4` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `livros_ibfk_5` FOREIGN KEY (`modificado_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `livros` */

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

/*Table structure for table `tipo_cadastro` */

CREATE TABLE `tipo_cadastro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_cadastro` */

/*Table structure for table `usuarios` */

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_usuario_id` int(11) DEFAULT 1,
  `nome` varchar(250) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `situacao_id` int(11) DEFAULT 1 COMMENT '1 - ativo 2 - desativado',
  `cliente_id` int(11) DEFAULT NULL,
  `cadastrado_por` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `situacao_id` (`situacao_id`),
  KEY `grupo_usuario_id` (`grupo_usuario_id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `cadastrado_por` (`cadastrado_por`),
  KEY `modificado_por` (`modificado_por`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`),
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`grupo_usuario_id`) REFERENCES `grupo_usuario` (`id`),
  CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `usuarios_ibfk_5` FOREIGN KEY (`cadastrado_por`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `usuarios_ibfk_6` FOREIGN KEY (`modificado_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`grupo_usuario_id`,`nome`,`telefone`,`email`,`senha`,`situacao_id`,`cliente_id`,`cadastrado_por`,`created`,`modificado_por`,`modified`) values (60,1,'Administrador','(67)9920369995','admin@dev.com','$2y$10$ZnVUkj.juVgKMqH84CkugepBCP1t.yiFd3R3vUnx61eLFd0S76iNW',1,NULL,NULL,'2022-09-05 20:47:12',NULL,'2022-09-05 20:47:16');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
