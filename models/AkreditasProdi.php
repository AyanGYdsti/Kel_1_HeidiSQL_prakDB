<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "akreditas_prodi".
 *
 * @property int $id_akreditas
 * @property int $id_prodi
 * @property int $id_kategori
 * @property int $id_lembaga
 * @property string|null $tanggal_mulai
 * @property string|null $tanggal_akhir
 * @property string|null $no_sk
 * @property string|null $lembaga_akreditas
 * @property string|null $file
 *
 * @property KategoriAkreditas $kategori
 * @property LembagaAkreditas $lembaga
 * @property Prodi $prodi
 */
class AkreditasProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akreditas_prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditas'], 'required', 'message' => 'Kode akreditasi tidak boleh kosong.'],
            [['id_prodi'], 'required', 'message' => 'Nama prodi tidak boleh kosong.'],
            [['id_kategori'], 'required', 'message' => 'Nama kategori akreditasi tidak boleh kosong.'],
            [['id_lembaga'], 'required', 'message' => 'Nama lembaga akreditasi tidak boleh kosong.'],
            [['id_akreditas', 'id_prodi', 'id_kategori', 'id_lembaga'], 'integer'],
            [['tanggal_mulai', 'tanggal_akhir'], 'safe'],
            [['no_sk', 'file'], 'string', 'max' => 45],
            [['lembaga_akreditas'], 'string', 'max' => 145],
            [['id_akreditas'], 'unique'],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriAkreditas::class, 'targetAttribute' => ['id_kategori' => 'id_kategori']],
            [['id_lembaga'], 'exist', 'skipOnError' => true, 'targetClass' => LembagaAkreditas::class, 'targetAttribute' => ['id_lembaga' => 'id_lembaga']],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::class, 'targetAttribute' => ['id_prodi' => 'id_prodi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_akreditas' => 'Kode Akreditasi',
            'id_prodi' => 'Nama Prodi',
            'id_kategori' => 'Nama Kategori Akreditasi',
            'id_lembaga' => 'Nama Lembaga Akreditasi',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_akhir' => 'Tanggal Akhir',
            'no_sk' => 'No Sk',
            'lembaga_akreditas' => 'Nama Lembaga Pencatat Akreditasi',
            'file' => 'File',
        ];
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
        $query->joinWith(['prodi']); // Bergabung dengan tabel Prodi untuk filter

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Filter berdasarkan properti
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

        // Filter berdasarkan nama prodi
        $query->andFilterWhere(['like', 'prodi.nama_prodi', $this->prodiName]);

        return $dataProvider;
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(KategoriAkreditas::class, ['id_kategori' => 'id_kategori']);
    }

    /**
     * Gets query for [[Lembaga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLembaga()
    {
        return $this->hasOne(LembagaAkreditas::class, ['id_lembaga' => 'id_lembaga']);
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::class, ['id_prodi' => 'id_prodi']);
    }
}
