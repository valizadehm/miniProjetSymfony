<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512131014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(25) NOT NULL, contenu VARCHAR(255) DEFAULT NULL, date_de_creation DATETIME NOT NULL, date_de_modification DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE categories (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE categories_articles (categories_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, PRIMARY KEY(categories_id, articles_id))');
        $this->addSql('CREATE INDEX IDX_69239851A21214B7 ON categories_articles (categories_id)');
        $this->addSql('CREATE INDEX IDX_692398511EBAF6CC ON categories_articles (articles_id)');
        $this->addSql('CREATE TABLE commentaires (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utilisateurs_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, contenu VARCHAR(255) DEFAULT NULL, date_de_creation DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41E969C5 ON commentaires (utilisateurs_id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41EBAF6CC ON commentaires (articles_id)');
        $this->addSql('CREATE TABLE mots_cles (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, mot_cle VARCHAR(25) NOT NULL)');
        $this->addSql('CREATE TABLE mots_cles_articles (mots_cles_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, PRIMARY KEY(mots_cles_id, articles_id))');
        $this->addSql('CREATE INDEX IDX_7E7D6F53C0BE80DB ON mots_cles_articles (mots_cles_id)');
        $this->addSql('CREATE INDEX IDX_7E7D6F531EBAF6CC ON mots_cles_articles (articles_id)');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB DEFAULT \'ROLE_USER\' NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_articles');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE mots_cles');
        $this->addSql('DROP TABLE mots_cles_articles');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
