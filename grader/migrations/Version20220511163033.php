<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511163033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE homeworks_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE permission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, status_id INT NOT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(100) NOT NULL, cover VARCHAR(100) NOT NULL, open_date DATE NOT NULL, closing_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_169E6FB96BF700BD ON course (status_id)');
        $this->addSql('CREATE TABLE course_user (course_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(course_id, user_id))');
        $this->addSql('CREATE INDEX IDX_45310B4F591CC992 ON course_user (course_id)');
        $this->addSql('CREATE INDEX IDX_45310B4FA76ED395 ON course_user (user_id)');
        $this->addSql('CREATE TABLE homeworks (id INT NOT NULL, course_id INT NOT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(100) NOT NULL, task_files_path VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8AE6C397591CC992 ON homeworks (course_id)');
        $this->addSql('CREATE TABLE permission (id INT NOT NULL, permission VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE role (id INT NOT NULL, role VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE role_permission (role_id INT NOT NULL, permission_id INT NOT NULL, PRIMARY KEY(role_id, permission_id))');
        $this->addSql('CREATE INDEX IDX_6F7DF886D60322AC ON role_permission (role_id)');
        $this->addSql('CREATE INDEX IDX_6F7DF886FED90CCA ON role_permission (permission_id)');
        $this->addSql('CREATE TABLE status (id INT NOT NULL, status VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, last_name VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, patronymic VARCHAR(100) NOT NULL, login VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, registration_date DATE NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3A76ED395 ON user_role (user_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB96BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_user ADD CONSTRAINT FK_45310B4F591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_user ADD CONSTRAINT FK_45310B4FA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE homeworks ADD CONSTRAINT FK_8AE6C397591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE role_permission ADD CONSTRAINT FK_6F7DF886D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE role_permission ADD CONSTRAINT FK_6F7DF886FED90CCA FOREIGN KEY (permission_id) REFERENCES permission (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE course_user DROP CONSTRAINT FK_45310B4F591CC992');
        $this->addSql('ALTER TABLE homeworks DROP CONSTRAINT FK_8AE6C397591CC992');
        $this->addSql('ALTER TABLE role_permission DROP CONSTRAINT FK_6F7DF886FED90CCA');
        $this->addSql('ALTER TABLE role_permission DROP CONSTRAINT FK_6F7DF886D60322AC');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3D60322AC');
        $this->addSql('ALTER TABLE course DROP CONSTRAINT FK_169E6FB96BF700BD');
        $this->addSql('ALTER TABLE course_user DROP CONSTRAINT FK_45310B4FA76ED395');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3A76ED395');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE homeworks_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE permission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_user');
        $this->addSql('DROP TABLE homeworks');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_permission');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_role');
    }
}
