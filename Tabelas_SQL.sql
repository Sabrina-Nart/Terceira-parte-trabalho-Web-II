
CREATE TABLE `confeitaria`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `complemento` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `sexo`, `complemento`) VALUES
(1, 'Isadora Comin', '68952314484', '48995326589', 'Siderópolis', 'F', ''),
(2, 'Sabrina Comin Nart ', '54541584584', '54158415841', 'Siderópolis', 'F', 'Paga no débito'),
(3, 'Maria Lúcia dos Santos', '56458496596', '84848548548', 'Nova Veneza', 'F', 'Maria não paga corretamente, por isso não podemos mais vender mercadoria para ela'),
(4, 'Adriana Aparecida', '48548548548', '47', '', 'F', '');



CREATE TABLE `confeitaria`.`confeiteiro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `especialidade` CHAR(1) NOT NULL,
  `data_contratacao` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



INSERT INTO `confeiteiro` (`id`, `nome`, `especialidade`, `data_contratacao`) VALUES
(1, 'Marcos Gonçalves ', 'S', '2023-04-05'),
(3, 'Rosilene Gonçalves ', 'B', '2023-04-05'),
(4, 'Rita Gonçalves', 'D', '2023-04-05');



CREATE TABLE `confeitaria`.`produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `tipo` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


INSERT INTO `produtos` (`id`, `descricao`, `tipo`) VALUES
(1, 'Leite Longa Vida', 'L'),
(2, 'Pão Doce', 'P'),
(3, 'Pão de Queijo', 'P'),
(4, 'Sonho ', 'P'),
(5, 'Tomate', 'H');



CREATE TABLE `confeitaria`.`estoque` (
  `id_produtos` INT(11) NOT NULL,
  `quantidade_estoque` INT(5) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



CREATE TABLE `confeitaria`.`tipo_gasto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `confeitaria`.`valor_gasto_mensalmente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_gasto` INT(11) NOT NULL,
  `mes_gasto` DATE NOT NULL,
  `total` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE `confeitaria`.`precos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_produtos` INT(11) NOT NULL,
  `id_tipo_gasto` INT(11) NOT NULL,
  `valor_mercado` DECIMAL(4,2) NOT NULL,
  `quantidade_comprada` INT(5) NOT NULL,
  `mes_compra` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `confeitaria`.`encomenda_produtos` (
  `id_encomenda` INT(11) NOT NULL AUTO_INCREMENT,
  `id_produtos` INT(11) NOT NULL,
  `quantidade` INT(5) NOT NULL,
  PRIMARY KEY (`id_encomenda`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `confeitaria`.`encomenda` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_confeiteiro` INT(11) NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  `forma_pagamento` CHAR(1) NOT NULL,
  `id_encomenda_produto` INT(11) NOT NULL,
  `data_entrega` DATE NOT NULL,
  `total` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `confeitaria`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `status` CHAR(1) NOT NULL,
  `admin` CHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



ALTER TABLE `valor_gasto_mensalmente` ADD CONSTRAINT `fk_valor_id_tipo_gasto` FOREIGN KEY (`id_tipo_gasto`) REFERENCES `tipo_gasto`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;



ALTER TABLE `precos` ADD CONSTRAINT `fk_id_precos_tipo_gasto` FOREIGN KEY (`id_tipo_gasto`) REFERENCES `tipo_gasto`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;



ALTER TABLE `precos` ADD CONSTRAINT `fk_precos_id_produtos` FOREIGN KEY (`id_produtos`) REFERENCES `produtos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;



ALTER TABLE `estoque` ADD CONSTRAINT `fk_estoque_id_produtos` FOREIGN KEY (`id_produtos`) REFERENCES `produtos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;



ALTER TABLE `encomenda_produtos` ADD CONSTRAINT `fk_encomenda_id_produtos` FOREIGN KEY (`id_produtos`) REFERENCES `produtos`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;



ALTER TABLE `encomenda`
  ADD KEY `fk_encomenda_id_confeiteiro_idx` (`id_confeiteiro`),
  ADD KEY `fk_encomenda_id_cliente_idx` (`id_cliente`),
  ADD KEY `fk_encomenda_id_encomenda_idx` (`id_encomenda_produto`);



ALTER TABLE `encomenda`
  ADD CONSTRAINT `fk_encomenda_id_confeiteiro` FOREIGN KEY (`id_confeiteiro`) REFERENCES `confeiteiro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encomenda_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encomenda_id_encomenda` FOREIGN KEY (`id_encomenda_produto`) REFERENCES `encomenda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `confeitaria`.`estoque` 
CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT FIRST;
