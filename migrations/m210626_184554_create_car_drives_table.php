<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_drives}}`.
 */
class m210626_184554_create_car_drives_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_drives}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'seo_name' => $this->string(50)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_drives}}');
    }
}
