<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928144059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster ADD attribute_id INT NOT NULL, ADD class_id INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4EA000B10 FOREIGN KEY (class_id) REFERENCES class_monster (id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4B6E62EFA ON monster (attribute_id)');
        $this->addSql('CREATE INDEX IDX_245EC6F4EA000B10 ON monster (class_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4B6E62EFA');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4EA000B10');
        $this->addSql('DROP INDEX IDX_245EC6F4B6E62EFA ON monster');
        $this->addSql('DROP INDEX IDX_245EC6F4EA000B10 ON monster');
        $this->addSql('ALTER TABLE monster DROP attribute_id, DROP class_id');
    }
}
