<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBitbybitSchema extends Migration
{
    public function up()
    {
        // Create role table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'date_created' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ],
            'last_updated' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bitbybit_role');

        // Create users table
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => ['type' => 'TEXT', 'null' => false],
            'email' => ['type' => 'TEXT', 'null' => false],
            'password' => ['type' => 'TEXT', 'null' => false],
            'salt' => ['type' => 'TEXT', 'null' => false],
            'role' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'date_created' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ],
            'last_updated' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('role');
        $this->forge->createTable('bitbybit_users');

        // Create posts table
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => ['type' => 'TEXT', 'null' => false],
            'content' => ['type' => 'TEXT', 'null' => false],
            'published' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
            'likes' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'default' => 0
            ],
            'tags' => ['type' => 'TEXT', 'null' => true],
            'created_by' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => false
            ],
            'date_created' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ],
            'last_updated' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('created_by');
        $this->forge->addKey('published');
        $this->forge->createTable('bitbybit_posts');

        // Create comments table
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'post_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => false
            ],
            'content' => ['type' => 'TEXT', 'null' => false],
            'created_by' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => false
            ],
            'date_created' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ],
            'last_updated' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => date('Y-m-d H:i:s')
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('post_id');
        $this->forge->addKey('created_by');
        $this->forge->createTable('bitbybit_comments');

        // Add foreign keys (must be done after all tables are created)
        $this->db->query('ALTER TABLE bitbybit_users ADD CONSTRAINT fk_user_role FOREIGN KEY (role) REFERENCES bitbybit_role(id) ON DELETE RESTRICT ON UPDATE CASCADE');
        $this->db->query('ALTER TABLE bitbybit_posts ADD CONSTRAINT fk_post_creator FOREIGN KEY (created_by) REFERENCES bitbybit_users(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->db->query('ALTER TABLE bitbybit_comments ADD CONSTRAINT fk_comment_post FOREIGN KEY (post_id) REFERENCES bitbybit_posts(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->db->query('ALTER TABLE bitbybit_comments ADD CONSTRAINT fk_comment_creator FOREIGN KEY (created_by) REFERENCES bitbybit_users(id) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        // Drop tables in reverse order to respect foreign key constraints
        $this->forge->dropTable('bitbybit_comments', true);
        $this->forge->dropTable('bitbybit_posts', true);
        $this->forge->dropTable('bitbybit_users', true);
        $this->forge->dropTable('bitbybit_role', true);
    }
}