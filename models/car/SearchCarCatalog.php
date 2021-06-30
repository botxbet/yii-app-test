<?php

namespace app\models\car;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\car\CarCatalog;

/**
 * SearchCarCatalog represents the model behind the search form of `app\models\car\CarCatalog`.
 */
class SearchCarCatalog extends CarCatalog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['model_id', 'engine_type_id', 'drive_id', 'brand_id'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CarCatalog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load(['SearchCarCatalog' => $params]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('brand')
                ->joinWith('model')
                ->joinWith('drive')
                ->joinWith('engine');


//        $query->andFilterWhere([
//            'drive_id' => $this->drive_id,
//            'engine_type_id' => $this->engine_type_id,
//        ]);
        $query->andFilterWhere(['=', 'car_models.seo_name', $this->model_id])
        ->andFilterWhere(['like', 'car_brands.seo_name', $this->brand_id])
        ->andFilterWhere(['like', 'car_drives.seo_name', $this->drive_id])
        ->andFilterWhere(['like', 'car_engine_types.seo_name', $this->engine_type_id]);

        return $dataProvider;
    }
}
