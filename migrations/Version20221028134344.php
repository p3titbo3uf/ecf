<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028134344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE `clients_grants` (
            `id` int(11) NOT NULL,
            `client_id` int(11) NOT NULL,
            `perms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{ \"members_read\": 0, \"members_write\": 0, \"members_payment_schedules_read\": 0, \"members_products_read\": 0, \"members_schedules_read\": 0, \"members_add\": 0, \"payment_schedules_read\": 0, \"payment_schedules_write\": 0, \"members_statistic_read\": 0, \"payment_day_read\": 0 }',
            `branch_id` int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A133119EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A1331DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients_grants DROP FOREIGN KEY FK_617A133119EB6921');
        $this->addSql('ALTER TABLE clients_grants DROP FOREIGN KEY FK_617A1331DCD6CC49');
        $this->addSql('DROP TABLE clients_grants');
    }
}
