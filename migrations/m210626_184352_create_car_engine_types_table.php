<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_engine_types}}`.
 */
class m210626_184352_create_car_engine_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_engine_types}}', [
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
        $this->dropTable('{{%car_engine_types}}');
    }
}
