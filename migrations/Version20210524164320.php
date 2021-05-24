<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210524164320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invitation (id INT AUTO_INCREMENT NOT NULL, sent_by_id INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_F11D61A2A45BB98C (sent_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qr_code (id INT AUTO_INCREMENT NOT NULL, link VARCHAR(500) NOT NULL, payed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_invitation (user_id INT NOT NULL, invitation_id INT NOT NULL, INDEX IDX_567AA74EA76ED395 (user_id), INDEX IDX_567AA74EA35D7AF0 (invitation_id), PRIMARY KEY(user_id, invitation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_order (id INT AUTO_INCREMENT NOT NULL, qr_code_id INT NOT NULL, client_id INT NOT NULL, bar_id INT NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_17EB68C012E4AD80 (qr_code_id), INDEX IDX_17EB68C019EB6921 (client_id), INDEX IDX_17EB68C089A253A (bar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_order_product (user_order_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_CBBE00B66D128938 (user_order_id), INDEX IDX_CBBE00B64584665A (product_id), PRIMARY KEY(user_order_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2A45BB98C FOREIGN KEY (sent_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_invitation ADD CONSTRAINT FK_567AA74EA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_invitation ADD CONSTRAINT FK_567AA74EA35D7AF0 FOREIGN KEY (invitation_id) REFERENCES invitation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C012E4AD80 FOREIGN KEY (qr_code_id) REFERENCES qr_code (id)');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C019EB6921 FOREIGN KEY (client_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C089A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE user_order_product ADD CONSTRAINT FK_CBBE00B66D128938 FOREIGN KEY (user_order_id) REFERENCES user_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_order_product ADD CONSTRAINT FK_CBBE00B64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_invoice ADD price NUMERIC(7, 2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_invitation DROP FOREIGN KEY FK_567AA74EA35D7AF0');
        $this->addSql('ALTER TABLE user_order DROP FOREIGN KEY FK_17EB68C012E4AD80');
        $this->addSql('ALTER TABLE user_order_product DROP FOREIGN KEY FK_CBBE00B66D128938');
        $this->addSql('DROP TABLE invitation');
        $this->addSql('DROP TABLE qr_code');
        $this->addSql('DROP TABLE user_invitation');
        $this->addSql('DROP TABLE user_order');
        $this->addSql('DROP TABLE user_order_product');
        $this->addSql('ALTER TABLE user_invoice DROP price');
    }
}
