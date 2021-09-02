#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`createdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`bio` LONGTEXT NULL,
	`role` VARCHAR(50) NOT NULL DEFAULT 'Utilisateur',
	`imgu` VARCHAR(255) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=11
;



#------------------------------------------------------------
# Table: Recipe
#------------------------------------------------------------

CREATE TABLE `recipe` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`recipename` VARCHAR(255) NOT NULL,
	`approuved` TINYINT(1) NOT NULL DEFAULT '0',
	`price` VARCHAR(255) NOT NULL,
	`duration` VARCHAR(255) NOT NULL,
	`txt` LONGTEXT NOT NULL,
	`difficulty` VARCHAR(50) NOT NULL DEFAULT '',
	`type_recipe` VARCHAR(255) NOT NULL,
	`imgr` VARCHAR(255) NULL DEFAULT NULL,
	`nat_recipe` VARCHAR(255) NOT NULL,
	`createdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_id` INT(11) NOT NULL,
	`person` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `Recipe_User_FK` (`user_id`),
	CONSTRAINT `Recipe_User_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;



#------------------------------------------------------------
# Table: ingredient
#------------------------------------------------------------

CREATE TABLE `ingredient` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`ingredientname` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;



#------------------------------------------------------------
# Table: Notation
#------------------------------------------------------------

CREATE TABLE `notation` (
	`recipe_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	`score` INT(11) NOT NULL,
	`scoredate` DATETIME NOT NULL,
	`comment` LONGTEXT NOT NULL,
	PRIMARY KEY (`recipe_id`, `user_id`),
	INDEX `Notation_User0_FK` (`user_id`),
	CONSTRAINT `Notation_Recipe_FK` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
	CONSTRAINT `Notation_User0_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;



#------------------------------------------------------------
# Table: Compose
#------------------------------------------------------------

CREATE TABLE `compose` (
	`ingredient_id` INT(11) NOT NULL,
	`recipe_id` INT(11) NOT NULL,
	`quantity` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`ingredient_id`, `recipe_id`),
	INDEX `Compose_Recipe0_FK` (`recipe_id`),
	CONSTRAINT `Compose_Recipe0_FK` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
	CONSTRAINT `Compose_ingredient_FK` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


