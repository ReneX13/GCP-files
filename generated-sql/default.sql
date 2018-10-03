
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Admin
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Admin`;

CREATE TABLE `Admin`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(64) NOT NULL,
    `password_hash` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `username` (`username`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Cart
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Cart`;

CREATE TABLE `Cart`
(
    `user_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    `amount` INTEGER NOT NULL,
    PRIMARY KEY (`user_id`,`product_id`),
    INDEX `product_id` (`product_id`),
    CONSTRAINT `Cart_ibfk_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `Users` (`id`),
    CONSTRAINT `Cart_ibfk_2`
        FOREIGN KEY (`product_id`)
        REFERENCES `Products` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- MailingAddress
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `MailingAddress`;

CREATE TABLE `MailingAddress`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `state` VARCHAR(64) NOT NULL,
    `city` VARCHAR(64) NOT NULL,
    `zip` INTEGER(5) NOT NULL,
    `street` VARCHAR(128) NOT NULL,
    `user_id` INTEGER(12) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user_id` (`user_id`),
    CONSTRAINT `user_id`
        FOREIGN KEY (`user_id`)
        REFERENCES `Users` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Products
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Products`;

CREATE TABLE `Products`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `rated` VARCHAR(3) NOT NULL,
    `price` FLOAT(12,2) NOT NULL,
    `inventory` INTEGER(12) NOT NULL,
    `description` TEXT NOT NULL,
    `ImgFile` VARCHAR(64),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Transactions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Transactions`;

CREATE TABLE `Transactions`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `reciept` TEXT NOT NULL,
    `user_id` INTEGER(12) NOT NULL,
    `mailing_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user_id2` (`user_id`),
    INDEX `mailing_id` (`mailing_id`),
    CONSTRAINT `mailing_id`
        FOREIGN KEY (`mailing_id`)
        REFERENCES `MailingAddress` (`id`),
    CONSTRAINT `user_id2`
        FOREIGN KEY (`user_id`)
        REFERENCES `Users` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(64) NOT NULL,
    `last_name` VARCHAR(64) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    `password_hash` VARCHAR(128) NOT NULL,
    `paypal_email` VARCHAR(64) NOT NULL,
    `join_date` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `email` (`email`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
