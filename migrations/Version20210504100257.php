<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504100257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD created_at DATETIME NOT NULL, ADD description VARCHAR(500) DEFAULT NULL, ADD updated_at DATETIME NOT NULL, ADD access_token VARCHAR(255) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, ADD postalcode VARCHAR(50) DEFAULT NULL, ADD email VARCHAR(255) NOT NULL, ADD address VARCHAR(255) DEFAULT NULL');
    }

}
