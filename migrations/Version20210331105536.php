<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210331105536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantity DROP FOREIGN KEY FK_9FF316363EC4DCE');
        $this->addSql('ALTER TABLE quantity DROP FOREIGN KEY FK_9FF31636BAA4FEB0');
        $this->addSql('DROP INDEX IDX_9FF316363EC4DCE ON quantity');
        $this->addSql('DROP INDEX IDX_9FF31636BAA4FEB0 ON quantity');
        $this->addSql('ALTER TABLE quantity ADD recipe_id INT NOT NULL, ADD ingredient_id INT NOT NULL, DROP recip_id, DROP ingredients_id');
        $this->addSql('ALTER TABLE quantity ADD CONSTRAINT FK_9FF3163659D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE quantity ADD CONSTRAINT FK_9FF31636933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE INDEX IDX_9FF3163659D8A214 ON quantity (recipe_id)');
        $this->addSql('CREATE INDEX IDX_9FF31636933FE08C ON quantity (ingredient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantity DROP FOREIGN KEY FK_9FF3163659D8A214');
        $this->addSql('ALTER TABLE quantity DROP FOREIGN KEY FK_9FF31636933FE08C');
        $this->addSql('DROP INDEX IDX_9FF3163659D8A214 ON quantity');
        $this->addSql('DROP INDEX IDX_9FF31636933FE08C ON quantity');
        $this->addSql('ALTER TABLE quantity ADD recip_id INT NOT NULL, ADD ingredients_id INT NOT NULL, DROP recipe_id, DROP ingredient_id');
        $this->addSql('ALTER TABLE quantity ADD CONSTRAINT FK_9FF316363EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE quantity ADD CONSTRAINT FK_9FF31636BAA4FEB0 FOREIGN KEY (recip_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_9FF316363EC4DCE ON quantity (ingredients_id)');
        $this->addSql('CREATE INDEX IDX_9FF31636BAA4FEB0 ON quantity (recip_id)');
    }
}
