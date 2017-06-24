-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: br-cdbr-azure-south-b.cloudapp.net    Database: meuazuresql
-- ------------------------------------------------------
-- Server version	5.5.45-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Gerente'),(2,'Caixa'),(3,'Frentista');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuradorbonus`
--

DROP TABLE IF EXISTS `configuradorbonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuradorbonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `valor` decimal(14,2) DEFAULT NULL,
  `nivelHorizontalMax` int(11) DEFAULT NULL,
  `nivelProfundidadeMax` int(11) DEFAULT NULL,
  `Empresa_id` int(11) NOT NULL,
  `Empresa_GrupoEmpresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Empresa_id`,`Empresa_GrupoEmpresa_id`),
  KEY `fk_configuradorBonus_Empresa1_idx` (`Empresa_id`,`Empresa_GrupoEmpresa_id`),
  CONSTRAINT `fk_configuradorBonus_Empresa1` FOREIGN KEY (`Empresa_id`, `Empresa_GrupoEmpresa_id`) REFERENCES `empresa` (`id`, `GrupoEmpresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuradorbonus`
--

LOCK TABLES `configuradorbonus` WRITE;
/*!40000 ALTER TABLE `configuradorbonus` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuradorbonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(250) DEFAULT NULL,
  `GrupoEmpresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`GrupoEmpresa_id`),
  KEY `fk_Empresa_GrupoEmpresa1_idx` (`GrupoEmpresa_id`),
  CONSTRAINT `fk_Empresa_GrupoEmpresa1` FOREIGN KEY (`GrupoEmpresa_id`) REFERENCES `grupoempresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Abastece você',1),(2,'Ipirangão',1),(3,'Fagundes',11),(4,'Camarão',1),(5,'BrasilCombu',11);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) NOT NULL,
  `Empresa_id` int(11) NOT NULL,
  `Usuario_cpf` char(14) NOT NULL,
  PRIMARY KEY (`id`,`cargo_id`),
  KEY `fk_funcionario_cargo1_idx` (`cargo_id`),
  KEY `fk_funcionario_Empresa1_idx` (`Empresa_id`),
  KEY `fk_funcionario_Usuario1_idx` (`Usuario_cpf`),
  CONSTRAINT `fk_funcionario_Empresa1` FOREIGN KEY (`Empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_Usuario1` FOREIGN KEY (`Usuario_cpf`) REFERENCES `usuario` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_cargo1` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,1,1,'99679590020');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupoempresa`
--

DROP TABLE IF EXISTS `grupoempresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupoempresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupoempresa`
--

LOCK TABLES `grupoempresa` WRITE;
/*!40000 ALTER TABLE `grupoempresa` DISABLE KEYS */;
INSERT INTO `grupoempresa` VALUES (1,'Grupo Sul'),(11,'Grupo Norte');
/*!40000 ALTER TABLE `grupoempresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lancamento`
--

DROP TABLE IF EXISTS `lancamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lancamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valorTotal` decimal(14,2) DEFAULT NULL,
  `baixado` tinyint(1) DEFAULT NULL,
  `cliente_cpf` char(14) NOT NULL,
  `tipoLancamento_id` int(11) NOT NULL,
  `configuradorBonus_id` int(11) NOT NULL,
  `configuradorBonus_Empresa_id` int(11) NOT NULL,
  `configuradorBonus_Empresa_GrupoEmpresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cliente_cpf`,`tipoLancamento_id`,`configuradorBonus_id`,`configuradorBonus_Empresa_id`,`configuradorBonus_Empresa_GrupoEmpresa_id`),
  KEY `fk_lancamento_cliente1_idx` (`cliente_cpf`),
  KEY `fk_lancamento_tipoLancamento1_idx` (`tipoLancamento_id`),
  KEY `fk_lancamento_configuradorBonus1_idx` (`configuradorBonus_id`,`configuradorBonus_Empresa_id`,`configuradorBonus_Empresa_GrupoEmpresa_id`),
  CONSTRAINT `fk_lancamento_cliente1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_configuradorBonus1` FOREIGN KEY (`configuradorBonus_id`, `configuradorBonus_Empresa_id`, `configuradorBonus_Empresa_GrupoEmpresa_id`) REFERENCES `configuradorbonus` (`id`, `Empresa_id`, `Empresa_GrupoEmpresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_tipoLancamento1` FOREIGN KEY (`tipoLancamento_id`) REFERENCES `tipolancamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lancamento`
--

LOCK TABLES `lancamento` WRITE;
/*!40000 ALTER TABLE `lancamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `lancamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipolancamento`
--

DROP TABLE IF EXISTS `tipolancamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipolancamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(250) DEFAULT NULL,
  `tipoLancamentocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipolancamento`
--

LOCK TABLES `tipolancamento` WRITE;
/*!40000 ALTER TABLE `tipolancamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipolancamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Administrador');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `tipoUsuario_id` int(11) NOT NULL,
  PRIMARY KEY (`cpf`,`tipoUsuario_id`),
  KEY `fk_Usuario_tipoUsuario_idx` (`tipoUsuario_id`),
  CONSTRAINT `fk_Usuario_tipoUsuario` FOREIGN KEY (`tipoUsuario_id`) REFERENCES `tipousuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('2725288873','claiton','claiton@faccat.br','1234',1),('99679590020','Alexandro da Silva','alex@aluno.faccat.br','123',1),('99679590021','juda da silva','juca@aluno.faccat.br','123',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qtdTotal` int(11) DEFAULT NULL,
  `desconto` decimal(14,2) DEFAULT NULL,
  `valorTotal` decimal(14,2) DEFAULT NULL,
  `cliente_cpf` char(14) NOT NULL,
  `Empresa_id` int(11) NOT NULL,
  `Empresa_GrupoEmpresa_id` int(11) NOT NULL,
  `lancamento_id` int(11) NOT NULL,
  `lancamento_cliente_cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`id`,`cliente_cpf`,`Empresa_id`,`Empresa_GrupoEmpresa_id`),
  KEY `fk_venda_cliente1_idx` (`cliente_cpf`),
  KEY `fk_venda_Empresa1_idx` (`Empresa_id`,`Empresa_GrupoEmpresa_id`),
  KEY `fk_venda_lancamento1_idx` (`lancamento_id`,`lancamento_cliente_cpf`),
  CONSTRAINT `fk_venda_cliente1` FOREIGN KEY (`cliente_cpf`) REFERENCES `cliente` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_Empresa1` FOREIGN KEY (`Empresa_id`, `Empresa_GrupoEmpresa_id`) REFERENCES `empresa` (`id`, `GrupoEmpresa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_lancamento1` FOREIGN KEY (`lancamento_id`, `lancamento_cliente_cpf`) REFERENCES `lancamento` (`id`, `cliente_cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'meuazuresql'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-24  8:07:37
