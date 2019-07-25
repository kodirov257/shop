<?php

namespace backend\forms;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use shop\entities\User\User;


class UserSearch extends Model
{
    public $id;
    public $date_from;
    public $date_to;
    public $username;
    public $email;
    public $status;
    public $role;

    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['username', 'email', ], 'safe'],
            [['date_to', 'date_from'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find()->alias('u');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'u.id' => $this->id,
            'u.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['>=', 'u.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'u.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }
}
