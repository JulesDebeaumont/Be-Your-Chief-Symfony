<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210404211406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account_recipe (account_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_FDBC7F449B6B5FBA (account_id), INDEX IDX_FDBC7F4459D8A214 (recipe_id), PRIMARY KEY(account_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account_recipe ADD CONSTRAINT FK_FDBC7F449B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE account_recipe ADD CONSTRAINT FK_FDBC7F4459D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE recipe_account');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe_account (recipe_id INT NOT NULL, account_id INT NOT NULL, INDEX IDX_31D258E49B6B5FBA (account_id), INDEX IDX_31D258E459D8A214 (recipe_id), PRIMARY KEY(recipe_id, account_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE recipe_account ADD CONSTRAINT FK_31D258E459D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_account ADD CONSTRAINT FK_31D258E49B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE account_recipe');
    }
}
