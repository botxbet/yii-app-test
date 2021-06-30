<?php

use yii\db\Migration;


/**
 * Handles the creation of table `{{%car_brands}}`.
 */
class m210626_165423_create_car_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_brands}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string('100')->notNull(),
            'seo_name' => $this->string('100')->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_brands}}');
    }
}
