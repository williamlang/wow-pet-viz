<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1572461029.
 * Generated on 2019-10-30 18:43:49 by wlang
 */
class PropelMigration_1572461029
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `pets`

  ADD `type` VARCHAR(255) DEFAULT \'\' AFTER `href`,

  ADD `capturable` TINYINT(1) DEFAULT 0 AFTER `type`,

  ADD `tradeable` TINYINT(1) DEFAULT 0 AFTER `capturable`,

  ADD `battlepet` TINYINT(1) DEFAULT 0 AFTER `tradeable`,

  ADD `alliance_only` TINYINT(1) DEFAULT 0 AFTER `battlepet`,

  ADD `horde_only` TINYINT(1) DEFAULT 0 AFTER `alliance_only`,

  ADD `icon` VARCHAR(255) DEFAULT \'\' AFTER `horde_only`;

CREATE TABLE `abilities`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ability_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `abilities`;

ALTER TABLE `pets`

  DROP `type`,

  DROP `capturable`,

  DROP `tradeable`,

  DROP `battlepet`,

  DROP `alliance_only`,

  DROP `horde_only`,

  DROP `icon`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}