<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610071914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_object ADD account_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_object ADD CONSTRAINT FK_14D431329B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_14D431329B6B5FBA ON media_object (account_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_object DROP FOREIGN KEY FK_14D431329B6B5FBA');
        $this->addSql('DROP INDEX UNIQ_14D431329B6B5FBA ON media_object');
        $this->addSql('ALTER TABLE media_object DROP account_id');
    }
}
