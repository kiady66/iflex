<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504122122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_invoice_product (user_invoice_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_334F5EF18EEE3711 (user_invoice_id), INDEX IDX_334F5EF14584665A (product_id), PRIMARY KEY(user_invoice_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_invoice_product ADD CONSTRAINT FK_334F5EF18EEE3711 FOREIGN KEY (user_invoice_id) REFERENCES user_invoice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_invoice_product ADD CONSTRAINT FK_334F5EF14584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE result CHANGE game_id game_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_invoice_product');
        $this->addSql('ALTER TABLE result CHANGE game_id game_id INT NOT NULL');
    }
}
