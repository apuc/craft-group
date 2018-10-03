<?php

namespace backend\modules\landing\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LandingAsset;

/**
 * LandingAssetSearch represents the model behind the search form of `common\models\LandingAsset`.
 */
class LandingAssetSearch extends LandingAsset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lp_id', 'type'], 'integer'],
            [['path'], 'safe'],
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
        $query = LandingAsset::find();

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
            'lp_id' => $this->lp_id,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
