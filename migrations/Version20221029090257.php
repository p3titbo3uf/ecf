<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221029090257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients_grants DROP FOREIGN KEY FK_617A1331DCD6CC49');
        $this->addSql('ALTER TABLE clients_grants DROP FOREIGN KEY FK_617A133119EB6921');
        $this->addSql('ALTER TABLE clients_grants CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE perms perms VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX fk_617a133119eb6921 ON clients_grants');
        $this->addSql('CREATE INDEX IDX_617A133119EB6921 ON clients_grants (client_id)');
        $this->addSql('DROP INDEX fk_617a1331dcd6cc49 ON clients_grants');
        $this->addSql('CREATE INDEX IDX_617A1331DCD6CC49 ON clients_grants (branch_id)');
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A1331DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id)');
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A133119EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients_grants MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON clients_grants');
        $this->addSql('ALTER TABLE clients_grants DROP FOREIGN KEY FK_617A133119EB6921');
        $this->addSql('ALTER TABLE clients_grants DROP FOREIGN KEY FK_617A1331DCD6CC49');
        $this->addSql('ALTER TABLE clients_grants CHANGE id id INT NOT NULL, CHANGE perms perms LONGTEXT DEFAULT \'{ "members_read": 0, "members_write": 0, "members_payment_schedules_read": 0, "members_products_read": 0, "members_schedules_read": 0, "members_add": 0, "payment_schedules_read": 0, "payment_schedules_write": 0, "members_statistic_read": 0, "payment_day_read": 0 }\' NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('DROP INDEX idx_617a1331dcd6cc49 ON clients_grants');
        $this->addSql('CREATE INDEX FK_617A1331DCD6CC49 ON clients_grants (branch_id)');
        $this->addSql('DROP INDEX idx_617a133119eb6921 ON clients_grants');
        $this->addSql('CREATE INDEX FK_617A133119EB6921 ON clients_grants (client_id)');
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A133119EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE clients_grants ADD CONSTRAINT FK_617A1331DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branches (id)');
    }
}
