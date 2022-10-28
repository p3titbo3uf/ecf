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
        $this->addSql("INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `roles`, `manages`, `owns`) VALUES
        (1, 'Robert', 'Hue', 'robert@hue.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_TECH\"]', NULL, NULL),
        (2, 'Miou', 'Miou', 'miou@miou.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_CLIENT\"]', NULL, '1'),
        (3, 'Louis', 'Garrel', 'louis@garrel.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_STRUCTURE\"]', '4', '1'),
        (4, 'Louise', 'Michel', 'louise@michel.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_CLIENT\"]', NULL, '2'),
        (5, 'Leïa', 'Skywalker', 'leia@skywalker.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_CLIENT\"]', NULL, '3'),
        (6, 'So', 'Ko', 'so@ko.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_STRUCTURE\"]', '8', '3'),
        (7, 'Edith', 'Piaf', 'edith@piaf.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_STRUCTURE\"]', '6', '2')");
        $this->addSql("INSERT INTO `clients` (`id`, `secret`, `name`, `active`, `short_description`, `full_description`, `logo_url`, `url`, `dpo`, `technical_contact`, `commercial_contact`) VALUES
        (1, 'secret3', 'Fitness Mania', 0, 'Minim in consequat esse est pariatur fugiat.', 'Dolor in sit id laborum labore incididunt deserunt sunt nostrud. Velit exercitation adipisicing commodo qui esse dolore minim laboris. Ea officia do velit reprehenderit incididunt sint laboris excepteur cillum do occaecat excepteur. Dolor exercitation excepteur magna pariatur. Deserunt culpa aute voluptate ex fugiat ex fugiat anim nulla aliquip nulla. Adipisicing ea adipisicing labore qui ipsum deserunt veniam minim sunt.', NULL, 'fitnessmania.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (2, 's', 'CMG', 1, 'Eu labore minim ea deserunt culpa excepteur.', 'Aliquip esse aliquip officia sunt magna duis minim ullamco tempor. Reprehenderit dolore eiusmod aute cupidatat consequat eu. Ea ea qui proident esse eiusmod irure duis mollit qui. Mollit veniam do excepteur consequat eu ullamco id magna ad occaecat. Nulla velit laboris irure qui ut eu qui exercitation anim mollit deserunt dolore. In Lorem aliqua aliquip nostrud consectetur reprehenderit ex irure ex tempor magna labore. Do anim voluptate pariatur tempor aliqua eu.', NULL, 'cmg.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (3, 'Sport ensemble', 'Sport ensemble', 0, 'Ad ea officia fugiat et et nulla.', 'In cupidatat dolor consectetur fugiat labore ipsum deserunt laboris deserunt id in dolor. Nostrud laborum enim irure quis esse irure ad consequat mollit quis excepteur exercitation anim dolore. Dolore culpa nisi eiusmod aliqua voluptate laboris dolor. Veniam velit sit exercitation in irure eu voluptate dolor irure cupidatat anim consequat culpa. Fugiat consequat anim laborum in voluptate culpa aute est occaecat. Voluptate duis occaecat non adipisicing irure cillum.Consequat elit irure culpa aliquip elit adipisicing nostrud commodo nulla sit enim excepteur. Velit deserunt nostrud cillum amet elit amet sunt aliqua est exercitation.', NULL, 'sportensemble.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (4, 'secret4', 'Sport en ville', 1, 'Tempor nostrud consectetur magna irure deserunt id officia voluptate commodo ut ea ullamco.', 'Irure mollit non reprehenderit sint sunt officia commodo ex nisi id ad. Deserunt proident officia velit irure non laboris officia elit labore esse quis esse. Exercitation laboris irure reprehenderit nostrud magna ullamco sunt nulla fugiat ipsum cillum excepteur deserunt. Velit laborum anim exercitation adipisicing consequat.Ut velit aliquip ipsum consequat velit deserunt. Ipsum qui ea sunt proident nisi minim labore excepteur et sunt nisi. Anim aliquip occaecat nostrud occaecat magna exercitation laborum consequat nisi amet. Fugiat deserunt laboris officia incididunt elit enim sit aliquip cillum laborum labore.', NULL, 'sportenville.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (5, 'secret', 'Fitness after work', 1, 'Fugiat est sit sint enim aliquip adipisicing culpa est et consectetur officia veniam incididunt dolor.', 'Consequat laboris ullamco laboris cupidatat sit cupidatat officia veniam nisi quis qui. Do est sunt fugiat duis veniam ullamco incididunt enim. Enim voluptate aliqua culpa ipsum cillum ut ipsum amet exercitation in.Ad occaecat est quis exercitation laborum minim eu ea irure. Officia ipsum sunt cupidatat dolor labore non do veniam quis amet nisi consectetur velit. Pariatur dolor sunt in labore pariatur consequat velit nisi incididunt sint pariatur. Voluptate incididunt amet occaecat ut commodo cillum sit aliquip amet cupidatat nisi. Excepteur est officia elit ad laboris aliquip ea. Dolor consequat voluptate eiusmod anim in elit.', NULL, 'fitnessafterwork.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (6, 'secret', 'Fitness and chill', 1, '\nIncididunt sunt ut ex labore sint velit ea dolore.', '\nIrure elit ut incididunt in nostrud eu velit cillum. Pariatur esse elit dolore pariatur. Id dolore adipisicing veniam velit. Deserunt in deserunt quis qui mollit do nostrud qui qui nulla anim adipisicing. Officia proident mollit sint cillum amet consequat do tempor duis nulla sint. Lorem adipisicing magna dolor laborum in dolore id ex. Commodo occaecat exercitation labore velit Lorem do aute cupidatat anim.\n', NULL, 'fitnessandchill.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (7, 'secret', 'Green and run', 1, '\nEu est commodo pariatur ullamco laboris cupidatat velit commodo est reprehenderit ut mollit exercitation.\n', '\nNostrud incididunt proident laboris veniam Lorem cillum ex laborum nostrud laboris. Ut minim duis dolore amet cillum officia nulla veniam culpa id excepteur ut. Non duis ipsum magna ullamco ex irure laboris ut cupidatat ipsum fugiat minim eiusmod. Consectetur eiusmod officia tempor excepteur culpa. Dolore ipsum do sint aute cupidatat non excepteur. Fugiat ea mollit aute duis tempor anim ipsum reprehenderit sit elit mollit minim do. Occaecat aute enim dolore fugiat nostrud laborum ex.\n', NULL, 'greenandrun.fr', 'contact_dpo', 'contact_technique', 'contact_commercial'),
        (8, 'secret', 'Sports, so what', 1, '\nExcepteur eu reprehenderit cupidatat veniam labore ullamco excepteur dolore elit exercitation ea velit.', '\nLaboris ullamco in sunt ut culpa do consequat mollit ut reprehenderit dolor dolor proident. Reprehenderit aute sint ad pariatur in proident qui qui culpa. Dolor labore commodo tempor quis. Esse non non sint dolor sit ad deserunt consectetur irure velit. Id proident culpa mollit cupidatat reprehenderit adipisicing labore magna nulla et.', NULL, 'sportsowhat.fr', 'contact_dpo', 'contact_technique', 'contact_commercial')");
        $this->addSql("INSERT INTO `branches` (`id`, `active`, `zipcode`, `client_id`, `name`) VALUES
        (1, 1, 59000, 1, 'Roubaix'),
        (2, 1, 68000, 8, 'Mulhouse'),
        (3, 1, 56000, 1, 'Vannes'),
        (4, 1, 13000, 1, 'Marseille'),
        (5, 1, 69000, 2, 'Lyon'),
        (6, 1, 59000, 2, 'Arras'),
        (7, 1, 35000, 3, 'Rennes'),
        (8, 1, 45000, 3, 'Orléans'),
        (9, 1, 47000, 3, 'Agen'),
        (10, 1, 56000, 4, 'Vannes'),
        (11, 1, 61000, 4, 'Senlis'),
        (12, 1, 33000, 5, 'Bordeaux'),
        (13, 1, 31000, 5, 'Toulouse'),
        (14, 1, 8000, 6, 'Rethel'),
        (15, 1, 34000, 6, 'Montpellier'),
        (16, 1, 46000, 7, 'Cahors'),
        (17, 1, 46000, 7, 'Figeac'),
        (18, 1, 12000, 7, 'Capdenac-Gare'),
        (19, 1, 54000, 8, 'Nancy'),
        (20, 1, 67000, 8, 'Strasbourg')");
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
