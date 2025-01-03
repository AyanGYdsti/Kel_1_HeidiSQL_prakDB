<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fakultas;

/**
 * FakultasSearch represents the model behind the search form of `app\models\Fakultas`.
 */
class FakultasSearch extends Fakultas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fakultas', 'id_univ'], 'integer'],
            [['nama_fakultas', 'singkatan'], 'safe'],
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
        $query = Fakultas::find();

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
            'id_fakultas' => $this->id_fakultas,
            'id_univ' => $this->id_univ,
        ]);

        $query->andFilterWhere(['like', 'nama_fakultas', $this->nama_fakultas])
            ->andFilterWhere(['like', 'singkatan', $this->singkatan]);

        return $dataProvider;
    }
}
