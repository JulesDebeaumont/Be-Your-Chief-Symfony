<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326102154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, merchant_specification_id INT DEFAULT NULL, merchant_type_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, first_name VARCHAR(55) DEFAULT NULL, last_name VARCHAR(55) DEFAULT NULL, name VARCHAR(55) DEFAULT NULL, web_site_link VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_7D3656A4E7927C74 (email), INDEX IDX_7D3656A4F193FF01 (merchant_specification_id), INDEX IDX_7D3656A41C72F908 (merchant_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affect (id INT AUTO_INCREMENT NOT NULL, allergen_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_2DF1D3E46E775A4A (allergen_id), INDEX IDX_2DF1D3E4933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE allergen (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, recipe_id INT DEFAULT NULL, text_comment VARCHAR(200) DEFAULT NULL, date_comment DATE NOT NULL, note INT DEFAULT NULL, INDEX IDX_9474526C9B6B5FBA (account_id), INDEX IDX_9474526C59D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configuration (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, theme INT NOT NULL, notif_comment TINYINT(1) NOT NULL, notif_trade TINYINT(1) NOT NULL, moderator TINYINT(1) NOT NULL, notif_recip TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A5E2A5D79B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connect (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, menu_type_id INT NOT NULL, INDEX IDX_74CFF91F59D8A214 (recipe_id), INDEX IDX_74CFF91F4D97912D (menu_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_68C58ED99B6B5FBA (account_id), INDEX IDX_68C58ED959D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, menus_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_5288FD4F14041B84 (menus_id), INDEX IDX_5288FD4F59D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, sort_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, nb_kal DOUBLE PRECISION DEFAULT NULL, INDEX IDX_6BAF787047013001 (sort_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_sort (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, account_id INT NOT NULL, date_menu DATE NOT NULL, INDEX IDX_7D053A93C54C8C93 (type_id), INDEX IDX_7D053A939B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE merchant_specification (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE merchant_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quantity (id INT AUTO_INCREMENT NOT NULL, recip_id INT NOT NULL, ingredients_id INT NOT NULL, quantity INT NOT NULL, display_order INT NOT NULL, INDEX IDX_9FF31636BAA4FEB0 (recip_id), INDEX IDX_9FF316363EC4DCE (ingredients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, origin_id INT DEFAULT NULL, type_id INT DEFAULT NULL, regimen_id INT DEFAULT NULL, account_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, prep_time INT DEFAULT NULL, cook_time INT DEFAULT NULL, serving_nb INT NOT NULL, note INT DEFAULT NULL, image LONGBLOB DEFAULT NULL, difficulty INT NOT NULL, price_lvl INT DEFAULT NULL, INDEX IDX_DA88B13756A273CC (origin_id), INDEX IDX_DA88B137C54C8C93 (type_id), INDEX IDX_DA88B13764832107 (regimen_id), INDEX IDX_DA88B1379B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_origin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_regimen (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, merchant_id INT NOT NULL, day_id INT NOT NULL, opening TIME DEFAULT NULL, closing TIME DEFAULT NULL, INDEX IDX_5A3811FB6796D554 (merchant_id), INDEX IDX_5A3811FB9C24126 (day_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, recip_id INT NOT NULL, num INT NOT NULL, descr VARCHAR(255) DEFAULT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_43B9FE3CBAA4FEB0 (recip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4F193FF01 FOREIGN KEY (merchant_specification_id) REFERENCES merchant_specification (id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A41C72F908 FOREIGN KEY (merchant_type_id) REFERENCES merchant_type (id)');
        $this->addSql('ALTER TABLE affect ADD CONSTRAINT FK_2DF1D3E46E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id)');
        $this->addSql('ALTER TABLE affect ADD CONSTRAINT FK_2DF1D3E4933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D79B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE connect ADD CONSTRAINT FK_74CFF91F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE connect ADD CONSTRAINT FK_74CFF91F4D97912D FOREIGN KEY (menu_type_id) REFERENCES menu_type (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED99B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED959D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE form ADD CONSTRAINT FK_5288FD4F14041B84 FOREIGN KEY (menus_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE form ADD CONSTRAINT FK_5288FD4F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787047013001 FOREIGN KEY (sort_id) REFERENCES ingredient_sort (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C54C8C93 FOREIGN KEY (type_id) REFERENCES menu_type (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A939B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE quantity ADD CONSTRAINT FK_9FF31636BAA4FEB0 FOREIGN KEY (recip_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE quantity ADD CONSTRAINT FK_9FF316363EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13756A273CC FOREIGN KEY (origin_id) REFERENCES recipe_origin (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137C54C8C93 FOREIGN KEY (type_id) REFERENCES recipe_type (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B13764832107 FOREIGN KEY (regimen_id) REFERENCES recipe_regimen (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1379B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB6796D554 FOREIGN KEY (merchant_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB9C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3CBAA4FEB0 FOREIGN KEY (recip_id) REFERENCES recipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9B6B5FBA');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D79B6B5FBA');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED99B6B5FBA');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A939B6B5FBA');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B1379B6B5FBA');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB6796D554');
        $this->addSql('ALTER TABLE affect DROP FOREIGN KEY FK_2DF1D3E46E775A4A');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB9C24126');
        $this->addSql('ALTER TABLE affect DROP FOREIGN KEY FK_2DF1D3E4933FE08C');
        $this->addSql('ALTER TABLE quantity DROP FOREIGN KEY FK_9FF316363EC4DCE');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787047013001');
        $this->addSql('ALTER TABLE form DROP FOREIGN KEY FK_5288FD4F14041B84');
        $this->addSql('ALTER TABLE connect DROP FOREIGN KEY FK_74CFF91F4D97912D');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93C54C8C93');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4F193FF01');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A41C72F908');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C59D8A214');
        $this->addSql('ALTER TABLE connect DROP FOREIGN KEY FK_74CFF91F59D8A214');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED959D8A214');
        $this->addSql('ALTER TABLE form DROP FOREIGN KEY FK_5288FD4F59D8A214');
        $this->addSql('ALTER TABLE quantity DROP FOREIGN KEY FK_9FF31636BAA4FEB0');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3CBAA4FEB0');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13756A273CC');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B13764832107');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137C54C8C93');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE affect');
        $this->addSql('DROP TABLE allergen');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE configuration');
        $this->addSql('DROP TABLE connect');
        $this->addSql('DROP TABLE day');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE ingredient_sort');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_type');
        $this->addSql('DROP TABLE merchant_specification');
        $this->addSql('DROP TABLE merchant_type');
        $this->addSql('DROP TABLE quantity');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_origin');
        $this->addSql('DROP TABLE recipe_regimen');
        $this->addSql('DROP TABLE recipe_type');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE step');
    }
}
