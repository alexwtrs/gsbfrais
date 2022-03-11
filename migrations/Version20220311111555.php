<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311111555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichefrais DROP FOREIGN KEY fichefrais_ibfk_1');
        $this->addSql('ALTER TABLE lignefraisforfait DROP FOREIGN KEY lignefraisforfait_ibfk_1');
        $this->addSql('ALTER TABLE lignefraishorsforfait DROP FOREIGN KEY lignefraishorsforfait_ibfk_1');
        $this->addSql('ALTER TABLE lignefraisforfait DROP FOREIGN KEY lignefraisforfait_ibfk_2');
        $this->addSql('ALTER TABLE fichefrais DROP FOREIGN KEY fichefrais_ibfk_2');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE fichefrais');
        $this->addSql('DROP TABLE fraisforfait');
        $this->addSql('DROP TABLE lignefraisforfait');
        $this->addSql('DROP TABLE lignefraishorsforfait');
        $this->addSql('DROP TABLE visiteur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etat (id CHAR(2) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, libelle VARCHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fichefrais (mois CHAR(6) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, idVisiteur CHAR(4) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, nbJustificatifs INT DEFAULT NULL, montantValide NUMERIC(10, 2) DEFAULT NULL, dateModif DATE DEFAULT NULL, idEtat CHAR(2) CHARACTER SET utf8 DEFAULT \'CR\' COLLATE `utf8_unicode_ci`, INDEX idEtat (idEtat), INDEX IDX_92D5AB081D06ADE3 (idVisiteur), PRIMARY KEY(idVisiteur, mois)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fraisforfait (id CHAR(3) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, libelle CHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, montant NUMERIC(5, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lignefraisforfait (mois CHAR(6) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, idVisiteur CHAR(4) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, idFraisForfait CHAR(3) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, quantite INT DEFAULT NULL, INDEX idFraisForfait (idFraisForfait), INDEX IDX_ED4F43421D06ADE3D6B08CB7 (idVisiteur, mois), PRIMARY KEY(idVisiteur, mois, idFraisForfait)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lignefraishorsforfait (id INT AUTO_INCREMENT NOT NULL, mois CHAR(6) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, idVisiteur CHAR(4) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, libelle VARCHAR(100) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, date DATE DEFAULT NULL, montant NUMERIC(10, 2) DEFAULT NULL, INDEX idVisiteur (idVisiteur, mois), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE visiteur (id CHAR(4) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, nom CHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, prenom CHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, login CHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, mdp CHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, adresse CHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, cp CHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ville CHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, dateEmbauche DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fichefrais ADD CONSTRAINT fichefrais_ibfk_1 FOREIGN KEY (idEtat) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE fichefrais ADD CONSTRAINT fichefrais_ibfk_2 FOREIGN KEY (idVisiteur) REFERENCES visiteur (id)');
        $this->addSql('ALTER TABLE lignefraisforfait ADD CONSTRAINT lignefraisforfait_ibfk_1 FOREIGN KEY (idVisiteur, mois) REFERENCES fichefrais (idVisiteur, mois)');
        $this->addSql('ALTER TABLE lignefraisforfait ADD CONSTRAINT lignefraisforfait_ibfk_2 FOREIGN KEY (idFraisForfait) REFERENCES fraisforfait (id)');
        $this->addSql('ALTER TABLE lignefraishorsforfait ADD CONSTRAINT lignefraishorsforfait_ibfk_1 FOREIGN KEY (idVisiteur, mois) REFERENCES fichefrais (idVisiteur, mois)');
        $this->addSql('DROP TABLE `user`');
    }
}
