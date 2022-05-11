<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510171239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elements_hors_forfait ADD user_id INT NOT NULL, CHANGE etat etat VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE elements_hors_forfait ADD CONSTRAINT FK_C439D4DCA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_C439D4DCA76ED395 ON elements_hors_forfait (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elements_hors_forfait DROP FOREIGN KEY FK_C439D4DCA76ED395');
        $this->addSql('DROP INDEX IDX_C439D4DCA76ED395 ON elements_hors_forfait');
        $this->addSql('ALTER TABLE elements_hors_forfait DROP user_id, CHANGE etat etat VARCHAR(10) DEFAULT NULL');
    }
}
