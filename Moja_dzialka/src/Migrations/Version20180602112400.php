<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180602112400 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE post_entity (id INTEGER NOT NULL, title CLOB NOT NULL, content CLOB DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE user_entity');
        $this->addSql('DROP INDEX IDX_C43B1C7A3256915B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment_entity AS SELECT id, relation_id, text, user FROM comment_entity');
        $this->addSql('DROP TABLE comment_entity');
        $this->addSql('CREATE TABLE comment_entity (id INTEGER NOT NULL, relation_id INTEGER DEFAULT NULL, yes_id INTEGER NOT NULL, text CLOB DEFAULT NULL COLLATE BINARY, user VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_C43B1C7A3256915B FOREIGN KEY (relation_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C43B1C7A2CB716C7 FOREIGN KEY (yes_id) REFERENCES post_entity (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO comment_entity (id, relation_id, text, user) SELECT id, relation_id, text, user FROM __temp__comment_entity');
        $this->addSql('DROP TABLE __temp__comment_entity');
        $this->addSql('CREATE INDEX IDX_C43B1C7A3256915B ON comment_entity (relation_id)');
        $this->addSql('CREATE INDEX IDX_C43B1C7A2CB716C7 ON comment_entity (yes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE user_entity (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE post_entity');
        $this->addSql('DROP INDEX IDX_C43B1C7A3256915B');
        $this->addSql('DROP INDEX IDX_C43B1C7A2CB716C7');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment_entity AS SELECT id, relation_id, text, user FROM comment_entity');
        $this->addSql('DROP TABLE comment_entity');
        $this->addSql('CREATE TABLE comment_entity (id INTEGER NOT NULL, relation_id INTEGER DEFAULT NULL, text CLOB DEFAULT NULL, user VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO comment_entity (id, relation_id, text, user) SELECT id, relation_id, text, user FROM __temp__comment_entity');
        $this->addSql('DROP TABLE __temp__comment_entity');
        $this->addSql('CREATE INDEX IDX_C43B1C7A3256915B ON comment_entity (relation_id)');
    }
}
