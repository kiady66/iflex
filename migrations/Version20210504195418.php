<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504195418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, message_room_id INT DEFAULT NULL, content VARCHAR(1000) NOT NULL, sent_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_B6BD307FA76ED395 (user_id), INDEX IDX_B6BD307FC49F4A9F (message_room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_room (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_room_user (message_room_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_842E3A1BC49F4A9F (message_room_id), INDEX IDX_842E3A1BA76ED395 (user_id), PRIMARY KEY(message_room_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC49F4A9F FOREIGN KEY (message_room_id) REFERENCES message_room (id)');
        $this->addSql('ALTER TABLE message_room_user ADD CONSTRAINT FK_842E3A1BC49F4A9F FOREIGN KEY (message_room_id) REFERENCES message_room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_room_user ADD CONSTRAINT FK_842E3A1BA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC49F4A9F');
        $this->addSql('ALTER TABLE message_room_user DROP FOREIGN KEY FK_842E3A1BC49F4A9F');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_room');
        $this->addSql('DROP TABLE message_room_user');
    }
}
