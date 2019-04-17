<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415094826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bon (id INT AUTO_INCREMENT NOT NULL, workshop_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_FC7DFD6B97C6CD4D (workshop_id_id), UNIQUE INDEX UNIQ_FC7DFD6B9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, adres VARCHAR(255) NOT NULL, plaats VARCHAR(255) DEFAULT NULL, beschikbaarheid TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshop (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, naam VARCHAR(255) NOT NULL, min_personen INT DEFAULT NULL, max_personen INT DEFAULT NULL, datum DATETIME NOT NULL, tijd TIME NOT NULL, prijs INT NOT NULL, INDEX IDX_9B6F02C49D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshop_location (workshop_id INT NOT NULL, location_id INT NOT NULL, INDEX IDX_DD0F431E1FDCE57C (workshop_id), INDEX IDX_DD0F431E64D218E (location_id), PRIMARY KEY(workshop_id, location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bon ADD CONSTRAINT FK_FC7DFD6B97C6CD4D FOREIGN KEY (workshop_id_id) REFERENCES workshop (id)');
        $this->addSql('ALTER TABLE bon ADD CONSTRAINT FK_FC7DFD6B9D86650F FOREIGN KEY (user_id_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE workshop ADD CONSTRAINT FK_9B6F02C49D86650F FOREIGN KEY (user_id_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE workshop_location ADD CONSTRAINT FK_DD0F431E1FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workshop_location ADD CONSTRAINT FK_DD0F431E64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE workshop_location DROP FOREIGN KEY FK_DD0F431E64D218E');
        $this->addSql('ALTER TABLE bon DROP FOREIGN KEY FK_FC7DFD6B97C6CD4D');
        $this->addSql('ALTER TABLE workshop_location DROP FOREIGN KEY FK_DD0F431E1FDCE57C');
        $this->addSql('DROP TABLE bon');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE workshop');
        $this->addSql('DROP TABLE workshop_location');
    }
}
