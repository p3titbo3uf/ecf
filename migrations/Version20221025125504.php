<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221025125504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE branches DROP FOREIGN KEY FK_D760D16F19EB6921');
        $this->addSql('DROP INDEX FK_D760D16F19EB6921 ON branches');
        $this->addSql('ALTER TABLE branches ADD name VARCHAR(255) NOT NULL, CHANGE client client_id INT NOT NULL');
        $this->addSql('ALTER TABLE branches ADD CONSTRAINT FK_D760D16F19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_D760D16F19EB6921 ON branches (client_id)');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY clients_ibfk_1');
        $this->addSql('DROP INDEX branches ON clients');
        $this->addSql('ALTER TABLE clients DROP branches');
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74 ON users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE branches DROP FOREIGN KEY FK_D760D16F19EB6921');
        $this->addSql('DROP INDEX IDX_D760D16F19EB6921 ON branches');
        $this->addSql('ALTER TABLE branches DROP name, CHANGE client_id client INT NOT NULL');
        $this->addSql('ALTER TABLE branches ADD CONSTRAINT FK_D760D16F19EB6921 FOREIGN KEY (client) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX FK_D760D16F19EB6921 ON branches (client)');
        $this->addSql('ALTER TABLE clients ADD branches INT NOT NULL');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT clients_ibfk_1 FOREIGN KEY (branches) REFERENCES branches (id)');
        $this->addSql('CREATE INDEX branches ON clients (branches)');
        $this->addSql('DROP INDEX uniq_1483a5e9e7927c74 ON `users`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON `users` (email)');
    }
}
