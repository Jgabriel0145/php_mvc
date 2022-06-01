-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_sistema
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_sistema
-- -----------------------------------------------------
DROP DATABASE db_sistema;
CREATE SCHEMA IF NOT EXISTS `db_sistema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `db_sistema` ;

-- -----------------------------------------------------
-- Table `db_sistema`.`categoria_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema`.`categoria_produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb3;
truncate categoria_produto;


-- -----------------------------------------------------
-- Table `db_sistema`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `rg` VARCHAR(45) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `salario` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_sistema`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema`.`pessoa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `rg` VARCHAR(45) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `telefone` VARCHAR(11) NULL DEFAULT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC) VISIBLE,
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `db_sistema`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `preco` DOUBLE NOT NULL,
  `id_categoria_produto` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `categoria_produto_idx` (`id_categoria_produto` ASC) VISIBLE,
  CONSTRAINT `categoria_produto`
    FOREIGN KEY (`id_categoria_produto`)
    REFERENCES `db_sistema`.`categoria_produto` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

insert into categoria_produto (categoria) values ('Limpeza'),('Hortifruti'),('Açougue'),('Padaria'),
('Frios'),('Bebidas'),('Peixes'),('Higiene'),('Enlatados'),('Mercearia');


/*insert into produto (nome, descricao, preco, id_categoria_produto) values ('Pao','Pao',0.99,3);*/

create view produto_com_categoria as
	select nome,descricao,preco,categoria from produto p
	join categoria_produto cp on (p.id_categoria_produto = cp.id);

select * from produto_com_categoria;