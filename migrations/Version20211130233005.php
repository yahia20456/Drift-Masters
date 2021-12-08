<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130233005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circuit (idcircuit INT AUTO_INCREMENT NOT NULL, Nom_du_circuit VARCHAR(20) NOT NULL, limitationsonore INT NOT NULL, nbrevirage INT NOT NULL, longeurcircuit DOUBLE PRECISION NOT NULL, largeurmin DOUBLE PRECISION NOT NULL, largeurmax DOUBLE PRECISION NOT NULL, pentecircuit DOUBLE PRECISION NOT NULL, meilleurtour DOUBLE PRECISION NOT NULL, proprietairecircuit VARCHAR(100) NOT NULL, revetement VARCHAR(100) NOT NULL, Dateconstructionc VARCHAR(100) NOT NULL, PRIMARY KEY(idcircuit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE circuit');
    }
}
