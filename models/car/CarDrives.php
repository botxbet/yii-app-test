<?php

namespace app\models\car;

use Yii;

/**
 * This is the model class for table "car_drives".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 *
 * @property CarCatalog[] $carCatalogs
 */
class CarDrives extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_drives';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name'], 'required'],
            [['name', 'seo_name'], 'string', 'max' => 50],
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
     * Gets query for [[CarCatalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarCatalogs()
    {
        return $this->hasMany(CarCatalog::className(), ['drive_id' => 'id']);
    }
}
