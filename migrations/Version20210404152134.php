<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210404152134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient_ingredient_sort (ingredient_id INT NOT NULL, ingredient_sort_id INT NOT NULL, INDEX IDX_95A4465B933FE08C (ingredient_id), INDEX IDX_95A4465B46363BC7 (ingredient_sort_id), PRIMARY KEY(ingredient_id, ingredient_sort_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient_ingredient_sort ADD CONSTRAINT FK_95A4465B933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient_ingredient_sort ADD CONSTRAINT FK_95A4465B46363BC7 FOREIGN KEY (ingredient_sort_id) REFERENCES ingredient_sort (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE affect');
        $this->addSql('DROP TABLE connect');
        $this->addSql('DROP TABLE form');
        $this->addSql('ALTER TABLE account CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787047013001');
        $this->addSql('DROP INDEX IDX_6BAF787047013001 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP sort_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affect (id INT AUTO_INCREMENT NOT NULL, allergen_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_2DF1D3E4933FE08C (ingredient_id), INDEX IDX_2DF1D3E46E775A4A (allergen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE connect (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, menu_type_id INT NOT NULL, INDEX IDX_74CFF91F4D97912D (menu_type_id), INDEX IDX_74CFF91F59D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, menus_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_5288FD4F59D8A214 (recipe_id), INDEX IDX_5288FD4F14041B84 (menus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE affect ADD CONSTRAINT FK_2DF1D3E46E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id)');
        $this->addSql('ALTER TABLE affect ADD CONSTRAINT FK_2DF1D3E4933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE connect ADD CONSTRAINT FK_74CFF91F4D97912D FOREIGN KEY (menu_type_id) REFERENCES menu_type (id)');
        $this->addSql('ALTER TABLE connect ADD CONSTRAINT FK_74CFF91F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE form ADD CONSTRAINT FK_5288FD4F14041B84 FOREIGN KEY (menus_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE form ADD CONSTRAINT FK_5288FD4F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('DROP TABLE ingredient_ingredient_sort');
        $this->addSql('ALTER TABLE account CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE ingredient ADD sort_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787047013001 FOREIGN KEY (sort_id) REFERENCES ingredient_sort (id)');
        $this->addSql('CREATE INDEX IDX_6BAF787047013001 ON ingredient (sort_id)');
    }
}
