<?php

namespace backend\forms\Shop;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use shop\entities\Shop\Brand;

/**
 * BrandSearch represents the model behind the search form of `shop\entities\Shop\Brand`.
 */
class BrandSearch extends Model
{
    public $id;
    public $name;
    public $slug;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'slug'], 'safe'],
        ];
    }


    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Brand::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}