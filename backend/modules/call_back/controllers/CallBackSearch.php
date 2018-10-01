<?php

namespace backend\modules\call_back\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CallBack;

/**
 * CallBackSearch represents the model behind the search form of `common\models\CallBack`.
 */
class CallBackSearch extends CallBack
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dt_add'], 'integer'],
            [['phone'], 'safe'],
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
        $query = CallBack::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dt_add' => $this->dt_add,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
