<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210426110831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account ADD schedules_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4116C90BC FOREIGN KEY (schedules_id) REFERENCES schedule (id)');
        $this->addSql('CREATE INDEX IDX_7D3656A4116C90BC ON account (schedules_id)');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB6796D554');
        $this->addSql('DROP INDEX IDX_5A3811FB6796D554 ON schedule');
        $this->addSql('ALTER TABLE schedule DROP merchant_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4116C90BC');
        $this->addSql('DROP INDEX IDX_7D3656A4116C90BC ON account');
        $this->addSql('ALTER TABLE account DROP schedules_id');
        $this->addSql('ALTER TABLE schedule ADD merchant_id INT NOT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB6796D554 FOREIGN KEY (merchant_id) REFERENCES account (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB6796D554 ON schedule (merchant_id)');
    }
}
