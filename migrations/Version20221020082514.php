<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020082514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `branches` (`id` INT AUTO_INCREMENT NOT NULL, `active` TINYINT(1) NOT NULL, `zipcode` INT NOT NULL, `client` INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `clients` (`id` INT AUTO_INCREMENT NOT NULL, `secret` VARCHAR(255) NOT NULL, `name` VARCHAR(255) NOT NULL, `active` TINYINT(1) NOT NULL, `short_description` VARCHAR(255) NOT NULL, `full_description` LONGTEXT NOT NULL, `logo_url` VARCHAR(255) DEFAULT NULL, `url` VARCHAR(255) DEFAULT NULL, `dpo` VARCHAR(255) NOT NULL, `technical_contact` VARCHAR(255) NOT NULL, `commercial_contact` VARCHAR(255) NOT NULL, `branches` INT NOT NULL, PRIMARY KEY(id), FOREIGN KEY (`branches`) REFERENCES `branches` (`id`)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `users` (`id` INT AUTO_INCREMENT NOT NULL, `firstname` VARCHAR(255) NOT NULL, `lastname` VARCHAR(255) NOT NULL, `email` VARCHAR(180) NOT NULL, `password` VARCHAR(255) NOT NULL, `roles` LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', `manages` VARCHAR(255) NULL, `owns` VARCHAR(255) NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `branches` ADD CONSTRAINT FK_D760D16F19EB6921 FOREIGN KEY (`client`) REFERENCES `clients` (`id`)');
        $this->addSql("CREATE TABLE `clients_grants` (
            `id` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
            `client_id` int(11) NOT NULL,
            `perms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{ \"members_read\": 0, \"members_write\": 0, \"members_payment_schedules_read\": 0, \"members_products_read\": 0, \"members_schedules_read\": 0, \"members_add\": 0, \"payment_schedules_read\": 0, \"payment_schedules_write\": 0, \"members_statistic_read\": 0, \"payment_day_read\": 0 }',
            `branch_id` int(11) NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A133119EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A1331DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `users`');
    }
}
