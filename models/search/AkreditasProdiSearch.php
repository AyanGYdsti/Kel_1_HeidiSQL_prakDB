<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AkreditasProdi;

/**
 * AkreditasProdiSearch represents the model behind the search form of `app\models\AkreditasProdi`.
 */
class AkreditasProdiSearch extends AkreditasProdi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditas', 'id_prodi', 'id_kategori', 'id_lembaga'], 'integer'],
            [['tanggal_mulai', 'tanggal_akhir', 'no_sk', 'lembaga_akreditas', 'file'], 'safe'],
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
        $query = AkreditasProdi::find();

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
            'id_akreditas' => $this->id_akreditas,
            'id_prodi' => $this->id_prodi,
            'id_kategori' => $this->id_kategori,
            'id_lembaga' => $this->id_lembaga,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);

        $query->andFilterWhere(['like', 'no_sk', $this->no_sk])
            ->andFilterWhere(['like', 'lembaga_akreditas', $this->lembaga_akreditas])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
