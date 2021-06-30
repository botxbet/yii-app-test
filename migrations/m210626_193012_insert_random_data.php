<?php

use app\models\car\CarModels;
use yii\db\Migration;
use yii\helpers\Inflector;

/**
 * Class m210626_193012_insert_random_data
 */
class m210626_193012_insert_random_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');

        $brands_model = [
            1 => [
                'Mercedes-Benz' => [
                    1 => 'A',
                    2 => 'B',
                    3 => 'C',
                    4 => 'CLA',
                    5 => 'CLS'
                ]
            ],
            2 => [
                'Audi' => [
                    6 => 'A5',
                    7 => 'A6',
                    8 => 'A8',
                    9 => 'Q7',
                    10 => 'TT'
                ]
            ],
            3 => [
                'BMW' => [
                    11 => 'X1',
                    12 => 'X2',
                    13 => 'X3',
                    14 => 'X4',
                    15 => 'X5'
                ]
            ],
            4 => [
                'Ford' => [
                    16 => 'Focus',
                    17 => 'Fiest',
                    18 => 'Explorer',
                    19 => 'Transit',
                    20 => 'Mustang'
                ]
            ],
            5 => [
                'Toyota' => [
                    21 => 'Alphard',
                    22 => 'C-HR',
                    23 => 'Camry',
                    24 => 'Corolla',
                    25 => 'RAV4'
                ]
            ]
        ];

        $engine_types = [1 => 'Бензин', 2 => 'Дизель',3 => 'Гибрид'];
        $drives = [1 => 'Полный', 2 => 'Передний'];

        foreach ($engine_types as $idx => $type) {
            $this->insert('{{%car_engine_types}}', [
                'id' => $idx,
                'name' => $type,
                'seo_name' => Inflector::slug($type)
            ]);
        }

        foreach ($drives as $idx => $drive) {
            $this->insert('{{%car_drives}}', [
                'id' => $idx,
                'name' => $drive,
                'seo_name' => Inflector::slug($drive)
            ]);
        }
        $brands_models = [];
        foreach ($brands_model as $b_idx => $models) {
            $brand_name = array_key_first($models);
            $this->insert('{{%car_brands}}', [
                'id' => $b_idx,
                'name' => $brand_name,
                'seo_name' => Inflector::slug($brand_name)
            ]);

            foreach ($models[$brand_name] as $m_idx => $model) {
                $this->insert('{{%car_models}}', [
                    'id' => $m_idx,
                    'brand_id' => $b_idx,
                    'name' => $model,
                    'seo_name' => Inflector::slug($model)
                ]);
                $brands_models[$m_idx] = $b_idx;
            }


        }

        for ($i = 1; $i <= 20; $i++) {
            $model_id = rand(1, 25);
            $this->insert('{{%car_catalog}}', [
                'id' => $i,
                'brand_id' => $brands_models[$model_id],
                'model_id' => $model_id,
                'engine_type_id' => rand(1, 3),
                'drive_id' => rand(1, 2)
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        $this->truncateTable('{{%car_models}}');
        $this->truncateTable('{{%car_brands}}');
        $this->truncateTable('{{%car_drives}}');
        $this->truncateTable('{{%car_engine_types}}');
        $this->truncateTable('{{%car_catalog}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210626_193012_insert_random_data cannot be reverted.\n";

        return false;
    }
    */
}
