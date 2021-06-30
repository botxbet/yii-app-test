<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_catalog}}`.
 */
class m210626_185737_create_car_catalog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_catalog}}', [
            'id' => $this->primaryKey(),
            'model_id' => $this->integer()->notNull(),
            'engine_type_id' => $this->integer()->notNull(),
            'drive_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('foreign_model','{{%car_catalog}}','model_id','{{%car_models}}', 'id');
        $this->addForeignKey('foreign_engine_type','{{%car_catalog}}','engine_type_id','{{%car_engine_types}}', 'id');
        $this->addForeignKey('foreign_drive','{{%car_catalog}}','drive_id','{{%car_drives}}', 'id');
        $this->addForeignKey('foreign_brand_catalog','{{%car_catalog}}','brand_id','{{%car_brands}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_catalog}}');
    }
}
