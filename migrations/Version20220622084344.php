<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622084344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elements_forfaitises DROP etat');
        $this->addSql('ALTER TABLE elements_hors_forfait DROP etat');
        $this->addSql('ALTER TABLE suivi_frais CHANGE etat statut VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elements_forfaitises ADD etat VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE elements_hors_forfait ADD etat VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE suivi_frais CHANGE statut etat VARCHAR(10) NOT NULL');
    }
}
