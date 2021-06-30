<?php

namespace app\models\car;

use Yii;

/**
 * This is the model class for table "car_models".
 *
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string $seo_name
 *
 * @property CarCatalog[] $carCatalogs
 * @property CarBrands $brand
 */
class CarModels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'name', 'seo_name'], 'required'],
            [['brand_id'], 'integer'],
            [['name', 'seo_name'], 'string', 'max' => 100],
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
            'brand_id' => 'Brand ID',
            'name' => 'Name',
            'seo_name' => 'Seo Name',
        ];
    }

    /**
     * Gets query for [[CarCatalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(CarCatalog::className(), ['model_id' => 'id']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(CarBrands::className(), ['id' => 'brand_id']);
    }
}
