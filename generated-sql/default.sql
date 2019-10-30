
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- pets
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pets`;

CREATE TABLE `pets`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `pet_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `href` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) DEFAULT '',
    `description` text NOT NULL,
    `capturable` TINYINT(1) DEFAULT 0,
    `tradeable` TINYINT(1) DEFAULT 0,
    `battlepet` TINYINT(1) DEFAULT 0,
    `alliance_only` TINYINT(1) DEFAULT 0,
    `horde_only` TINYINT(1) DEFAULT 0,
    `icon` VARCHAR(255) DEFAULT '',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- abilities
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `abilities`;

CREATE TABLE `abilities`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ability_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pet_abilities
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pet_abilities`;

CREATE TABLE `pet_abilities`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ability_id` INTEGER NOT NULL,
    `pet_id` INTEGER NOT NULL,
    `slot` INTEGER NOT NULL,
    `level` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
