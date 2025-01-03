<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LembagaAkreditas;

/**
 * LembagaAkreditasSearch represents the model behind the search form of `app\models\LembagaAkreditas`.
 */
class LembagaAkreditasSearch extends LembagaAkreditas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lembaga'], 'integer'],
            [['nama_lembaga'], 'safe'],
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
        $query = LembagaAkreditas::find();

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
            'id_lembaga' => $this->id_lembaga,
        ]);

        $query->andFilterWhere(['like', 'nama_lembaga', $this->nama_lembaga]);

        return $dataProvider;
    }
}
