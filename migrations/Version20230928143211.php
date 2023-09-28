<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928143211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation table monster';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, monster_name VARCHAR(50) NOT NULL, stat_atk INT NOT NULL, stat_def INT NOT NULL, stat_hp INT NOT NULL, stat_atkspd INT NOT NULL, stat_critrate DOUBLE PRECISION NOT NULL, stat_critdmg DOUBLE PRECISION NOT NULL, stat_accuracy DOUBLE PRECISION NOT NULL, stat_res DOUBLE PRECISION NOT NULL, stat_prec DOUBLE PRECISION NOT NULL, stat_evasion DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE monster');
    }
}
