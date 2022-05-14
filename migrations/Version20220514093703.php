<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514093703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_692398511EBAF6CC');
        $this->addSql('DROP INDEX IDX_69239851A21214B7');
        $this->addSql('CREATE TEMPORARY TABLE __temp__categories_articles AS SELECT categories_id, articles_id FROM categories_articles');
        $this->addSql('DROP TABLE categories_articles');
        $this->addSql('CREATE TABLE categories_articles (categories_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, PRIMARY KEY(categories_id, articles_id), CONSTRAINT FK_69239851A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_692398511EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO categories_articles (categories_id, articles_id) SELECT categories_id, articles_id FROM __temp__categories_articles');
        $this->addSql('DROP TABLE __temp__categories_articles');
        $this->addSql('CREATE INDEX IDX_692398511EBAF6CC ON categories_articles (articles_id)');
        $this->addSql('CREATE INDEX IDX_69239851A21214B7 ON categories_articles (categories_id)');
        $this->addSql('DROP INDEX IDX_D9BEC0C41EBAF6CC');
        $this->addSql('DROP INDEX IDX_D9BEC0C41E969C5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__commentaires AS SELECT id, utilisateurs_id, articles_id, contenu, date_de_creation FROM commentaires');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('CREATE TABLE commentaires (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utilisateurs_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, contenu VARCHAR(255) DEFAULT NULL, date_de_creation DATETIME NOT NULL, CONSTRAINT FK_D9BEC0C41E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D9BEC0C41EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO commentaires (id, utilisateurs_id, articles_id, contenu, date_de_creation) SELECT id, utilisateurs_id, articles_id, contenu, date_de_creation FROM __temp__commentaires');
        $this->addSql('DROP TABLE __temp__commentaires');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41EBAF6CC ON commentaires (articles_id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41E969C5 ON commentaires (utilisateurs_id)');
        $this->addSql('DROP INDEX IDX_7E7D6F531EBAF6CC');
        $this->addSql('DROP INDEX IDX_7E7D6F53C0BE80DB');
        $this->addSql('CREATE TEMPORARY TABLE __temp__mots_cles_articles AS SELECT mots_cles_id, articles_id FROM mots_cles_articles');
        $this->addSql('DROP TABLE mots_cles_articles');
        $this->addSql('CREATE TABLE mots_cles_articles (mots_cles_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, PRIMARY KEY(mots_cles_id, articles_id), CONSTRAINT FK_7E7D6F53C0BE80DB FOREIGN KEY (mots_cles_id) REFERENCES mots_cles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7E7D6F531EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO mots_cles_articles (mots_cles_id, articles_id) SELECT mots_cles_id, articles_id FROM __temp__mots_cles_articles');
        $this->addSql('DROP TABLE __temp__mots_cles_articles');
        $this->addSql('CREATE INDEX IDX_7E7D6F531EBAF6CC ON mots_cles_articles (articles_id)');
        $this->addSql('CREATE INDEX IDX_7E7D6F53C0BE80DB ON mots_cles_articles (mots_cles_id)');
        $this->addSql('ALTER TABLE utilisateurs ADD COLUMN is_verified BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_69239851A21214B7');
        $this->addSql('DROP INDEX IDX_692398511EBAF6CC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__categories_articles AS SELECT categories_id, articles_id FROM categories_articles');
        $this->addSql('DROP TABLE categories_articles');
        $this->addSql('CREATE TABLE categories_articles (categories_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, PRIMARY KEY(categories_id, articles_id))');
        $this->addSql('INSERT INTO categories_articles (categories_id, articles_id) SELECT categories_id, articles_id FROM __temp__categories_articles');
        $this->addSql('DROP TABLE __temp__categories_articles');
        $this->addSql('CREATE INDEX IDX_69239851A21214B7 ON categories_articles (categories_id)');
        $this->addSql('CREATE INDEX IDX_692398511EBAF6CC ON categories_articles (articles_id)');
        $this->addSql('DROP INDEX IDX_D9BEC0C41E969C5');
        $this->addSql('DROP INDEX IDX_D9BEC0C41EBAF6CC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__commentaires AS SELECT id, utilisateurs_id, articles_id, contenu, date_de_creation FROM commentaires');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('CREATE TABLE commentaires (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utilisateurs_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, contenu VARCHAR(255) DEFAULT NULL, date_de_creation DATETIME NOT NULL)');
        $this->addSql('INSERT INTO commentaires (id, utilisateurs_id, articles_id, contenu, date_de_creation) SELECT id, utilisateurs_id, articles_id, contenu, date_de_creation FROM __temp__commentaires');
        $this->addSql('DROP TABLE __temp__commentaires');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41E969C5 ON commentaires (utilisateurs_id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C41EBAF6CC ON commentaires (articles_id)');
        $this->addSql('DROP INDEX IDX_7E7D6F53C0BE80DB');
        $this->addSql('DROP INDEX IDX_7E7D6F531EBAF6CC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__mots_cles_articles AS SELECT mots_cles_id, articles_id FROM mots_cles_articles');
        $this->addSql('DROP TABLE mots_cles_articles');
        $this->addSql('CREATE TABLE mots_cles_articles (mots_cles_id INTEGER NOT NULL, articles_id INTEGER NOT NULL, PRIMARY KEY(mots_cles_id, articles_id))');
        $this->addSql('INSERT INTO mots_cles_articles (mots_cles_id, articles_id) SELECT mots_cles_id, articles_id FROM __temp__mots_cles_articles');
        $this->addSql('DROP TABLE __temp__mots_cles_articles');
        $this->addSql('CREATE INDEX IDX_7E7D6F53C0BE80DB ON mots_cles_articles (mots_cles_id)');
        $this->addSql('CREATE INDEX IDX_7E7D6F531EBAF6CC ON mots_cles_articles (articles_id)');
        $this->addSql('DROP INDEX UNIQ_497B315EE7927C74');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateurs AS SELECT id, email, roles, password FROM utilisateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB DEFAULT \'ROLE_USER\' NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO utilisateurs (id, email, roles, password) SELECT id, email, roles, password FROM __temp__utilisateurs');
        $this->addSql('DROP TABLE __temp__utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
    }
}
