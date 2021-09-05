<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210404153458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient_allergen (ingredient_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_57B95840933FE08C (ingredient_id), INDEX IDX_57B958406E775A4A (allergen_id), PRIMARY KEY(ingredient_id, allergen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient_allergen ADD CONSTRAINT FK_57B95840933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient_allergen ADD CONSTRAINT FK_57B958406E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE ingredient_ingredient_sort');
        $this->addSql('ALTER TABLE ingredient ADD sort_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787047013001 FOREIGN KEY (sort_id) REFERENCES ingredient_sort (id)');
        $this->addSql('CREATE INDEX IDX_6BAF787047013001 ON ingredient (sort_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient_ingredient_sort (ingredient_id INT NOT NULL, ingredient_sort_id INT NOT NULL, INDEX IDX_95A4465B933FE08C (ingredient_id), INDEX IDX_95A4465B46363BC7 (ingredient_sort_id), PRIMARY KEY(ingredient_id, ingredient_sort_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ingredient_ingredient_sort ADD CONSTRAINT FK_95A4465B46363BC7 FOREIGN KEY (ingredient_sort_id) REFERENCES ingredient_sort (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient_ingredient_sort ADD CONSTRAINT FK_95A4465B933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE ingredient_allergen');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787047013001');
        $this->addSql('DROP INDEX IDX_6BAF787047013001 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP sort_id');
    }
}
