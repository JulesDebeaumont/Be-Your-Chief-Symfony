<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425120255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB9C24126');
        $this->addSql('DROP TABLE day');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7542B45E237E06 ON ingredient_sort (name)');
        $this->addSql('DROP INDEX IDX_5A3811FB9C24126 ON schedule');
        $this->addSql('ALTER TABLE schedule ADD monday VARCHAR(255) NOT NULL, ADD tuesday VARCHAR(255) NOT NULL, ADD wednesday VARCHAR(255) NOT NULL, ADD thursday VARCHAR(255) NOT NULL, ADD friday VARCHAR(255) NOT NULL, ADD saturday VARCHAR(255) NOT NULL, ADD sunday VARCHAR(255) NOT NULL, DROP day_id, DROP opening, DROP closing');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP INDEX UNIQ_F7542B45E237E06 ON ingredient_sort');
        $this->addSql('ALTER TABLE schedule ADD day_id INT NOT NULL, ADD opening VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD closing VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP monday, DROP tuesday, DROP wednesday, DROP thursday, DROP friday, DROP saturday, DROP sunday');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB9C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB9C24126 ON schedule (day_id)');
    }
}
