<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200203233943 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX workplace_unique ON appointment');
        $this->addSql('ALTER TABLE appointment ADD workplace_id VARCHAR(255) DEFAULT NULL, DROP workplace');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844AC25FB46 FOREIGN KEY (workplace_id) REFERENCES workplace (id)');
        $this->addSql('CREATE INDEX IDX_FE38F844AC25FB46 ON appointment (workplace_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844AC25FB46');
        $this->addSql('DROP INDEX IDX_FE38F844AC25FB46 ON appointment');
        $this->addSql('ALTER TABLE appointment ADD workplace VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP workplace_id');
        $this->addSql('CREATE UNIQUE INDEX workplace_unique ON appointment (workplace, date_time)');
    }
}
