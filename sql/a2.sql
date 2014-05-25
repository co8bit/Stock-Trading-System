SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
DROP SCHEMA IF EXISTS `Capital`;
CREATE SCHEMA IF NOT EXISTS `Capital` DEFAULT CHARACTER SET utf8;
USE `Capital`;
-- -----------------------------------------
-- table for personal information check----
-- ----------------------------------------
DROP TABLE IF EXISTS `Capital`.`Person`;
CREATE TABLE IF NOT EXISTS `Capital`.`Person`(
	`id` INT(10) NOT NULL,
	`name` VARCHAR(32) NOT NULL,
	PRIMARY KEY(`id`)
)
ENGINE = InnoDB;

-- ------------------------------
-- table capitalaccount----------
-- ------------------------------
DROP TABLE IF EXISTS `Capital`.`CapitalAccount`;
CREATE TABLE IF NOT EXISTS `Capital`.`CapitalAccount`(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`guest_id` INT(10) NOT NULL,
	`active_balance` INT(10) NOT NULL DEFAULT '0',
	`passive_balance` INT(10) NOT NULL DEFAULT '0',
	`transaction_password` VARCHAR(32) NOT NULL,
	`withdraw_password` VARCHAR(32) NOT NULL,
	`status` INT NOT NULL DEFAULT '0',
	PRIMARY KEY(`id`),
	CONSTRAINT `name_fk` 
		FOREIGN KEY(`guest_id`) REFERENCES `Capital`.`Person`(`id`)
		ON DELETE NO ACTION
		ON UPDATE CASCADE
)
ENGINE = InnoDB;
-- ------------------------------
-- table capitalaccount card----------
-- ------------------------------
DROP TABLE IF EXISTS `Capital`.`CapitalAccountCard`;
CREATE TABLE IF NOT EXISTS `Capital`.`CapitalAccountCard`(
	`card_no` INT(10) NOT NULl AUTO_INCREMENT,
	`account_no` INT(10) NOT NULL,
	PRIMARY KEY(`card_no`),
	CONSTRAINT `card_fk` 
		FOREIGN KEY (`account_no`) REFERENCES `Capital`.`CapitalAccount`(`id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE 
)
ENGINE = InnoDB;

-- ------------------------------
-- table Logs--------------------
-- ------------------------------
DROP TABLE IF EXISTS `Capital`.`Log`;
CREATE TABLE IF NOT EXISTS `Capital`.`Log`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`admin_name` VARCHAR(32) NOT NULL,
	`log_info` VARCHAR(128) NOT NULL,
	`time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

-- ------------------------------
-- table admin-------------------
-- ------------------------------
DROP TABLE IF EXISTS `Capital`.`Admin`;
CREATE TABLE IF NOT EXISTS `Capital`.`Admin`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`admin_name` VARCHAR(32) NOT NULL,
	`password` VARCHAR(32) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

-- ------------------------------------------
-- table for capital stock account binding---
-- ------------------------------------------
DROP TABLE IF EXISTS `Capital`.`Capital_Stock_Binding`;
CREATE TABLE IF NOT EXISTS `Capital`.`Capital_Stock_Binding`(
	`capital_account` INT(10) NOT NULL,
	`stock_account` VARCHAR(32) NOT NULL,
	`status` INT NOT NULL DEFAULT '0',
	PRIMARY KEY(`capital_account`),
	CONSTRAINT `cap_sto_fk`
		FOREIGN KEY(`capital_account`) REFERENCES `Capital`.`CapitalAccount`(`id`)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)
ENGINE = InnoDB;

-- -------------------------------------------
-- -----initial values for table--------------
-- -------------------------------------------
INSERT INTO Person VALUES('30001','张一');
INSERT INTO Person VALUES('30002','张二');
INSERT INTO Person VALUES('30003','张三');
INSERT INTO Person VALUES('30004','张四');
INSERT INTO Person VALUES('30005','张五');
INSERT INTO Person VALUES('30006','张六');
INSERT INTO Person VALUES('30007','张七');
INSERT INTO Person VALUES('30008','张八');
INSERT INTO Person VALUES('30009','张九');
INSERT INTO Person VALUES('300010','张十');

INSERT INTO Admin VALUES(NULL, 'Admin1', '123456');
INSERT INTO Admin VALUES(NULL, 'Admin2', '234567');
