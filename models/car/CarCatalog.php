<?php

namespace app\models\car;

use Yii;

/**
 * This is the model class for table "car_catalog".
 *
 * @property int $id
 * @property int $model_id
 * @property int $engine_type_id
 * @property int $drive_id
 *
 * @property CarDrives $drive
 * @property CarEngineTypes $engine
 * @property CarModels $model
 */
class CarCatalog extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_id', 'engine_type_id', 'drive_id', 'brand_id'], 'required'],
            [['model_id', 'engine_type_id', 'drive_id', 'brand_id'], 'integer'],
            [['drive_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarDrives::className(), 'targetAttribute' => ['drive_id' => 'id']],
            [['engine_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarEngineTypes::className(), 'targetAttribute' => ['engine_type_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarModels::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarBrands::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Марка',
            'model_id' => 'Модель',
            'engine_type_id' => 'Двигатель',
            'drive_id' => 'Привод'
        ];
    }

    /**
     * Gets query for [[Drive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrive()
    {
        return $this->hasOne(CarDrives::className(), ['id' => 'drive_id']);
    }

    /**
     * Gets query for [[EngineType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngine()
    {
        return $this->hasOne(CarEngineTypes::className(), ['id' => 'engine_type_id']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(CarModels::className(), ['id' => 'model_id']);
    }

    public function getBrand()
    {
        return $this->hasOne(CarBrands::className(), ['id' => 'brand_id']);
    }
}
