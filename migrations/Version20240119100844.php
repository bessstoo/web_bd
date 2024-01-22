<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119100844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE invoice_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE items_in_invoice_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE invoice (id INT NOT NULL, number VARCHAR(255) NOT NULL, type VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE items_in_invoice (id INT NOT NULL, product_id_id INT NOT NULL, invoice_id_id INT NOT NULL, count INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_45CE0A9DDE18E50B ON items_in_invoice (product_id_id)');
        $this->addSql('CREATE INDEX IDX_45CE0A9D429ECEE2 ON items_in_invoice (invoice_id_id)');
        $this->addSql('ALTER TABLE items_in_invoice ADD CONSTRAINT FK_45CE0A9DDE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE items_in_invoice ADD CONSTRAINT FK_45CE0A9D429ECEE2 FOREIGN KEY (invoice_id_id) REFERENCES invoice (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE invoice_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE items_in_invoice_id_seq CASCADE');
        $this->addSql('ALTER TABLE items_in_invoice DROP CONSTRAINT FK_45CE0A9DDE18E50B');
        $this->addSql('ALTER TABLE items_in_invoice DROP CONSTRAINT FK_45CE0A9D429ECEE2');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE items_in_invoice');
    }
}
