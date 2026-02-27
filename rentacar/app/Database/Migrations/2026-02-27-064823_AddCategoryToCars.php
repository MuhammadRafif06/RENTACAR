<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryToCars extends Migration
{
   public function up()
{
    $this->forge->addColumn('cars', [
        'category_id' => [
            'type' => 'INT',
            'unsigned' => true,
            'null' => true,
        ],
    ]);

    $this->db->query(
        'ALTER TABLE cars ADD CONSTRAINT fk_category
         FOREIGN KEY (category_id)
         REFERENCES carcategories(id)
         ON DELETE SET NULL ON UPDATE CASCADE'
    );
}

public function down()
{
    $this->forge->dropColumn('cars', 'category_id');
}
}
