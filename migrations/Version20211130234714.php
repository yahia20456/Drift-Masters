<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130234714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, Nom_du_circuit VARCHAR(20) NOT NULL, limitationsonore INT NOT NULL, nbrevirage INT NOT NULL, longeurcircuit DOUBLE PRECISION NOT NULL, largeurmin DOUBLE PRECISION NOT NULL, largeurmax DOUBLE PRECISION NOT NULL, pentecircuit DOUBLE PRECISION NOT NULL, meilleurtour DOUBLE PRECISION NOT NULL, proprietairecircuit VARCHAR(100) NOT NULL, revetement VARCHAR(100) NOT NULL, Dateconstructionc VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, reservation_id INT NOT NULL, nom_prenom VARCHAR(255) NOT NULL, date_reservation DATETIME NOT NULL, telephone VARCHAR(255) NOT NULL, INDEX IDX_42C84955B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B83297E7 FOREIGN KEY (reservation_id) REFERENCES circuit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B83297E7');
        $this->addSql('DROP TABLE circuit');
        $this->addSql('DROP TABLE reservation');
    }
}