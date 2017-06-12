-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoUsuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `cpf` INT NOT NULL,
  `nome` VARCHAR(250) NULL,
  `email` VARCHAR(250) NULL,
  `senha` VARCHAR(20) NULL,
  `tipoUsuario_id` INT NOT NULL,
  PRIMARY KEY (`cpf`, `tipoUsuario_id`),
  INDEX `fk_Usuario_tipoUsuario_idx` (`tipoUsuario_id` ASC),
  CONSTRAINT `fk_Usuario_tipoUsuario`
    FOREIGN KEY (`tipoUsuario_id`)
    REFERENCES `mydb`.`tipoUsuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cargo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`GrupoEmpresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`GrupoEmpresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(250) NULL,
  `GrupoEmpresa_id` INT NOT NULL,
  PRIMARY KEY (`id`, `GrupoEmpresa_id`),
  INDEX `fk_Empresa_GrupoEmpresa1_idx` (`GrupoEmpresa_id` ASC),
  CONSTRAINT `fk_Empresa_GrupoEmpresa1`
    FOREIGN KEY (`GrupoEmpresa_id`)
    REFERENCES `mydb`.`GrupoEmpresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cargo_id` INT NOT NULL,
  `Empresa_id` INT NOT NULL,
  `Empresa_GrupoEmpresa_id` INT NOT NULL,
  `Usuario_cpf` INT NOT NULL,
  `Usuario_tipoUsuario_id` INT NOT NULL,
  PRIMARY KEY (`id`, `cargo_id`),
  INDEX `fk_funcionario_cargo1_idx` (`cargo_id` ASC),
  INDEX `fk_funcionario_Empresa1_idx` (`Empresa_id` ASC, `Empresa_GrupoEmpresa_id` ASC),
  INDEX `fk_funcionario_Usuario1_idx` (`Usuario_cpf` ASC, `Usuario_tipoUsuario_id` ASC),
  CONSTRAINT `fk_funcionario_cargo1`
    FOREIGN KEY (`cargo_id`)
    REFERENCES `mydb`.`cargo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_Empresa1`
    FOREIGN KEY (`Empresa_id` , `Empresa_GrupoEmpresa_id`)
    REFERENCES `mydb`.`Empresa` (`id` , `GrupoEmpresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_Usuario1`
    FOREIGN KEY (`Usuario_cpf` , `Usuario_tipoUsuario_id`)
    REFERENCES `mydb`.`Usuario` (`cpf` , `tipoUsuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoLancamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoLancamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(250) NULL,
  `tipoLancamentocol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `cpf` VARCHAR(11) NOT NULL,
  `nome` VARCHAR(250) NULL,
  `email` VARCHAR(250) NULL,
  PRIMARY KEY (`cpf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`configuradorBonus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`configuradorBonus` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `valor` DECIMAL(14,2) NULL,
  `nivelHorizontalMax` INT NULL,
  `nivelProfundidadeMax` INT NULL,
  `Empresa_id` INT NOT NULL,
  `Empresa_GrupoEmpresa_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Empresa_id`, `Empresa_GrupoEmpresa_id`),
  INDEX `fk_configuradorBonus_Empresa1_idx` (`Empresa_id` ASC, `Empresa_GrupoEmpresa_id` ASC),
  CONSTRAINT `fk_configuradorBonus_Empresa1`
    FOREIGN KEY (`Empresa_id` , `Empresa_GrupoEmpresa_id`)
    REFERENCES `mydb`.`Empresa` (`id` , `GrupoEmpresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`lancamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`lancamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valorTotal` DECIMAL(14,2) NULL,
  `baixado` TINYINT(1) NULL,
  `cliente_cpf` VARCHAR(11) NOT NULL,
  `tipoLancamento_id` INT NOT NULL,
  `configuradorBonus_id` INT NOT NULL,
  `configuradorBonus_Empresa_id` INT NOT NULL,
  `configuradorBonus_Empresa_GrupoEmpresa_id` INT NOT NULL,
  PRIMARY KEY (`id`, `cliente_cpf`, `tipoLancamento_id`, `configuradorBonus_id`, `configuradorBonus_Empresa_id`, `configuradorBonus_Empresa_GrupoEmpresa_id`),
  INDEX `fk_lancamento_cliente1_idx` (`cliente_cpf` ASC),
  INDEX `fk_lancamento_tipoLancamento1_idx` (`tipoLancamento_id` ASC),
  INDEX `fk_lancamento_configuradorBonus1_idx` (`configuradorBonus_id` ASC, `configuradorBonus_Empresa_id` ASC, `configuradorBonus_Empresa_GrupoEmpresa_id` ASC),
  CONSTRAINT `fk_lancamento_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `mydb`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_tipoLancamento1`
    FOREIGN KEY (`tipoLancamento_id`)
    REFERENCES `mydb`.`tipoLancamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_configuradorBonus1`
    FOREIGN KEY (`configuradorBonus_id` , `configuradorBonus_Empresa_id` , `configuradorBonus_Empresa_GrupoEmpresa_id`)
    REFERENCES `mydb`.`configuradorBonus` (`id` , `Empresa_id` , `Empresa_GrupoEmpresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`venda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `qtdTotal` INT NULL,
  `desconto` DECIMAL(14,2) NULL,
  `valorTotal` DECIMAL(14,2) NULL,
  `cliente_cpf` VARCHAR(11) NOT NULL,
  `Empresa_id` INT NOT NULL,
  `Empresa_GrupoEmpresa_id` INT NOT NULL,
  `lancamento_id` INT NOT NULL,
  `lancamento_cliente_cpf` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`, `cliente_cpf`, `Empresa_id`, `Empresa_GrupoEmpresa_id`),
  INDEX `fk_venda_cliente1_idx` (`cliente_cpf` ASC),
  INDEX `fk_venda_Empresa1_idx` (`Empresa_id` ASC, `Empresa_GrupoEmpresa_id` ASC),
  INDEX `fk_venda_lancamento1_idx` (`lancamento_id` ASC, `lancamento_cliente_cpf` ASC),
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `mydb`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_Empresa1`
    FOREIGN KEY (`Empresa_id` , `Empresa_GrupoEmpresa_id`)
    REFERENCES `mydb`.`Empresa` (`id` , `GrupoEmpresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_lancamento1`
    FOREIGN KEY (`lancamento_id` , `lancamento_cliente_cpf`)
    REFERENCES `mydb`.`lancamento` (`id` , `cliente_cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
