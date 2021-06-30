<?php

namespace app\models\car;

use Yii;

/**
 * This is the model class for table "car_brands".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 *
 * @property CarModels[] $carModels
 */
class CarBrands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name'], 'required'],
            [['name', 'seo_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'seo_name' => 'Seo Name',
        ];
    }

    /**
     * Gets query for [[CarModels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(CarModels::className(), ['brand_id' => 'id']);
    }

    public function getCatalogs()
    {
        return $this->hasMany(CarBrands::className(), ['id' => 'brand_id'])
                    ->via('models');
    }
}
