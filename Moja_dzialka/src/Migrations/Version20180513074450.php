<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180513074450 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE comment_entity (id INTEGER NOT NULL, relation_id INTEGER DEFAULT NULL, text CLOB DEFAULT NULL, user VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C43B1C7A3256915B ON comment_entity (relation_id)');
        $this->addSql('CREATE TABLE user_entity (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE comment (id INTEGER NOT NULL, relation_id INTEGER DEFAULT NULL, text CLOB DEFAULT NULL COLLATE BINARY, user VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526C3256915B ON comment (relation_id)');
        $this->addSql('CREATE TABLE user (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE comment_entity');
        $this->addSql('DROP TABLE user_entity');
    }
}
