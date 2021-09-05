<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329064014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE recipe_id recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3CBAA4FEB0');
        $this->addSql('DROP INDEX IDX_43B9FE3CBAA4FEB0 ON step');
        $this->addSql('ALTER TABLE step ADD recipe_id INT DEFAULT NULL, DROP recip_id');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_43B9FE3C59D8A214 ON step (recipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE recipe_id recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C59D8A214');
        $this->addSql('DROP INDEX IDX_43B9FE3C59D8A214 ON step');
        $this->addSql('ALTER TABLE step ADD recip_id INT NOT NULL, DROP recipe_id');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3CBAA4FEB0 FOREIGN KEY (recip_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_43B9FE3CBAA4FEB0 ON step (recip_id)');
    }
}
