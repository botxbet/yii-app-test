<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_models}}`.
 */
class m210626_182853_create_car_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_models}}', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string('100')->notNull(),
            'seo_name' => $this->string('100')->notNull()
        ]);

        $this->addForeignKey('foreign_brand','{{%car_models}}','brand_id','{{%car_brands}}', 'id' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_models}}');
    }
}
