<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130184629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evento (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, data_inicial VARCHAR(255) NOT NULL, hora_inicial VARCHAR(255) NOT NULL, data_final VARCHAR(255) NOT NULL, hora_final VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE palestra (id INT AUTO_INCREMENT NOT NULL, evento_id INT NOT NULL, palestrante_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, data VARCHAR(255) NOT NULL, hora_inicio VARCHAR(255) NOT NULL, hora_final VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, INDEX IDX_C799BBF087A5F842 (evento_id), INDEX IDX_C799BBF03CBB9C62 (palestrante_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE palestrante (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE palestra ADD CONSTRAINT FK_C799BBF087A5F842 FOREIGN KEY (evento_id) REFERENCES evento (id)');
        $this->addSql('ALTER TABLE palestra ADD CONSTRAINT FK_C799BBF03CBB9C62 FOREIGN KEY (palestrante_id) REFERENCES palestrante (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE palestra DROP FOREIGN KEY FK_C799BBF087A5F842');
        $this->addSql('ALTER TABLE palestra DROP FOREIGN KEY FK_C799BBF03CBB9C62');
        $this->addSql('DROP TABLE evento');
        $this->addSql('DROP TABLE palestra');
        $this->addSql('DROP TABLE palestrante');
        $this->addSql('DROP TABLE user');
    }
}
